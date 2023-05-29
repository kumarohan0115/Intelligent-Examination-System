<?php

session_start();

include('../config/connective.php');

$tablename = $_POST["table_name"];
$table = "online_test_".$tablename;

$optionsheet = "optionsheet_".$tablename;
$test = "test_".$tablename;

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
// header("Location: ./testManagmentBoard.php");


?>