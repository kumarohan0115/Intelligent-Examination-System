<?php

    include 'connective.php';


    if(isset($_POST["submit"]))
    {
        $student_ID=$_POST["student_id"];
        $branch=$_POST["branch"];
        $fname=$_POST["F_name"];
        $lname=$_POST["L_name"];

        $full_name=$fname." ".$lname;
        $username_for_student=$_POST["Email"];
        $password_of_student=$_POST["password"];

//i will writehere ;


    $sql="INSERT INTO user_info(`student_Id`,`branch`,`name_student`,`user_name`,`password`)
    values('{$student_ID}','{$branch}','{$full_name}','{$username_for_student}','{$password_of_student}')";

    $query= mysqli_query($connection,$sql) or die($full_name);
    
    header("Location: Login.php");

    }
    else{
        session_destroy();
        header("Location :signup.php");
    }

?>