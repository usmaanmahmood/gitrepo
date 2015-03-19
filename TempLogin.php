<?php

// username and password sent from form
session_start();
$_SESSION["username"] = $_POST['tempusername'];;
$_SESSION["arcadepassword"] = $_POST['arcadepassword'];
header("location:index.php");
?>
