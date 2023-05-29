<?php

session_start();

include('../config/connective.php');




$_SESSION["table_name"] = $_POST['Table_name']; // session or form

$subject = $_SESSION["table_name"]; // >>>>>

$teacherName = $_SESSION["teacher_name"]; //>>>>>>


$optionsheet = "optionsheet_" . $_SESSION["table_name"];
$test = "test_" . $_SESSION["table_name"];


$tablename = $_SESSION["table_name"];
$table = "online_test_" . $_SESSION["table_name"]; //table name change here for further testing





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


?>