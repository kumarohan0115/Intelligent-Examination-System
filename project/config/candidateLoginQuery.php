<?php
session_start();

$log=$_POST["username"];


// $question_no=5;


include 'connective.php';

if(isset($_POST["candidate-login"]))
{
    


    // $username=$_SESSION["username"] ; // will change
    $Password= $_POST["password"];

    $sql="SELECT `user_name` FROM user_info where `user_name`= '{$log}' and `password`='{$Password}'";

    $finally= mysqli_query($connection,$sql) or die("login fail");

    if(mysqli_num_rows($finally)>0)
    {

        $_SESSION["username"]=$_POST["username"];
        $_SESSION["score"]=0;
        header("Location: ../php/liveTest.php");
        

    }
    else 
    {
        echo '<div class="alert alert-danger">check your username Or Password.</div>';
        header("Location: Login.php");
    }
}
else {
    session_destroy();
    header("Location :index.html");
}




?>