<?php

session_start();
include '../config/connective.php';

$table = "teacher_info"; // table name;
$teacher_name = $_SESSION['teacher_name'];


$subject = null;

if (isset($_COOKIE["subjectName"])) {
    $subject = $_COOKIE["subjectName"];
}

$subjectName = "test_" . $subject;

$optionSheet = "optionsheet_" . $subject;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation-Deletion</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <link rel="stylesheet" href="../CSS/questionupload.css">


</head>

<body class="questionUploadBody">
    <div class="NAVBAR">
        <ul>
            <li>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80.604" height="50.099" viewBox="0 0 107.604 66.099">
                        <g id="Group_2" data-name="Group 2" transform="translate(-60.482 -170.341)">
                            <path id="Path_197" data-name="Path 197" d="M29.207,55.339V7.686L1.537,0,21.816,3.191,15.792,0H45.347V66.1H15.792l6.023-3.226L0,66.1ZM52.265,0H76.091a43.551,43.551,0,0,1,12.3,1.537c4.612.769,7.686,3.074,10.76,6.149s4.612,6.149,6.149,10.76A46.22,46.22,0,0,1,107.6,33.818,37.233,37.233,0,0,1,105.3,47.653a28.942,28.942,0,0,1-6.917,11.529c-2.306,2.306-5.38,3.843-9.223,5.38A46.519,46.519,0,0,1,77.628,66.1H52.265Zm0,0V66.1l23.058-10.76c3.843,0,6.149,0,7.686-.769a12.388,12.388,0,0,0,5.38-3.074c1.537-1.537,2.306-3.074,3.843-6.149s1.537-6.917,1.537-12.3a37.444,37.444,0,0,0-1.537-11.529,16.736,16.736,0,0,0-3.843-6.149c-1.537-1.537-3.843-2.306-6.149-3.074-1.537-.769-5.38-.769-10.76-.769L52.265,0Z" transform="translate(168.086 236.44) rotate(180)" fill="#fff" />
                        </g>
                    </svg>
                </a>
            </li>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">About</a></li>
        </ul>

        <div class="bck" style="padding-right:1rem;color:white">
            <a href="./testManagmentBoard.php">
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 16 16">
                        <defs>
                            <clipPath id="clip-path">
                                <rect width="16" height="16" fill="none" />
                            </clipPath>
                        </defs>
                        <g id="Backward_arrow" data-name="Backward arrow" clip-path="url(#clip-path)">
                            <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(16 16) rotate(180)" fill="#fff" />
                        </g>
                    </svg>
                </span>
            </a>
        </div>
    </div>
    <div class="container paper-area">
        <form action="" method="POST">

            <?php


            //after clicking on the panel of paper it give get the subject name in $subject ;




            $queryForOption = "SELECT * From `$optionSheet`";
            $mysqlFor_query = mysqli_query($connection, $queryForOption) or die("fault in bring question and option");

            $queryForAnswer = "SELECT answer From `$subjectName`";
            $mysqli_Foranswer = mysqli_query($connection, $queryForAnswer) or die("fault in bring answer");

            $counter=1;


            if (mysqli_num_rows($mysqlFor_query) > 0 && mysqli_num_rows($mysqli_Foranswer) > 0) {
                while (($rowdetails = mysqli_fetch_assoc($mysqlFor_query)) && ($rowForAnswer = mysqli_fetch_assoc($mysqli_Foranswer))) {

            ?>


                    <div class="Question form-group">
                        <hr style="border: 2px solid white !important;">
                        <input type="text" disabled name="question_id[<?php echo $counter?>]" id="question_id" value=<?php echo $rowdetails['question_id'] ?>>
                        <textarea class="form-control questionInput" name="question[<?php echo $counter?>]" style="border: 2px solid black;margin-top: 50px;" id="question_s" placeholder="Insert Question Here..."><?php echo $rowdetails['question'] ?></textarea>
                        <ul>
                            <label for="options">Options</label>
                            <li><input class="form-control eventinput" type="text" name="option1[<?php echo $counter?>]" id="option__1" value=<?php echo $rowdetails['option1'] ?> placeholder="Option-1"></li>
                            <br>
                            <li><input class="form-control eventinput" type="text" name="option2[<?php echo $counter?>]" id="option__2" value=<?php echo $rowdetails['option2'] ?> placeholder="Option-2"></li>
                            <br>
                            <li><input class="form-control eventinput" type="text" name="option3[<?php echo $counter?>]" id="option__3" value=<?php echo $rowdetails['option3'] ?> placeholder="Option-3"></li>
                            <br>
                            <li><input class="form-control eventinput" type="text" name="option4[<?php echo $counter?>]" id="option__4" value=<?php echo $rowdetails['option4'] ?> placeholder="Option-4"></li>
                            <label for="Answer">Answer</label>
                            <li><input class="form-control ans_data" type="text" name="answer[<?php echo $counter?>]" id="answer_s" value=<?php echo $rowForAnswer['answer'] ?> placeholder="Correct Answer"></li>
                        </ul>
                    </div>
                    <div class="warn">
                        <p>Update One Question at a time.</p>
                    </div>
                    <div class="actionButton">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary" onclick='saveChanges(<?php echo $counter?>)'>Save Changes</button>
                    </div>
        </form>
    </div>
<?php
                    //make table here with all the updata and save button
                $counter++;
                }
            }
?>

</body>

</html>


<script>
    function saveChanges(counter){
        $.ajax({
            url: "UpdateButton.php",
            type: "POST",
            data: {
                question_id:document.getElementsByName('question_id['+counter+']')[0].value,
                question:document.getElementsByName('question['+counter+']')[0].value,
                option1:document.getElementsByName('option1['+counter+']')[0].value,
                option2:document.getElementsByName('option2['+counter+']')[0].value,
                option3:document.getElementsByName('option3['+counter+']')[0].value,
                option4:document.getElementsByName('option4['+counter+']')[0].value,
                answer:document.getElementsByName('answer['+counter+']')[0].value,
            }
            
        });
    }
</script>