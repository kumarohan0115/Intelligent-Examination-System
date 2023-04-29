<?php
session_start();

        include '../config/connective.php';

        $optionsheet="optionsheet_".$_SESSION["table_name"];       
        
        $count=$_POST['count'];
        $query = "SELECT option1,option2,option3,option4 FROM `$optionsheet` where question_no ='{$count}' ";

        $result = mysqli_query($connection, $query) or die("database cant load");
        if (mysqli_num_rows($result) > 0) {

       while ($rowforjoin = mysqli_fetch_assoc($result)) {


        ?>

        <ul class="options" id="option_list">
            
            <li><label for="opt-1"><input type="radio" id="opt-1" name="select" class="option-1" value="<?php echo  $rowforjoin['option1'] ?>"><?php echo  $rowforjoin['option1'] ?></label></li>
            <li><label for="opt-2"><input type="radio" id="opt-2" name="select" class="option-1" value="<?php echo  $rowforjoin['option2'] ?>"><?php echo  $rowforjoin['option2'] ?></label></li>
            <li><label for="opt-3"><input type="radio" id="opt-3" name="select" class="option-1" value="<?php echo  $rowforjoin['option3'] ?>"><?php echo  $rowforjoin['option3'] ?></label></li>
            <li><label for="opt-4"><input type="radio" id="opt-4" name="select" class="option-1" value="<?php echo  $rowforjoin['option4'] ?>"><?php echo  $rowforjoin['option4'] ?></label></li>

        </ul>

        <?php }
   
    } 
    else{
        session_destroy();
        header("Location :./login.php");
    }
?>



<style>

    #option_list{
        margin: 0;
    }
    #option_list li{
        background-color: rgba(255, 255, 255, 0.5);
        border: 1px solid black;
        border-radius: 22px;
        padding: 10px 1rem;
        margin: 1rem 0;
        list-style: none;
        align-items: center;
    }

    #option_list li label input{
        margin-right: 1rem;
    }
</style>