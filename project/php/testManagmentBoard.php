<?php

session_start();
$dbconnection=require('../config/connective.php')

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
    <link rel="stylesheet" href="../CSS/testManagmentBoard.css">


</head>

<body>
    <nav id="teacher_profile">
        <span id="profile-pic" style="display: flex; padding:20px; z-index:1;">
            <img src="https://images.unsplash.com/photo-1499557354967-2b2d8910bcca?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7d5363c18112a02ce22d0c46f8570147&auto=format&fit=crop&w=635&q=80%20635w" alt="profile-pic" class="profile" id="pic" onclick="click()">
        </span>
    </nav>



    <div class="container" style="position: absolute;">

        <div class="main">

            <div class="formwrapper">

                <form action="./createTest.php" style="z-index: 1;" class="form-group" method="POST">
                    <h2>Create or Delete</h2>

                    <hr>

                    <input id="cre" type="radio" name="check" value="createTable">
                    <label for="create">Create Test paper</label>
                    <br>

                    <input id="del" type="radio" name="check" value="DeleteTable">
                    <label for="delete">Delete Test paper</label>

                    <hr>

                    <div class="fields">
                        <label for="table name" class="inputs">Enter Subject Name:</label>
                        <input id="ppr_name" type="text" name="Table_name" class="form-control" autocomplete="table_name" placeholder="Enter Subject Name" required>
                    </div>

                    <hr>

                    <div class="fields">
                        <label for="no_of_question" class="inputs">Enter No. of Question:</label>
                        <input id="question_num" type="text" name="no_of_question" class="form-control" autocomplete="num-of-question" placeholder="Enter No. of Question">

                    </div>
                    <hr>

                    <div class="fields">
                        <label for="time" class="inputs">Duration for Paper (Minutes):</label>
                        <input type="number" name="time" class="form-control" autocomplete="Duration" placeholder="Duration of paper in Minutes">

                    </div>

                    <div class="button-sub">
                        <button id="create" type="submit" id="sub" name="submit" class="btn btn-lg btn-success" disabled>Go For Upload Question</button>

                    </div>
                    <div class="button-sub">
                        <button id="delete" style="margin: 4px;" type="submit" id="sub" name="submit" class="btn btn-lg btn-danger" disabled>Delete Paper</button>
                        <button id="reset" style="margin: 4px;" type="reset" id="sub" name="reset" class="btn btn-lg btn-warning">Reset</button>

                    </div>
                    <div class="button-sub">

                    </div>


                </form>




                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="record" onclick="show()" class="form-group" method="POST" id="examrecord">

                    <h2>Exam Record</h2>

                    <select name="subject" id="subjects" class="form-control" style="padding:20px">
                        <option value="Select" selected>Select</option>
                        <?php
                        $dbconnection;

                        $sql_subject = "SELECT `subject` FROM subject_info";
                        $show_subject = mysqli_query($connection, $sql_subject) or die("cannot show subject");

                        if (mysqli_num_rows($show_subject) > 0) {
                            while ($row = mysqli_fetch_assoc($show_subject)) {
                        ?>
                            <option value=<?php echo $row["subject"]; ?> name="subject"> <?php echo $row["subject"]; ?> </option>

                        <?php }
                        }
                        ?>
                    </select>

                    <div class="button-sub">
                        <button type="submit" id="sub" name="show" class="btn btn-lg btn-success">SHOW</button>
                    </div>

                </form>

            </div>

            <div class="record custom-table">


                <table>
                    <?php
                    $dbconnection;

                    if (isset($_POST["show"])) {

                        $subject_choosen = $_POST["subject"];
                        $sql_show_record = "SELECT `user_name`,`$subject_choosen` FROM exam_record"; //join concept i do this 
                        $query_show_record = mysqli_query($connection, $sql_show_record) or die("exam record error");

                        if (mysqli_num_rows($query_show_record) > 0) {
                    ?>
                            <tr>

                                <th>Student Name</th>

                                <th><?php echo $subject_choosen; ?></th>

                            </tr>
                            <tr>
                                <?php
                                while ($row_subject = mysqli_fetch_assoc($query_show_record)) {   ?>

                                    <td><?php echo $row_subject["user_name"]; ?></td>
                                    <td> <?php echo $row_subject[$subject_choosen]; ?></td>

                            </tr>

                <?php
                                }
                            }
                        }
                ?>
                </table>
            </div>
        </div>

        <div class="button">
            <div class="bck">
                <a href="../HTML/index.html">
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 16 16">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect width="16" height="16" fill="none" />
                                </clipPath>
                            </defs>
                            <g id="Backward_arrow" data-name="Backward arrow" clip-path="url(#clip-path)">
                                <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(16 16) rotate(180)" fill="#ffff" />
                            </g>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="profile-card" style="margin-left: -400px;">
        <!-- Arrow button -->
        <div class="first">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 16 16">
                    <defs>
                        <clipPath id="clip-path">
                            <rect width="16" height="16" fill="none" />
                        </clipPath>
                    </defs>
                    <g id="Backward_arrow" data-name="Backward arrow" clip-path="url(#clip-path)">
                        <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(16 16) rotate(180)" fill="#ffffff" />
                    </g>
                </svg>
            </span>
        </div>
        <div class="second">
            <img src="https://images.unsplash.com/photo-1499557354967-2b2d8910bcca?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7d5363c18112a02ce22d0c46f8570147&auto=format&fit=crop&w=635&q=80%20635w" alt="profile-pic" class="profile" id="pic">
        </div>
        <div class="details">
            <?php
            $dbconnection;
            $profile_card = "SELECT *FROM teacher_info WHERE `Username`='{$_SESSION["teacher_name"]}'";
            $query_profile = mysqli_query($connection, $profile_card);
            if (mysqli_num_rows($query_profile) > 0) {
                while ($rowl = mysqli_fetch_assoc($query_profile)) {

            ?>
                    <h3><?php echo $_SESSION["teacher_name"]; ?></h3>
                    <!-- <div class="name"><p><?php echo $rowl["teacher_name"]; ?></p></div> -->
                    <div class="phone">
                        <p><?php echo $rowl["Institute_name"]; ?></p>
                    </div>
                    <div class="designation">
                        <p>Teacher</p>
                    </div>
                    <!-- <div class="branch"><p><?php echo $rowl["branch"]; ?></p></div> -->
                    <div class="" style="display: flex;">
                        <button class="btn btn-primary" id="logout">Logout</button>
                    </div>
        </div>
    </div>

<?php

                }
            } ?>
<script>
    $(document).ready(function() {
        $("#record").click(function() {
            $("#record").animate({
                "margin-left": "0%"
            }, 600);
        })

        $("#profile-pic").click(function() {
            $(".profile-card").animate({
                "margin-left": "10px"
            }, 300);
            $(".container").addClass("blurr");
        })

        $(".first span").click(function() {
            $("body").css({
                "opacity": "1"
            });
            $(".profile-card").animate({
                "margin-left": "-400px"
            }, 300);
            $(".container").removeClass("blurr");
        })
        $("#logout").click(function() {
            $.ajax({
                type: 'POST',
                url: 'logout.php',
                data: {
                    logout: "1111"
                },

                // do these thing 
                success: function(response) {
                    window.location.href = "../php/login.php";
                }
            })
        })
    })
</script>


<script>
    var a = 1;

    $(document).ready(function() {
        $('#create').attr('disabled');
        $('#cre,#ppr_name,#question_num').change(function() {
            if ($(this).val != '') {
                a++;
                $('#create').attr('disabled');
                if (a == 3) {
                    $('#create').removeAttr('disabled');
                    $('#delete').attr('disabled');
                }
            } else {
                $('#create').attr('disabled');
            }
        });
    });

    var b = 1
    $(document).ready(function() {
        $('#delete').attr('disabled');
        $('#del,#ppr_name').change(function() {
            if ($(this).val != '') {
                b++;
                $('#create').attr('disabled');
                if (b == 2) {
                    $('#delete').removeAttr('disabled');
                    $('#create').attr('disabled');

                }
            } else {
                $('#delete').attr('disabled');
            }
        });

    })
</script>

</body>

</html>