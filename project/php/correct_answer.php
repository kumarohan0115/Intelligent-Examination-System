

<?php
session_start();
//dont tocuh these;




include 'connective.php';
// use json or these method
// header("location: correct_answer.php");
$current_quesition="question".$_POST["count"];

$table_name= "online_test_".$_SESSION["table_name"];

$test="test_".$_SESSION["table_name"];

$answer=$_POST["answer"];
$question=$_POST["question"]; 

$sql=" SELECT *  FROM `$test` where question='{$question}' AND answer='{$answer}'";
$correct_query= mysqli_query($connection,$sql) or die("heheheh");

if(mysqli_num_rows($correct_query)>0)
{
    
    $_SESSION["score"]+=1;
 
   
    $correct_sql_NULL="UPDATE `$table_name` SET `score`='{$_SESSION["score"]}',`$current_quesition` = true  WHERE `Username_test`='{$_SESSION["username"]}' AND  `$current_quesition` IS NULL"; // if null and true then icrenemnt the score 
    $correct_sql_false="UPDATE `$table_name` SET `score`='{$_SESSION["score"]}',`$current_quesition` = true  WHERE `Username_test`='{$_SESSION["username"]}' AND  `$current_quesition`= false "; // if null and true then icrenemnt the score 
    

    
    $correct_answer_sql=" SELECT *  FROM `$table_name` where `Username_test`='{$_SESSION["username"]}' AND  `$current_quesition`= true ";
    $correct_answer_query=mysqli_query($connection,$correct_answer_sql);
    
    if(mysqli_num_rows($correct_answer_query)>0)
    {
            $_SESSION["score"]-=1;
            $correct_sql_true="UPDATE `$table_name` SET `score`='{$_SESSION["score"]}',`$current_quesition` = true  WHERE `Username_test`='{$_SESSION["username"]}' AND  `$current_quesition`= true";
            $query_sql_true=mysqli_query($connection,$correct_sql_true) or die("query_sql_true");
    }

    

    $query_sql_NULL = mysqli_query($connection,$correct_sql_NULL) or die("query sql null");
    $query_sql_false=mysqli_query($connection,$correct_sql_false) or die("correct_sql_false");


    // header("Location: question.php");
}

else{
   
    $checking_sql_NULL= "SELECT * FROM $table_name where `Username_test`='{$_SESSION["username"]}' and  $current_quesition IS NULL ";
    $checking_sql_true= "SELECT * FROM $table_name where `Username_test`='{$_SESSION["username"]}' and  $current_quesition=true "; // if answrer is false and option is true then socre-- and option to false

    $checking_query_NULL=mysqli_query($connection,$checking_sql_NULL) or die("cheecking_query_null");
    $checking_query_true=mysqli_query($connection,$checking_sql_true) or die("checking_query_true");


    if(mysqli_num_rows($checking_query_true)>0)
    {
        $_SESSION["score"]-=1;
        

        $checking="UPDATE `$table_name` SET `score`='{$_SESSION["score"]}', `$current_quesition` =false  WHERE `Username_test`='{$_SESSION["username"]}'";
        $check_qeury = mysqli_query($connection,$checking) or die("server fail to load the correct answer");
            
    }
     if(mysqli_num_rows($checking_query_NULL)>0)
    {//
        if(empty($answer)==1)
        {
            $NULL="UPDATE `$table_name` SET `$current_quesition` = NULL  WHERE `Username_test`='{$_SESSION["username"]}'";
            $NULL_query=mysqli_query($connection,$NULL) or die(1000);
        }
        else{
            $NULL_false="UPDATE `$table_name` SET `$current_quesition` = false  WHERE `Username_test`='{$_SESSION["username"]}'";
            mysqli_query($connection,$NULL_false);
        }

    }
}


?>
