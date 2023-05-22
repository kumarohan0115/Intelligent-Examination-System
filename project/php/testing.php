<?php

//deletion of the selected subject from database;

include("../config/connective.php");

$_subject  = "CN";
$teacher_username= "shashank.chaurasia@gmail.com";

$delimiter = ",";
$queryForallsubject = "SELECT * FROM teacher_info WHERE Username ='{$teacher_username}' ";

$mysql_queryForAllsubject = mysqli_query($connection, $queryForallsubject) or die("error while bring the subject");
$subjectList = "";

$firstTime= true;

if (mysqli_num_rows($mysql_queryForAllsubject) > 0) {
    while ($rows = mysqli_fetch_assoc($mysql_queryForAllsubject)) {
        $words = explode($delimiter, $rows["SubjectCode"]);

        foreach ($words as $word) {
            if($word == $_subject)
            {
                echo("found the subject".$word."<br/>");
            }
            else{
                if($firstTime)
                {
                    $subjectList .=$word;
                    $firstTime = false; 
                }
                else{
                    $subjectList .=",".$word; 

                }
            }

        }
    }
}

$query_to_subject = "UPDATE teacher_info SET SubjectCode = '{$subjectList}' WHERE Username = '{$teacher_username}'";
$mysqli = mysqli_query($connection,$query_to_subject)  or die("error");
if($mysqli)
{
    echo("success");
}


echo("testing page");
