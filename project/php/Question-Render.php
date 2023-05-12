<?php
  
    session_start();
    
    include '../config/connective.php';

    $optionsheet="optionsheet_".$_SESSION["table_name"];


    //wait for second 

    $count=$_POST['count'];
    $query = "SELECT question FROM `$optionsheet` where question_id ='{$count}' ";

    $result = mysqli_query($connection, $query) or die("database cant load");
    if (mysqli_num_rows($result) > 0) {

       while ($rowforjoin = mysqli_fetch_assoc($result)) {
    ?>
        <textarea disabled name ="question" id= "questions"><?php echo  $rowforjoin['question'] ?></textarea> 
    
    <?php }
   }
   else{
       session_destroy();
       header("Location :./login.php");
   }
   ?>

   <style>
    #questions{
        height: 100%; 
        width:100%; 
        border:0px solid green; 
        border-radius: 8px; 
        resize: none; 
        padding:1rem
    }
   </style>


