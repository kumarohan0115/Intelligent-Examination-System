<?php
session_start();
$dbconnection = require('../config/connective.php');
$dbconnection;
$sql_Univer_name = "SELECT `Institute_name` FROM teacher_info WHERE `Username`='{$_SESSION['teacher_name']}' ";
$inst_name = mysqli_query($connection, $sql_Univer_name);
if (mysqli_num_rows($inst_name) > 0) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Question Upload</title>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">

        <link rel="stylesheet" href="../CSS/questionUpload.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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
                <?php while ($roww = mysqli_fetch_assoc($inst_name)) { ?>
                    <li><?php echo $roww['Institute_name']; ?></li>
            <?php
                }
            }
            ?>
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <?php
                $dbconnection;

                $count = $_SESSION["number_question"];


                for ($i = 0; $i < $count; $i++) {
                    $a = 1


                ?>


                    <div class="Question form-group">
                        <h2>Question: <?php echo $i + 1 ?></h2>

                        <hr style="border: 2px solid white !important;">
                        <textarea class="form-control questionInput" name="paperdata[<?php echo $i ?>][question]" style="border: 2px solid black;margin-top: 50px;" id="question" placeholder="Insert Question Here..."></textarea>
                        <ul>
                            <label for="options">Options</label>
                            <li><input class="form-control eventinput" type="text" name="paperdata[<?php echo $i ?>][option_1]" id="" placeholder="Option-1"></li>
                            <br>
                            <li><input class="form-control eventinput" type="text" name="paperdata[<?php echo $i ?>][option_2]" id="" placeholder="Option-2"></li>
                            <br>
                            <li><input class="form-control eventinput" type="text" name="paperdata[<?php echo $i ?>][option_3]" id="" placeholder="Option-3"></li>
                            <br>
                            <li><input class="form-control eventinput" type="text" name="paperdata[<?php echo $i ?>][option_4]" id="" placeholder="Option-4"></li>
                            <label for="Answer">Answer</label>
                            <li><input class="form-control ans_data" type="text" name="paperdata[<?php echo $i ?>][answer]" id="" placeholder="Corect Answer"></li>
                        </ul>
                    </div>


                <?php
                }
                ?>
                <div class="warn">
                    <p>Please have a preview before upload!</p>
                </div>
                <div class="actionButton">
                    <button type="submit" name="submit" class="btn btn-lg btn-primary">Upload</button>
                </div>
            </form>
            <button class=" preview btn btn-danger " data-bs-toggle="modal" data-bs-target="#termsOfuse">Preview</button>

        </div>
        <!-- Question Table for Review=============================================>  for Take a loook before Upload the Question paper -->

        <div class="modal fade" id="termsOfuse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="termsOfuseLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title modal-heading" id="termsOfuseLabel">Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-container">

                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Question</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody id='tableBody'>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>


    <?php



    if (isset($_POST["submit"])) {
        function insertData($data)
        {

            include '../config/connective.php';

            $question = $data['question'];
            $option_1 = $data['option_1'];
            $option_2 = $data['option_2'];
            $option_3 = $data['option_3'];
            $option_4 = $data['option_4'];
            $Answer = $data['answer'];

            
            $optionsheet = "optionsheet_" . $_SESSION["table_name"];
            $test = "test_" . $_SESSION["table_name"];

            $sql = "INSERT INTO `$optionsheet`(`question`,`option1`,`option2`,`option3`,`option4`) 
            values('{$question}','{$option_1}','{$option_2}','{$option_3}','{$option_4}')";

            mysqli_query($connection, $sql) or die("question nhi gya");



            $sql2 = "INSERT INTO `$test`(answer) VALUE('{$Answer}')";
            mysqli_query($connection, $sql2) or die("answer nhi gya");
        }
        array_map("insertData", $_POST['paperdata']);

    }


    ?>





    <script>
        // Question========================>>

        // createTable Loop
        var a = document.getElementsByClassName('questionInput');
        for (let tr = 0; tr < a.length; tr++) {
            let tablerow = document.createElement('tr');

            let tdId = document.createElement('td');
            tdId.className = 'row_id';
            tdId.innerHTML = tr + 1;

            let tdQ = document.createElement('td');
            tdQ.id = 'preview_' + tr + '_question';
            tdQ.className = 'preview_field';

            let tdop1 = document.createElement('td');
            tdop1.id = 'preview_' + tr + '_option_1';
            tdop1.className = 'preview_field';

            let tdOp2 = document.createElement('td');
            tdOp2.id = 'preview_' + tr + '_option_2';
            tdOp2.className = 'preview_field';

            let tdOp3 = document.createElement('td');
            tdOp3.id = 'preview_' + tr + '_option_3';
            tdOp3.className = 'preview_field';

            let tdOp4 = document.createElement('td');
            tdOp4.id = 'preview_' + tr + '_option_4';
            tdOp4.className = 'preview_field';

            let tdAnswer = document.createElement('td');
            tdAnswer.id = 'preview_' + tr + '_answer';
            tdAnswer.className = 'preview_field';

            tablerow.appendChild(tdId)
            tablerow.appendChild(tdQ)
            tablerow.appendChild(tdop1)
            tablerow.appendChild(tdOp2)
            tablerow.appendChild(tdOp3)
            tablerow.appendChild(tdOp4)
            tablerow.appendChild(tdAnswer)

            document.getElementById('tableBody').appendChild(tablerow)
        }


        var y = document.getElementsByClassName('questionInput');
        console.log(y.length)
        for (let i = 0; i < y.length; i++) {
            y[i].addEventListener('change', (e) => {
                console.log(e.target.name)
                var q_name = e.target.name.replace('paperdata[', '').split(']'); //paperdata[0][question]  => 0][question] => 0,[question => 0, question
                q_name[1] = q_name[1].replace('[', '') //0====>question
                // console.log()
                document.getElementById('preview_' + q_name[0] + '_' + q_name[1]).innerHTML = e.target.value

            })
        }

        // input==========================>>


        var x = document.getElementsByClassName('eventinput');
        for (let i = 0; i < x.length; i++) {
            x[i].addEventListener("change", (e) => {

                var op_name = e.target.name.replace('paperdata[', '').split(']');
                op_name[1] = op_name[1].replace('[', '')
                console.log(op_name[0] + "=================>" + op_name[1])
                document.getElementById('preview_' + op_name[0] + '_' + op_name[1]).innerHTML = e.target.value


            });
        }


        // answer==============================>

        var z = document.getElementsByClassName('ans_data');
        for (let i = 0; i < z.length; i++) {
            z[i].addEventListener("change", (e) => {

                var ans_name = e.target.name.replace('paperdata[', '').split(']');
                ans_name[1] = ans_name[1].replace('[', '')
                console.log(ans_name[0] + "===========>" + ans_name[1]);
                document.getElementById('preview_' + ans_name[0] + '_' + ans_name[1]).innerHTML = e.target.value
            });
        }
    </script>