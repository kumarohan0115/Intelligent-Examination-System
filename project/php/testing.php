<?php

// previous createtest.php testing was held on 

// $subjectCheckerquery = "SELECT SubjectCode FROM teacher_info WHERE Username = '{$teacherName}'";
// $checkerSubject= mysqli_query($connection,$subjectCheckerquery);

// echo("hello1   ".mysqli_num_rows($checkerSubject));

// if(mysqli_num_rows($checkerSubject)>0)
// {
//     while($row=mysqli_fetch_assoc($checkerSubject))
//     {
//         if($row["SubjectCode"])
//         {
//             $insertionOfPaperInTeacherTable = "UPDATE teacher_info SET SubjectCode =  CONCAT(SubjectCode,',{$subject}') WHERE Username = '{$teacherName}' " ; //concat fucntion used >>>>>
//             $mysqlFor_paper = mysqli_query($connection,$insertionOfPaperInTeacherTable) or die("database failed"); 
//             echo("multiple subject inserted");
//         }else{
//             $insertionOfPaperInTeacherTable = "UPDATE teacher_info SET SubjectCode =  '{$subject}' WHERE Username = '{$teacherName}' " ; // >>>>>
//             $mysqlFor_paper = mysqli_query($connection,$insertionOfPaperInTeacherTable) or die("database failed"); 
//             echo("one inserted subject");
//         }
//     }
    
// }

echo("testing page");

?>