<?php
// session_start();
// $question=$_GET["question"];
// print_r($question);
$paper=array();

    // [0]=>array(
    //     [0]=>'shahsank',
    //     [1]=>'shahsank',
    //     [2]=>'shahsank'



print_r($paper);
?>
<head>
    <link rel= "stylesheet" href ="after_login.css">
</head>



<div class = "record custom-table">
    
    <table>
        
        <tr>
            <th>question-sheet</th>
            <th>option-sheet1</th>
            <th>option-sheet2</th>
        </tr>
        <?php
    //multiassoc 
  
    for($i=0;$i<4;$i++)
    {
        echo "<tr>";
        for($y=0;$y<3;$y++)
        {
            echo"<td>";
            echo $paper[$i][$y];
            echo"</td>"; 
        }
        echo"</tr>";
        echo"<br>";
    }
        ?>    
        

</table>

</div>