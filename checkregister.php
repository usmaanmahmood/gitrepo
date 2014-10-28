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
$centralusername=$_POST['centralusername']; 
$webpassword=$_POST['webpassword']; 
$arcadepassword=$_POST['arcadepassword']; 

// To protect MySQL injection
$centralusername = stripslashes($centralusername);
$webpassword = stripslashes($webpassword);
$arcadepassword = stripslashes($arcadepassword);
$centralusername = mysqli_real_escape_string($mysqli, $centralusername);
$webpassword = mysqli_real_escape_string($mysqli, $webpassword);
$arcadepassword = mysqli_real_escape_string($mysqli, $arcadepassword);

$sql="INSERT INTO User VALUES ('$centralusername','$webpassword','$arcadepassword')";
$result=$mysqli->query($sql) or die($mysqli->error.__LINE__);;


// If result matched $username and $password, table row must be 1 row
while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo $row[0];
    }
if (strpos($row[0],'Duplicate') !== true)
{
	echo "Username is new ok";
	session_start();
	// Register $myusername, $mypassword and redirect to file "customer_area.php"
	$_SESSION["username"] = $centralusername;
	$_SESSION["arcadepassword"] = $arcadepassword;
	$result -> close();
	$mysqli -> close();
	//header("location:querylist.php");
}
else {
	echo "Username already exists";
	$mysqli -> close();
}
?>
