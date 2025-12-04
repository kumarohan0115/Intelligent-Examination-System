<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <link rel="stylesheet" href="../CSS/credential.css">
    <!-- <link rel="stylesheet" href="./js/Jquery.js"> -->
</head>


<body>


    <div id="background-wrap">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x2"></div>
        <div class="bubble x4"></div>
        <div class="bubble x10"></div>
        <div class="bubble x5"></div>
        <div class="bubble x10"></div>
        <div class="bubble x2"></div>
        <div class="bubble x6"></div>
        <div class="bubble x7"></div>
        <div class="bubble x2"></div>
        <div class="bubble x10"></div>

    </div>

    <?php


    if (empty($_SESSION["username"]) && empty($_SESSION["teacher_name"])) {
    ?>
        <div class="main">
            <div class="both">

                <div class="container Teachers">
                    <div class="avatar">
                        <!-- <a href="https://codepen.io/MarioDesigns/"> -->
                        <img src="../Assets/avtart.png" alt="Avtar" />
                        <!-- </a> -->
                    </div>
                    <div class="content">
                        <h1 style="font-weight:600">Teacher's Login</h1>
                    </div>
                </div>


                <div class="container candidates">
                    <div class="avatar">
                        <!-- <a href="https://codepen.io/MarioDesigns/"> -->
                        <img src="../Assets/avtart.png" alt="Avtar" />
                        <!-- </a> -->
                    </div>
                    <div class="content">
                        <h1 style="font-weight:600">Candidate Login</h1>
                    </div>
                </div>
            </div>
        <?php

    }
    // else{
    //     session_destroy();
    //     header("Location : index.html");
    // }
    if (!empty($_SESSION["username"])) {
        header("Location: ../php/liveTest.php");
    }
    if (!empty($_SESSION["teacher_name"])) {
        header("Location: ../php/testManagmentBoard.php");
    }


        ?>



        <div class="forms">

            
            
        <!-- <hr style="rotate: 90deg;" color="black"> -->
        <!-- Teacher -->

        <div class="proctor gradient-border">
            <div class="head" style="display:flex; justify-content: space-around;">
                <div class="before"></div>
                <div class="head2">Teacher Login</div>
                <div class="after"></div>
            </div>
            <form action="teacher-login.php" method="POST">

                <hr style="color: white !important;">

                <div class="eppb">
                    <label for="UserName" class="inputs"> Registered_Email <span style="color:red">*</span> </label>
                    <input type="email" name="username" style="outline: none;" class="form-control" autocomplete="Roll-Number" placeholder="Registred Email" autofocus>
                </div>
                <div class="eppb">
                    <label for="Password">Password <span style="color:red">*</span> </label>
                    <input type="password" autocomplete="current-password" name="password" class="form-control" required placeholder="Password">
                </div>
                <div class="eppb" style="display: flex;">
                    <button type="submit" id="sub" name="login" class="btn btn-lg btn-primary">Login</button>
                </div>
                <div class="login">
                    <p>Not Registered Yet <a href="signup.php" style="color: #00b4ff;">Register</a> here.</p>
                </div>
            </form>
        </div>


        <!-- Candidate -->

        <div class="candidate gradient-border">
            <div class="head" style="display:flex; justify-content: space-around;">
                <div class="before"></div>
                <div class="head2 linear-wipe">Candidate Login</div>
                <div class="after"></div>
            </div>

            <form action="../config/candidateLoginQuery.php" method="POST">
                
                <hr style="color: white !important;">
                <div class="eppb">
                    <label for="Email" class="inputs">E-Mail <span style="color:red">*</span> </label>
                    <input type="email" name="username" style="outline: none;" class="form-control" autocomplete="Email" placeholder="Email" autofocus>

                </div>
                <div class="eppb">
                    <label for="Password" class="inputs">Password: <span style="color:red">*</span> </label>
                    <input type="password" name="password" class="form-control" autocomplete="current-password" placeholder="Password">
                </div>
                <div class="eppb" style="display: flex;">
                    <button type="submit" id="login" name="candidate-login" class="btn btn-lg btn-primary">Login</button>
                </div>
                <div class="login">
                    <p>Not Registered Yet <a href="signup.php" style="color: #00b4ff;">Register</a> here.</p>
                </div>
            </form>
        </div>

    </div>
        <div class="button">
            <div class="bck">
                <span>
                    <a id="bck" href="../HTML/index.html"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 16 16">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect width="16" height="16" fill="none" />
                                </clipPath>
                            </defs>
                            <g id="Backward_arrow" data-name="Backward arrow" clip-path="url(#clip-path)">
                                <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(16 16) rotate(180)" fill="#11111" />
                            </g>
                        </svg>
                    </a>
                </span>
            </div>
        </div>

        </div>


        <script>
            $(document).ready(function() {
                $(".Teachers").click(function() {
                    // $(".both").hide();
                    // $("#bck").removeAttr("href");
                    $(".proctor").show();
                    $(".candidate").hide();
                })
                
                $(".candidates").click(function() {
                    // $(".both").hide();
                    // $("#bck").removeAttr("href");
                    $(".candidate").show();
                    $(".proctor").hide();
                })
            })
        </script>
</body>

</html>