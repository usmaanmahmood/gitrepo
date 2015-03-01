<?php

// username and password sent from form
session_start();
$username = $_POST['tempusername'];
$arcadepassword = $_POST['arcadepassword'];
header("location:Classic.php");
?>
