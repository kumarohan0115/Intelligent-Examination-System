<?php
session_start(); // session is god

if (!empty($_SESSION["username"])) {


?>

    <script>
        var warning = 0; //  data will come from html side not from php 
        let where = 1;


        var paperDuration = '<?= $_SESSION["time"] ?>';
        var total_question = '<?= $_SESSION["no_question"] ?>'; // need this thing god like power

        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: 'exam_end.php'

            }), document.getElementById("man").style.display = "none";
            document.getElementById("finish").style.display = "block";

            window.location.href = "../HTML/index.html";
        }, 60000 * timer); //timer function for paper

        // =======
        // });

        // document.getElementById("man").style.display="none";
        // document.getElementById("finish").style.display="block";
        // window.location.href="index.html";}

        // ,60000*timer);

        setTimeout(function() {
            $(document).ready(function() {
                $(".sweet-alert").css({
                    "visibility": "visible"
                });
                // $(".sweet-alert").animate({"visibility":"hidden"},10000);
            })
        }, 60000 * (timer - 1));

        var total_question = '<?= $_SESSION["no_question"] ?>'; // need this thing god like power
        //   console.log("Time hu mai:"+timer);
    </script>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examination</title>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../CSS/questionPaper.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <script>
        const fullScn = () => {
            function requestFullScreen(element) {
                // Supports most browsers and their versions.
                var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

                if (requestMethod) { // Native full screen.
                    requestMethod.call(element);
                } else
                if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                    var wscript = new ActiveXObject("WScript.Shell");
                    if (wscript !== null) {
                        wscript.SendKeys("{F11}");
                    }
                }
            }
            var elem = document.body; // Make the body go full screen.
            requestFullScreen(elem);
        }

        const mark = () => {
            $(document).click;
            document.getElementById('thelist' + where).style.backgroundColor = "rgb(255, 217, 29)"
        }
        const unmark = () => {
            $(document).click;
            document.getElementById('thelist' + where).style.backgroundColor = "red" // i was working here
        }

        window.addEventListener("load", () => {
            document.getElementById("full-screen").click();
        })
    </script>

    <!-- onmouseleave="mouseLeave()"   need to paste in Body left of style -->

    <body id="bdy" style="visibility: visible;">
        <nav>
            <div class="navbar">
                <ul>
                    <?php
                    require '../config/connective.php';

                    $profile_card = "SELECT *FROM user_info WHERE `user_name`='{$_SESSION["username"]}'";
                    $query_profile = mysqli_query($connection, $profile_card);
                    if (mysqli_num_rows($query_profile) > 0) {
                        while ($rowler = mysqli_fetch_assoc($query_profile)) {
                    ?>  <!-- <li>Institute Name</li> -->
                        <li>Subject Name:
                            <?php echo ($_SESSION["table_name"]) ?>
                        </li>
                </ul>
                <ul>
                    <div class="sweet-alert" id="timeofExam" style="background-color: tomato; color:white; padding: 10px;">
                        <script>
                            function startTimer(duration, display) {
                                var timer = duration,
                                    minutes, seconds;
                                setInterval(function() {
                                    minutes = parseInt(timer / 60, 10);
                                    seconds = parseInt(timer % 60, 10);

                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;

                                    display.textContent = minutes + ":" + seconds;

                                    if (--timer < 0) {
                                        timer = duration;
                                    }
                                }, 1000);
                            }

                            window.onload = function() {
                                var fiveMinutes = 60 * paperDuration,
                                    display = document.querySelector('#timeofExam');
                                startTimer(fiveMinutes, display);
                            };
                            // document.getElementsByClassName('sweet-alert')[0].innerHTML = timer;
                        </script>
                    </div>
                    <li>
                        <?php echo $rowler["user_name"]; ?>
                    </li>
                    <li>
                        <?php echo $rowler["student_Id"]; ?>
                    </li>
                    <li><span style="font-size: 40px;" class="material-icons orange600">face</span></li>
            <?php
                        }
                    }
            ?>
                </ul>
            </div>
        </nav>

        <div class="main" id="man">
            <div class="content col-8">

                <form action="correct_answer.php" method="POST" class="form-group">
                    <div class="question">
                        <div class="question-box">

                        </div>
                        <div id='option_and_key'>
                            <div class="options" id="option_area">
                            </div>
                            <div class="selected_key">
                                <div id="key_wrapper">
                                    <div>
                                        <ul>
                                            <li>Key</li>
                                            <hr>
                                            <li id="key-id1">key1</li>
                                            <li id="key-id2">key2</li>
                                            <li id="key-id3">key3</li>
                                            <li id="key-id4">key4</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>For</li>
                                            <hr>
                                            <li>option-1</li>
                                            <li>option-2</li>
                                            <li>option-3</li>
                                            <li>option-4</li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="pre_nxt_btn">
                                    <li><span><i class="fa fa-caret-left"></i></span> Previous</li>
                                    <li> Next <span><i class="fa fa-caret-right"></i></span></li>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                <script>
                    document.getElementById('key-id1').innerHTML = String.fromCharCode(sessionStorage.getItem("option-1"));
                    document.getElementById('key-id2').innerHTML = String.fromCharCode(sessionStorage.getItem("option-2"));
                    document.getElementById('key-id3').innerHTML = String.fromCharCode(sessionStorage.getItem("option-3"));
                    document.getElementById('key-id4').innerHTML = String.fromCharCode(sessionStorage.getItem("option-4"));
                </script>



            </div>


            <div class="proctor-region">

                <div class="video">
                    <?php include './video.php'; ?>
                </div>

                <div class="number-of-question" style="width: 300px; margin-top: 1rem;">
                    <div id="count_and_button">
                        <h3 id="counter"></h3>
                        <button class="btn btn-warning" onclick="mark()">Mark</button>
                        <button class="btn btn-warning" style="display:none" data-bs-toggle="modal" data-bs-target="#fullscreenPermission" id="full-screen">FS</button>
                        <button class="btn" style="background-color: #ff8200;" onclick="unmark()">UnMark</button>
                    </div>

                    <div id="menu-outer">
                        <div id="tt" class="table" style="display: flex; flex-grow: initial; justify-content: space-sround">
                            <ul id="horizontal-list" style="margin: 8px; margin-bottom: 10px">
                                <!-- Question panel =====================>-->
                                <script>
                                    var cont = document.getElementById('tt');
                                    var ul = document.createElement('ul');
                                    ul.setAttribute('style', 'padding: 0; margin: 0;');
                                    ul.setAttribute('id', 'theList');

                                    for (i = 1; i <= total_question; i++) {
                                        var li = document.createElement('li');
                                        li.innerHTML = i;
                                        li.setAttribute('style', 'display: inline-block; margin:8px; padding:9px; background-color:red; color:white;');
                                        li.setAttribute('id', 'thelist' + i);
                                        ul.appendChild(li);
                                    }

                                    cont.appendChild(ul);
                                </script>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="number-of-question" style="width: 300px;">

                </div>
            </div>
        </div>
        <hr>
        <div class="container" id="finish" style="display: none;">
            <div class="f">
                <p>
                    Thank You
                </p>
                <p>
                    Exam-Sumitted Sucessfully!
                </p>
                <div class="done"><img src="./Assets/completed-task.png" width="200px" height="200px"></div>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="fullscreenPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    </div>
                    <div class="modal-body">
                        Please Allow Full Screen Mode to Continue!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="fullScn()">Allow</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            sessionStorage.setItem('username:', 'user_name')

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days + 60 * 60 * 60 * 24));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function eraseCookie(name) {
                document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }

            document.getElementById('counter').innerText = where + "/" + total_question;

            window.addEventListener("load", () => {




                $.ajax({
                    url: "Question-Render.php",
                    type: "POST",
                    data: {
                        count: where
                    },
                    success: function(data) {
                        $(".question-box").html(data);
                    }
                });

                $.ajax({
                    url: "option-Render.php",
                    type: "POST",
                    data: {
                        count: where
                    },
                    success: function(data) {
                        $(".options").html(data);
                        var ans1 = getCookie(where);
                        var ans2 = getCookie(where);
                        var ans3 = getCookie(where);
                        var ans4 = getCookie(where);


                        if (ans1 || ans2 || ans3 || ans4) {
                            if (ans1 == 'opt-1') {
                                document.getElementById("opt-1").checked = true;
                                console.log(ans1);
                            }
                            if (ans2 == 'opt-2') {
                                document.getElementById("opt-2").checked = true;
                                console.log(ans2);
                            }
                            if (ans3 == 'opt-3') {
                                document.getElementById("opt-3").checked = true;
                                console.log(ans3);
                            }
                            if (ans4 == 'opt-4') {
                                document.getElementById("opt-4").checked = true;
                                console.log(ans4);
                            }
                        }
                    }
                });
            });








            $(document).ready(function() {
                $(document).keydown(function(e) {

                    var $key = e.keyCode;
                    console.log("$key: " + $key)
                    var key1 = sessionStorage.getItem("option-1");
                    var key2 = sessionStorage.getItem("option-2")
                    var key3 = sessionStorage.getItem("option-3")
                    var key4 = sessionStorage.getItem("option-4")

                    if ($key == key1 - 32) {
                        // console.log();


                        document.getElementById("opt-1").checked = true;
                        $op1 = $('input[name="select"]:checked').val();
                        console.log($op1);
                        setCookie(where, "opt-1", 1);
                        document.getElementById("opt-2").checked = false;
                        document.getElementById("opt-3").checked = false;
                        document.getElementById("opt-4").checked = false;
                        console.log("option-a selected");

                    }

                    if ($key == key2 - 32) {


                        document.getElementById("opt-2").checked = true;
                        document.getElementById("opt-1").checked = false;
                        document.getElementById("opt-3").checked = false;
                        document.getElementById("opt-4").checked = false;
                        $op2 = $('input[name="select"]:checked').val();
                        setCookie(where, "opt-2", 1);
                        console.log($op2);
                        console.log("option-b selected");
                    }


                    if ($key == key3 - 32) {


                        document.getElementById("opt-3").checked = true;
                        document.getElementById("opt-1").checked = false;
                        document.getElementById("opt-2").checked = false;
                        document.getElementById("opt-4").checked = false;
                        $op3 = $('input[name="select"]:checked').val();
                        console.log($op3);
                        setCookie(where, "opt-3", 1);
                        console.log("option-c selected");
                    }

                    if ($key == key4 - 32) {
                        document.getElementById("opt-4").checked = true;
                        document.getElementById("opt-1").checked = false;
                        document.getElementById("opt-3").checked = false;
                        document.getElementById("opt-2").checked = false;
                        $op4 = $('input[name="select"]:checked').val();
                        console.log($op4);
                        setCookie(where, "opt-4", 1);
                        console.log("option-d selected");
                    }


                    // -> button for next
                    if ($key == 39) {

                        if (where <= total_question) {
                            $.ajax({
                                type: 'POST',
                                url: 'correct_answer.php',
                                data: {
                                    answer: $('input[name="select"]:checked').val(),
                                    question: $('textarea[name= "question"]').val(),
                                    count: where
                                },


                                // do these thing 
                                success: function(response) {
                                    $('#result').html(response);
                                }
                            })


                            if (where == total_question) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'exam_end.php',

                                })
                                document.getElementById("man").style.display = "none";
                                document.getElementById("finish").style.display = "block";


                                setTimeout(function() {
                                    window.location.href = "../HTML/index.html";
                                }, 10000);
                            }

                            $.ajax({
                                type: 'POST',
                                url: './questionTiles.php',
                                data: {
                                    count: where
                                },

                                success: function(data) {
                                    numb = where - 1;
                                    // console.log("these"+numb+where+data);
                                    $('#thelist' + numb).html(data);

                                }

                            })


                        }

                        where++;
                        document.getElementById('counter').innerText = where + "/" + total_question;


                        $.ajax({
                            url: "Question-Render.php",
                            type: "POST",
                            data: {
                                count: where
                            },
                            success: function(data) {
                                $(".question-box").html(data);
                            }
                        });


                        $.ajax({
                            url: "option-Render.php",
                            type: "POST",
                            data: {
                                count: where
                            },
                            success: function(data) {
                                $(".options").html(data);
                                var ans1 = getCookie(where);
                                var ans2 = getCookie(where);
                                var ans3 = getCookie(where);
                                var ans4 = getCookie(where);


                                if (ans1 || ans2 || ans3 || ans4) {
                                    if (ans1 == 'opt-1') {
                                        document.getElementById("opt-1").checked = true;
                                        console.log(ans1);
                                    }
                                    if (ans2 == 'opt-2') {
                                        document.getElementById("opt-2").checked = true;
                                        console.log(ans2);
                                    }
                                    if (ans3 == 'opt-3') {
                                        document.getElementById("opt-3").checked = true;
                                        console.log(ans3);
                                    }
                                    if (ans4 == 'opt-4') {
                                        document.getElementById("opt-4").checked = true;
                                        console.log(ans4);
                                    }
                                }
                            }
                        });

                        getCookie();

                    }




                    // <- button for previous
                    if ($key == 37) {
                        if (where >= 1) {
                            where--;
                            if (where != 0) {


                                document.getElementById('counter').innerText = where + "/" + total_question;

                                $.ajax({
                                    url: "Question-Render.php",
                                    type: "POST",
                                    data: {
                                        count: where
                                    },
                                    success: function(data) {
                                        $(".question-box").html(data);
                                    }
                                })



                                $.ajax({
                                    url: "option-Render.php",
                                    type: "POST",
                                    data: {
                                        count: where
                                    },
                                    success: function(data) {
                                        $(".options").html(data);
                                        var ans1 = getCookie(where);
                                        var ans2 = getCookie(where);
                                        var ans3 = getCookie(where);
                                        var ans4 = getCookie(where);


                                        if (ans1 || ans2 || ans3 || ans4) {
                                            if (ans1 == 'opt-1') {
                                                document.getElementById("opt-1").checked = true;
                                                console.log(ans1);
                                            }
                                            if (ans2 == 'opt-2') {
                                                document.getElementById("opt-2").checked = true;
                                                console.log(ans2);
                                            }
                                            if (ans3 == 'opt-3') {
                                                document.getElementById("opt-3").checked = true;
                                                console.log(ans3);
                                            }
                                            if (ans4 == 'opt-4') {
                                                document.getElementById("opt-4").checked = true;
                                                console.log(ans4);
                                            }
                                        }
                                    }
                                })

                                getCookie();
                            } else {
                                where++;
                            }
                        }

                    }



                    //keys locked
                    else if (e.metaKey && e.shiftKey && e.keyCode === 83) {
                        console.log("win");
                        return false;
                        console.log("not");
                    } else if (e.keyCode == 38 || e.keyCode == 40) { //arrow button;
                        return true;
                    } else if (e.escape) { //Esc key
                        console.log("escape");
                        return false;
                    } else if (e.altKey == true && e.keyCode == 9) { //Alt key + Tab key
                        console.log("Window Switched");
                        return false;
                    } else if (e.ctrlKey && e.altKey) { //Ctrl + Alt kay
                        console.log("ctrl+alt closed");
                        return false;

                    } else if (e.ctrlKey || e.metaKey || e.keyCode == 32 || e.shiftKey) {
                        //control || window || spacebar || shift
                        console.log("control || window || spacebar || shift");
                        return false;
                    } else if (e.keyCode == 122 || e.keyCode == 123) { //F11 or F12
                        console.log("f11 || f12");
                        return true;
                    } else if (e.keyCode == 27) { // for escape
                        console.log("i will not, I am escape!");
                        return false;
                    } else if (e.altKey && (e.keyCode == 9)) { //Alt + Tab key
                        alert("You are violating the protocol!");
                        return false;
                    }

                    // Prevent Ctrl+a = disable select all
                    // Prevent Ctrl+u = disable view page source
                    // Prevent Ctrl+s = disable save
                    if (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 83 || e.keyCode === 65)) {
                        return false;
                    }
                    // Prevent Ctrl+Shift+I = disabled debugger console using keys open
                    else if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
                        return false;
                    } else if (e.keyCode == 13) { // Enter key
                        return false;
                    } else {
                        e.preventDefault();
                    }

                })

            })
        </script>

        <script>
            document.addEventListener("keyup", function(e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 44) {
                    stopPrntScr();
                }
            });

            function stopPrntScr() {

                var inpFld = document.createElement("input");
                inpFld.setAttribute("value", ".");
                inpFld.setAttribute("width", "0");
                inpFld.style.height = "0px";
                inpFld.style.width = "0px";
                inpFld.style.border = "0px";
                document.body.appendChild(inpFld);
                inpFld.select();
                document.execCommand("copy");
                inpFld.remove(inpFld);
            }

            function AccessClipboardData() {
                try {
                    window.clipboardData.setData('text', "Access   Restricted");
                } catch (err) {}
            }
            setInterval("AccessClipboardData()", 100);
        </script>

        <script type="text/javascript">
            if (document.layers) {
                //Capture the MouseDown event.
                document.captureEvents(Event.MOUSEDOWN);

                //Disable the OnMouseDown event handler.
                document.onmousedown = function() {
                    return false;
                };
            } else {

                //Disable the OnMouseUp event handler.
                document.onmousedown = function(e) {
                    if (e != null && e.type == "mousedown") {
                        //Check the Mouse Button which is clicked.
                        if (e.which == 1 || e.which == 2) {
                            //If the Button is middle or right then disable.
                            return false;
                        }

                    }
                };
            }

            //Disable the Context Menu event.
            document.oncontextmenu = function() {
                return false;
            };
        </script>

        <script>
            $(window).on('focus', function() {
                function mouseLeave() {
                    alert("warning! Don't Do this again");
                }

            });
            $(window).on('blur', function() {

                warning++;
                alert("This is your" + " " + warning + " " + "Warning")
                if (warning == 5) {
                    alert("Test is finished");
                    $.ajax({
                        type: 'POST',
                        url: 'exam_end.php'
                    });
                    document.getElementById("man").style.display = "none";
                    document.getElementById("finish").style.display = "block";
                    setTimeout(function() {
                        window.location.href = "index.html";
                    }, 10000);
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#bdy").mouseleave(function() {
                    $(".warn").css({
                        "visibility": "visible"
                    });
                })
                $("#bdy").mouseenter(function() {
                    $(".warn").css({
                        "visibility": "hidden"
                    });
                })
            })
        </script>


    </body>
<?php
} else {
    session_destroy();
    echo ("trying to be oversmart plz do it proper then come to page hehehee...");
}
?>

    </html>