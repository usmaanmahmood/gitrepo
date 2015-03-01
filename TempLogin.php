<?php

// username and password sent from form
session_start();
$username = $_POST['username'];
$arcadepassword = $_POST['arcadepassword'];
header("location:Classic.php");
?>
