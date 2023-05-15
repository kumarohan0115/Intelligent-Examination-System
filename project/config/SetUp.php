<?php

$server_name = "localhost";
$user_name= "root";
$password="";
$database_name="dare_to_cheat_me"; //now i have changed the database name

/* setup query part for phase-2

create DATABASE dare_to_cheat;

create table exam_record (S_no int , username varchar(100));

create table TestInformation( Subject varchar(20) , NumberOfQuestions int , duration varchar(10) );

create table FaculityInformation( InstituteName text , Branch text,teacher_name varchar(100),username varchar(50) , Password varchar(100) );

create table CandidateInformation( StudentId int,Branch varchar(20),NameOfStudent varchar(30),Username varchar(50),password varchar(20) );

*/
$connection= mysqli_connect($server_name,$user_name,$password);
if($connection)
{
    $query = "CREATE DATABASE dare_to_cheat_me";
    $sql_query = mysqli_query($connection,$query);  
    if($sql_query)
    {
        $main_connection = mysqli_connect($server_name,$user_name,$password,$database_name) or die("databases not created");
        $automation_setup = "USE dare_to_cheat_me ;
        create table exam_record (S_no int(11) PRIMARY KEY AUTO_INCREMENT , user_name varchar(100));
        create table subject_info( subject varchar(20) , no_question int(11) , duration int(10));
        create table teacher_info( Institute_name text , branch text,teacher_name varchar(100),Username varchar(50) , Password varchar(100),SubjectCode varchar(10));
        create table user_info( student_id int(6),branch text,name_student varchar(30),user_name varchar(50),password varchar(20) );
        ";

        $mysqli_automatic = mysqli_multi_query($main_connection,$automation_setup) or die("error occur during setup".mysqli_connect_errno());
    }

}
else{
    die("not done".mysqli_connect_error());
}
?>
