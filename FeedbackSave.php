<?php

require_once('config.inc.php');



//$database_host = 'dbhost.cs.man.ac.uk';
//$database_user = 'mmapxum2';
//$database_pass = 'manchester';
//$database_name = 'mmapxum2';
//
// Connect to the database
//$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);
//
// Check for errors before doing anything else
//if ($mysqli->connect_error) {
//    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
//}
//
// username and password sent from form
//$centralusername = $_POST['centralusername'];
//$webpassword = $_POST['webpassword'];
//$arcadepassword = $_POST['arcadepassword'];
//
// To protect MySQL injection
//$centralusername = stripslashes($centralusername);
//$webpassword = stripslashes($webpassword);
//$arcadepassword = stripslashes($arcadepassword);
//
//$centralusername = mysqli_real_escape_string($mysqli, $centralusername);
//$webpassword = mysqli_real_escape_string($mysqli, $webpassword);
//$arcadepassword = mysqli_real_escape_string($mysqli, $arcadepassword);
//
//$sql = "INSERT INTO User VALUES ('$centralusername','$webpassword','$arcadepassword')";
//if ($mysqli->query($sql) === true) {
//    $mysqli->close();
//    header("location:Classic.php");
//} else {
//    $mysqli->close();
//    header("location:Feedback.php?message=1");
}
?>
