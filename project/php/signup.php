<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
    <link rel="stylesheet" href="../CSS/credential.css">
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
        <!-- <div class="bubble x10"></div>
        <div class="bubble x2"></div>
        <div class="bubble x6"></div>
        <div class="bubble x7"></div> -->
        <div class="bubble x2"></div>
        <div class="bubble x10"></div>
        <div class="bubble x9"></div>
        <div class="bubble x10"></div>
        <div class="bubble x3"></div>
        <div class="bubble x8"></div>
        <div class="bubble x3"></div>

        <div class="bubble x10"></div>
    </div>



    <div class="main">


        <div class="both">

            <div class="container Teachers">
                <div class="avatar">
                    <!-- <a href="https://codepen.io/MarioDesigns/"> -->
                    <img src="../Assets/avtart.png" alt="Avtar" />
                    <!-- </a> -->
                </div>
                <div class="content">
                    <h1>Teacher's SignUp</h1>
                </div>
            </div>


            <div class="container candidates">
                <div class="avatar">
                    <!-- <a href="https://codepen.io/MarioDesigns/"> -->
                    <img src="../Assets/avtart.png" alt="Avtar" />
                    <!-- </a> -->
                </div>
                <div class="content">
                    <h1>Candidate
                        SignUp</h1>
                </div>
            </div>
        </div>


        <div class="forms">



            <div class="candidate gradient-border">
                <div class="head" style="display:flex; justify-content: space-around;">
                    <div class="before"></div>
                    <div class="head2 linear-wipe">Candidate SignUp</div>
                    <div class="after"></div>
                </div>
                <form action="candidate-signup.php" method="POST">

                    <hr style="color: white !important;">
                    <div class="fields row">
                        <div class="col">
                            <label for="ID">Student ID <span style="color:red">*</span> </label>
                            <input type="text" name="student_id" class="form-control" placeholder="Student ID" required>
                        </div>
                        <div class="col">
                            <label for="ID">Branch <span style="color:red">*</span> </label>
                            <input type="text" name="branch" class="form-control" placeholder="Branch" required>
                        </div>
                    </div>
                    <div class=" fields row">
                        <div class="col">
                            <label for="Name">First Name <span style="color:red">*</span> </label>
                            <input type="text" name="F_name" class="form-control" autocomplete="First-name" placeholder="First Name" required>

                        </div>
                        <div class="col">
                            <label for="Name">Last Name <span style="color:red">*</span> </label>
                            <input type="text" name="L_name" class="form-control" autocomplete="Last-name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <!-- <div class="eppb">
                            <label for="institute" class="inputs">Institute Name: <span style="color:red">*</span> </label>
                            <input type="text" name="Institute_Name" style="outline: none;" class="form-control" autocomplete="Institute Name" placeholder="Institute Name">
                        </div> -->
                    <div class="eppb">
                        <label for="Email">Email <span style="color:red">*</span> </label>
                        <input type="email" class="form-control" id="Usermail" name="Email" autocomplete="Email" required placeholder="Email" required>
                    </div>
                    <div class="eppb">
                        <label for="Password">Password <span style="color:red">*</span> </label>
                        <input type="password" autocomplete="current-password" class="form-control" minlength="8" maxlength="16" required placeholder="Password">
                    </div>
                    <div class="eppb">
                        <label for="Password">Confirm Password <span style="color:red">*</span> </label>
                        <input type="password" autocomplete="current-password" name="password" class="form-control" minlength="8" maxlength="16" required placeholder="Password">
                        <p>Password must be same as Above </p>
                    </div>
                    <div class="eppb" style="display:flex">
                        <button type="submit" onclick="signup()" name="submit" class="btn-lg btnn btn-primary">Register</button>
                    </div>
                    <div class="login">
                        <p>Registered Candidate <a href="Login.php" style="color: #00b4ff;">Login</a> here.</p>
                    </div>

                </form>
            </div>

            <!-- <hr style="rotate: 90deg;" color="black"> -->

            <div class="proctor gradient-border">
                <div class="head" style="display:flex; justify-content: space-around;">
                    <div class="before"></div>
                    <div class="head2">Teacher SignUp</div>
                    <div class="after"></div>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <hr style="color: white !important;">
                    <div class="fields row">
                        <div class="col">
                            <label for="institute" class="inputs">Institute Name: <span style="color:red">*</span> </label>
                            <input type="text" name="Institute_Name" style="outline: none;" class="form-control" autocomplete="Institute Name" placeholder="Institute Name">
                        </div>
                        <div class="col">
                            <label for="ID">Branch <span style="color:red">*</span> </label>
                            <input type="text" name="branch" class="form-control" placeholder="Branch" required>
                        </div>
                    </div>
                    <div class=" fields row">
                        <div class="col">
                            <label for="Name">Full Name <span style="color:red">*</span> </label>
                            <input type="text" name="F_name" class="form-control" autocomplete="First-name" placeholder="First Name" required>

                        </div>
                        <div class="col">
                            <label for="Name">Last Name <span style="color:red">*</span> </label>
                            <input type="text" name="L_name" class="form-control" autocomplete="Last-name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="eppb">
                        <label for="Email" class="inputs">E-Mail <span style="color:red">*</span> </label>
                        <input type="email" name="email" style="outline: none;" class="form-control" autocomplete="Email" placeholder="Email">
                    </div>
                    <div class="eppb">
                        <label for="Password">Password <span style="color:red">*</span> </label>
                        <input type="password" autocomplete="current-password" name="" class="form-control" minlength="8" maxlength="16" required placeholder="Password">
                    </div>
                    <div class="eppb">
                        <label for="Password">Confirm Password <span style="color:red">*</span> </label>
                        <input type="password" autocomplete="current-password" name="Confirm_password" class="form-control" minlength="8" maxlength="16" required placeholder="Password">
                        <p>Password must be same as Above </p>
                    </div>
                    <div class="eppb" style="display:flex">
                        <button type="submit" onclick="signup()" name="Register" class="btn-lg btnn btn-primary">Register</button>
                    </div>
                    <div class="login">
                        <p>Registered Teacher <a href="Login.php" style="color: #00b4ff;">Login</a> here.</p>
                    </div>
                </form>

            </div>
        </div>

        <div class="button">
            <div class="bck">
                <span>
                    <a href="../HTML/index.html">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 16 16">
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
                $(".candidate").hide();
                $(".proctor").show();
            })

            $(".candidates").click(function() {
                $(".proctor").hide();
                $(".candidate").show();
            })
        })



        // function signup()
        // {
        //     alert("sucessfully! Signed-up")
        // }
    </script>
</body>

</html>



<?php

include '../config/connective.php';
if (isset($_POST["Register"])) {
    $Institution = $_POST["Institute_Name"];
    $branch = $_POST['branch'];
    $F_name = $_POST['F_name'];
    $L_name = $_POST['L_name'];

    $full_name = $F_name . " " . $L_name;

    $username_teacher = $_POST["email"];
    $password_teacher = $_POST["Confirm_password"];

    $sql_teacher = "INSERT INTO teacher_info(`Institute_name`,`branch`,`teacher_name`,`Username`,`Password`) 
            VALUES('{$Institution}','{$branch}','{$full_name}','{$username_teacher}','{$password_teacher}')";  //apne according big kr lo branch ko ;

    // $sql_teacher="INSERT INTO teacher_info(`Institute_name`,`branch`,`F_name`,`L_name`,`Username`,`Password`) 
    // VALUES('{$Institution}','{$branch}','{$F_name}','{$L_name}','{$username_teacher}','{$password_teacher}')";   
    mysqli_query($connection, $sql_teacher) or die("failed");
}
?>