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
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);
$sql="SELECT * FROM Users WHERE username='$username' and password='$password'";
$result=mysqli_query($sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "customer_area.php"
session_register("username");
session_register("password"); 
header("location:querylist.php");
}
else {
echo "Wrong Username or Password";
}
?>