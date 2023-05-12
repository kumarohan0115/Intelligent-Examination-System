<?php

session_start();
include '../config/connective.php';

    $cookiesSubjectName = $_COOKIE["subjectName"];
    $optionsheet = "optionsheet_".$cookiesSubjectName;
    $subjectName = "test_".$cookiesSubjectName;

    $questionId = $_POST['question_id'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];
  
    
    $updateQuery = "UPDATE `$optionsheet` SET question='{$question}',option1='{$option1}',option2='{$option2}',option3='{$option3}',option4='{$option4}' WHERE question_id = '{$questionId}'";
    $mysqli_updateQuery = mysqli_query($connection, $updateQuery) or die("updating process has been stopped");
    
    $updateAnswer = "UPDATE `$subjectName` SET answer = '{$answer}' WHERE question_id = '{$questionId}' ";
    $mysqli_UpdateAnswer = mysqli_query($connection, $updateAnswer) or die("updating in answer went fail");


?>