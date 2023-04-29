<?php
session_start();
echo($_POST["logout"]);
session_destroy();
header("Location: ../HTML/index.html");

?>