<?php

require_once('config.inc.php');

$database_host = 'dbhost.cs.man.ac.uk';
$database_user = 'mmapxum2';
$database_pass = 'manchester';
$database_name = 'mmapxum2';

// Connect to the database
$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);

// Check for errors before doing anything else
if($mysqli -> connect_error) {
    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
}

// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($mysqli, $username);
$password = mysqli_real_escape_string($mysqli, $password);

$sql="SELECT * FROM User WHERE CentralUsername='$username' and WebPassword='$password'";
$result=$mysqli->query($sql);

$num_rows = $result->num_rows;

// If result matched $username and $password, table row must be 1 row
if($num_rows=1){
session_start();
// Register $myusername, $mypassword and redirect to file "customer_area.php"
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
header("location:querylist.php");
}
else {
echo "Wrong Username or Password";
}
?>
