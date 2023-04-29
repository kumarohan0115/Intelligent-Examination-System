<?php

session_start();

include('../config/connective.php');

if (isset($_POST['submit'])) {

    $_SESSION["number_question"] = $_POST["no_of_question"];
    $time = $_POST['time']; // change time from here -----------------------------------------------------------------__>>>

    $number_of_question = $_POST['no_of_question']; // session or form 

    $checker = $_POST['check'];

    $_SESSION["table_name"] = $_POST['Table_name']; // session or form


    $optionsheet = "optionsheet_" . $_SESSION["table_name"];
    $test = "test_" . $_SESSION["table_name"];


    $tablename = $_SESSION["table_name"];
    $table = "online_test_" . $_SESSION["table_name"]; //table name change here for further testing


    if ($checker == "createTable") //check box option will come here for the checking;
    {
        $sql_creation = "CREATE TABLE `$table`(Username_test varchar(1000),score int)";
        $query_creation = mysqli_query($connection, $sql_creation) or die(header("./testManagmentBoard.php"));

        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = "question$i";
            $columns = "ALTER TABLE `$table` ADD `$question`  BOOLEAN NULL DEFAULT NULL";
            $query_column = mysqli_query($connection, $columns) or die("columns didn't created ");
        }



        $sql_subject = "INSERT INTO subject_info(`subject`,`no_question`,`duration` )VALUES('{$tablename}','{$number_of_question}','{$time}')";
        $query_subject = mysqli_query($connection, $sql_subject);

        //insert it there in unaux.com 

        $exam_record = "ALTER TABLE exam_record ADD `$tablename` int(11)  NULL DEFAULT NULL";
        mysqli_query($connection, $exam_record) or die("exam_record failed to upload");

        //put here

        $sql_existing_test = "ALTER TABLE user_info ADD `$tablename` BOOLEAN NULL DEFAULT NULL";
        mysqli_query($connection, $sql_existing_test);


        $sql_optionsheet = "CREATE TABLE `$optionsheet`(question_id varchar(1000),option1 varchar(1000),option2 varchar(1000),option3 varchar(1000),option4 varchar(1000), question_no int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY)";
        $sql_test = " CREATE TABLE `$test`(question varchar(1000),answer varchar(1000))";


        mysqli_query($connection, $sql_optionsheet) or die("optionsheet error");
        mysqli_query($connection, $sql_test) or die("test table error");

        header("Location:./QuestionUpload.php");

    }
    if ($checker == "DeleteTable") {
        $sql_deletion = "DROP TABLE {$table}";
        $sql_optionsheet = "DROP TABLE {$optionsheet}";
        $sql_test = "DROP TABLE {$test}";
        $sql_subject_record = "DELETE FROM subject_info where `subject` = '{$tablename}'";
        $sql_exam_record = "ALTER TABLE exam_record DROP `$tablename` ";

        //add 
        $sql_subject = "ALTER TABLE user_info DROP `$tablename`";

        //till here



        mysqli_query($connection, $sql_subject);
        mysqli_query($connection, $sql_optionsheet);
        mysqli_query($connection, $sql_test);
        mysqli_query($connection, $sql_exam_record);
        mysqli_query($connection, $sql_subject_record);

        $query_deletion = mysqli_query($connection, $sql_deletion);
        header("Location: ./testManagmentBoard.php");
    }

} else {
    session_destroy();
    header("Location : ./login.php");
}