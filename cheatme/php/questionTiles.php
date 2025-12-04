<script>
     var number= <?=$_POST['count'];?>;
</script>
<?php 
session_start();
require '../config/connective.php';


$current_question="question".$_POST["count"];

$table_name="online_test_".$_SESSION["table_name"];


$color="SELECT *FROM `$table_name` WHERE `$current_question` IS NOT NULL";

$color_query=mysqli_query($connection,$color) or die("color changing problem in $current_question");

if(mysqli_num_rows($color_query)>0)
{
?>

<script>
   
    document.getElementById('thelist'+number).setAttribute('style', 'display: inline-block; margin:8px; padding:9px; background-color:green ; color:white;');                     
    document.getElementById('thelist'+number).innerHTML=number;

</script>

<?php
}
else{
?>
<script>
    document.getElementById('thelist'+number).innerHTML=number;
    </script>

<?php

}

?>
