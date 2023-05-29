<?php

session_start();

include('../config/connective.php');

if (isset($_POST['submit'])) {

    $_SESSION["number_question"] = $_POST["no_of_question"];
    $time = $_POST['time']; // change time from here -----------------------------------------------------------------__>>>

    $number_of_question = $_POST['no_of_question']; // session or form 

    $checker = $_POST['check'];

    $_SESSION["table_name"] = $_POST['Table_name']; // session or form

    $subject = $_SESSION["table_name"]; // >>>>>
    $subjectCode = $_POST['subjectCode'];
    $teacherName = $_SESSION["teacher_name"]; //>>>>>>


    $optionsheet = "optionsheet_" . $_SESSION["table_name"];
    $test = "test_" . $_SESSION["table_name"];


    $tablename = $_SESSION["table_name"];
    $table = "online_test_" . $_SESSION["table_name"]; //table name change here for further testing


    // date time insertion in mysql 
    $Examdate = $_POST["ExaminationDate"];
    $ExamTime = $_POST["ExaminationTime"];
    $mark = $_POST["Marks"];

    
    if ($checker == "createTable") //check box option will come here for the checking;
    {
        $sql_creation = "CREATE TABLE `$table`(Username_test varchar(1000),score int)";

        // /* insert this line
        $subjectCheckerquery = "SELECT SubjectCode FROM teacher_info WHERE Username = '{$teacherName}'";
        $checkerSubject = mysqli_query($connection, $subjectCheckerquery);

        if (mysqli_num_rows($checkerSubject) > 0) {
            while ($row = mysqli_fetch_assoc($checkerSubject)) {
                if ($row["SubjectCode"]) {
                    $insertionOfPaperInTeacherTable = "UPDATE teacher_info SET SubjectCode =  CONCAT(SubjectCode,',{$subject}') WHERE Username = '{$teacherName}' "; //concat fucntion used >>>>>
                    $mysqlFor_paper = mysqli_query($connection, $insertionOfPaperInTeacherTable) or die("database failed");
                } else {
                    $insertionOfPaperInTeacherTable = "UPDATE teacher_info SET SubjectCode =  '{$subject}' WHERE Username = '{$teacherName}' "; // >>>>>
                    $mysqlFor_paper = mysqli_query($connection, $insertionOfPaperInTeacherTable) or die("database failed");
                }
            }
        }
        // */
        // $insertionOfPaperInTeacherTable = "UPDATE teacher_info SET SubjectCode =  '{$subject}' WHERE Username = '{$teacherName}' " ; // >>>>>
        // $mysqlFor_paper = mysqli_query($connection,$insertionOfPaperInTeacherTable) or die("database failed"); //>>>>>>

        $insertIntoSubjectList = "INSERT INTO SubjectList(`SubjectCode`,`SubjectName`) Values ('{$subjectCode}','{$subject}') "; //>>>>>
        $mysql_insertIntoList = mysqli_query($connection, $insertIntoSubjectList) or die("subject list creation "); //>>>>>

        $query_creation = mysqli_query($connection, $sql_creation) or die(header("./testManagmentBoard.php"));

        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = "question$i";
            $columns = "ALTER TABLE `$table` ADD `$question`  BOOLEAN NULL DEFAULT NULL";
            $query_column = mysqli_query($connection, $columns) or die("columns didn't created ");
        }



        $sql_subject = "INSERT INTO subject_info(`subject`,`no_question`,`duration`,`ExaminationDate`,`ExaminationTime` ,`Marks`)VALUES('{$tablename}','{$number_of_question}','{$time}','{$Examdate}' , '{$ExamTime}' , '{$mark}')";
        $query_subject = mysqli_query($connection, $sql_subject) or die("error while inserting the subject information");

        //insert it there in unaux.com 

        $exam_record = "ALTER TABLE exam_record ADD `$tablename` int(11)  NULL DEFAULT NULL";
        mysqli_query($connection, $exam_record) or die("exam_record failed to upload");

        //put here

        $sql_existing_test = "ALTER TABLE user_info ADD `$tablename` BOOLEAN NULL DEFAULT NULL";
        mysqli_query($connection, $sql_existing_test);

        //made changes need to fix with shasha
        // $sql_optionsheet = "CREATE TABLE $optionsheet(question_id int(11) NOT NULL ,question varchar(1000),option1 varchar(1000),option2 varchar(1000),option3 varchar(1000),option4 varchar(1000))";
        // $sql_test = " CREATE TABLE $test(question_id int(11),answer varchar(1000))"; /// >>>>>>

        $sql_optionsheet = "CREATE TABLE `$optionsheet`(question_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,question varchar(1000),option1 varchar(1000),option2 varchar(1000),option3 varchar(1000),option4 varchar(1000))";
        $sql_test = " CREATE TABLE `$test`(question_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,answer varchar(1000))";


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

        //deletion from teacher_info table
        $deletionConstaint = false;
        $delimiter = ",";
        $queryForallsubject = "SELECT * FROM teacher_info WHERE Username ='{$teacherName}' ";

        $mysql_queryForAllsubject = mysqli_query($connection, $queryForallsubject) or die("error while bring the subject");
        $subjectList = "";

        $firstTime = true;

        if (mysqli_num_rows($mysql_queryForAllsubject) > 0) {
            while ($rows = mysqli_fetch_assoc($mysql_queryForAllsubject)) {
                $words = explode($delimiter, $rows["SubjectCode"]);

                foreach ($words as $word) {
                    if ($word == $subject) {
                        $deletionConstaint = true;
                    } else {
                        if ($firstTime) {
                            $subjectList .= $word;
                            $firstTime = false;
                        } else {
                            $subjectList .= "," . $word;
                        }
                    }
                }
            }
        }

        if($deletionConstaint)
        {
        
            $query_to_subject = "UPDATE teacher_info SET SubjectCode = '{$subjectList}' WHERE Username = '{$teacherName}'";
            $mysqli = mysqli_query($connection, $query_to_subject)  or die("error in deletion from teacher_info table");

            //---------------->

            mysqli_query($connection, $sql_subject);
            mysqli_query($connection, $sql_optionsheet);
            mysqli_query($connection, $sql_test);
            mysqli_query($connection, $sql_exam_record);
            mysqli_query($connection, $sql_subject_record);

            $query_deletion = mysqli_query($connection, $sql_deletion);
            header("Location: ./testManagmentBoard.php");
        }
        else{
            header("Location: ./testManagmentBoard.php");
        }
    }
} else {
    session_destroy();
    header("Location : ./login.php");
}




// DSA

// Q1. Q 1 2 3 4 A    
// Q2. Q 1 2 3 4 A 


// 109 call Ajax Questionpaper => test_paper=> Q1.Q   Q1.A  online_test=>+1  testRecord=> total  Final Submittion: test_paper(drop), testRecord(drop)