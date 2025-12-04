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

// Remove subject code from teacher_info table's SubjectCode column
$teacher_username = $_SESSION['teacher_name'];

// Get current SubjectCode for the teacher
$get_subjects_query = "SELECT SubjectCode FROM teacher_info WHERE Username = '{$teacher_username}'";
$result = mysqli_query($connection, $get_subjects_query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $current_subjects = $row['SubjectCode'];
    
    // Remove the deleted subject from the comma-separated list
    $subjects_array = explode(',', $current_subjects);
    $subjects_array = array_filter($subjects_array, function($subject) use ($tablename) {
        return trim($subject) !== $tablename;
    });
    $new_subjects = implode(',', $subjects_array);
    
    // Update the teacher_info table with the new subject list
    $update_teacher_query = "UPDATE teacher_info SET SubjectCode = '{$new_subjects}' WHERE Username = '{$teacher_username}'";
    mysqli_query($connection, $update_teacher_query);
}

mysqli_query($connection, $sql_subject);
mysqli_query($connection, $sql_optionsheet);
mysqli_query($connection, $sql_test);
mysqli_query($connection, $sql_exam_record);
mysqli_query($connection, $sql_subject_record);

$query_deletion = mysqli_query($connection, $sql_deletion);
// header("Location: ./testManagmentBoard.php");


?>