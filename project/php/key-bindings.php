<?php

session_start();
include '../config/connective.php';


if (isset($_POST["submit"])) {
    $_SESSION["table_name"] = $_POST["subject"];
    $_SESSION["no_question"] = $_POST["question_no"];


    $table_name = "online_test_" . $_SESSION["table_name"];


    $sql_username_insertion_in_online_test = "INSERT INTO `$table_name` (Username_test,score) VALUES('{$_SESSION["username"]}','{$_SESSION["score"]}') ";
    $putting_name = mysqli_query($connection, $sql_username_insertion_in_online_test) or die("here problem ");

    $checking_existing = "SELECT `user_name` FROM exam_record WHERE `user_name` = '{$_SESSION["username"]}'";
    $checking = mysqli_query($connection, $checking_existing);

    if (mysqli_num_rows($checking) > 0) {
        //
    } else {
        $exam_record = "INSERT INTO exam_record(`user_name`) values('{$_SESSION["username"]}')";
        mysqli_query($connection, $exam_record);
    }
} else {
    session_destroy();
    header("Location :./login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Key-Bindings</title>

    <link rel="stylesheet" href="../CSS/keybinding.css">
    
</head>

<body class="keybindingBody">

    <div class="container">
        <h1>
            All The Very Best For Your Exam!
        </h1>

        <ul>
            <li>Do Not choose any special character.</li>
            <li>Choose only Alphabets.</li>
            <li>You can choose only once for this exam.</li>
            <li>You can't <strong>Alter</strong> it, once you lock.</li>
            <li>Remember that you will not allowed to use mouse in next step. Do not Try to move your mouse.</li>
        </ul>

        <div id="head">
            <p>Enter your own Choice Key for Selection of Option.</p>
        </div>
        <div class="main form-group">
            <!-- <form action="" class="form-group"> -->

            <label for="option">
                <b>Key for Option-1</b>
                <input id="option-1" class="form-control" type="text" name="opt-key-1" autofocus maxlength="1"></label>
            <span id="op1"></span>

            <label for="option">
                <b>Key for Option-2</b>
                <input id="option-2" class="form-control" type="text" name="opt-key-2" maxlength="1"></label>
            <span id="op2"></span>

            <label for="option">
                <b>Key for Option-3</b>
                <input id="option-3" class="form-control" type="text" name="opt-key-3" maxlength="1"></label>
            <span id="op3"></span>

            <label for="option">
                <b>Key for Option-4</b>
                <input id="option-4" class="form-control" type="text" name="opt-key-4" maxlength="1"></label>
            <span id="op4"></span>
            <br>
            <br>

            <!-- </form> -->
            <div style="display: flex; margin-bottom:10px">
                <button id="lock" class="btn btn-primary btn-lg" style="margin: auto;" disabled><a style="color:white; text-decoration:none" href="">LOCK</a></button>
            </div>
        </div>

    </div>


    <script>
        var a = 1;

        $(document).ready(function() {
            $('#lock').attr('disabled');
            $('#option-1,#option-2,#option-3,#option-4').change(function() {
                if ($(this).val != '') {
                    a++;
                    console.log(a);
                    console.log('1' + this.value);
                    $('#lock').attr('disabled');
                    if (a == 4 || a == 1) {
                        $('#lock').removeAttr('disabled');
                        $("a").attr('href', './questionPaper.php');
                    }
                } else {
                    $('#lock').attr('disabled');
                }
            });
        });
    </script>
    <script>
        var keycode1, keycode2, keycode3, keycode4
        this.input = document.getElementById('option-1');
        input.addEventListener('keypress', function(e) {
            if (e.charCode == 13) {
                return false;
            }
            keycode1 = `Key pressed: ${String.fromCharCode(e.keyCode)} \ncharCode: ${e.keyCode}`;
            // document.getElementById("op1").innerHTML=keycode1;
            console.log(keycode1);
            sessionStorage.setItem("option-1", e.keyCode);
            console.log(sessionStorage.getItem("option-1"));
            // console.localStorage.getItem
        });

        this.input = document.getElementById('option-2');
        input.addEventListener('keypress', function(e) {
            if (e.charCode == 13) {
                return false;
            }
            keycode2 = `Key pressed: ${String.fromCharCode(e.keyCode)} \ncharCode: ${e.keyCode}`;
            // document.getElementById("op2").innerHTML=keycode2;
            console.log(keycode2);
            sessionStorage.setItem("option-2", e.keyCode);
            console.log(sessionStorage.getItem("option-2"));

        });

        this.input = document.getElementById('option-3');
        input.addEventListener('keypress', function(e) {
            if (e.charCode == 13) {
                return false;
            }
            keycode3 = `Key pressed: ${String.fromCharCode(e.keyCode)} \ncharCode: ${e.keyCode}`;
            // document.getElementById("op3").innerHTML=keycode3;
            console.log(keycode3);
            sessionStorage.setItem("option-3", e.keyCode);
            console.log(sessionStorage.getItem("option-3"));

        });

        this.input = document.getElementById('option-4');
        input.addEventListener('keypress', function(e) {
            if (e.charCode == 13) {
                return false;
            }
            keycode4 = `Key pressed: ${String.fromCharCode(e.keyCode)} \ncharCode: ${e.keyCode}`;
            // document.getElementById("op4").innerHTML=keycode4;
            console.log(keycode4);
            sessionStorage.setItem("option-4", e.keyCode);
            console.log(sessionStorage.getItem("option-4"));

        });
    </script>


</body>

</html>