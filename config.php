<?php
// Load the configuration file containing your database credentials
//require_once('config.inc.php');
// database stuff
$database_host = 'dbhost.cs.man.ac.uk';
$database_user = 'mmapxum2';
$database_pass = 'manchester';
$database_name = 'mmapxum2';

// Connect to the database
$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);

// Check for errors before doing anything else
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Always close your connection to the database cleanly!

session_start();
if (empty($_SESSION['username']) || empty($_SESSION['arcadepassword']))
    header("location:Login.php");


include("ARCADEClient.php");


// ensure $arcadeProfile is initialised and loaded in the session
if (!isset($_SESSION['profileResult'])) {
    $arcadeClient = new ARCADEClient();
    $query = new Query("profile", 0);

    $arcadeProfile = $arcadeClient->execute($query);
    $_SESSION['profileResult'] = serialize($arcadeProfile); // save into session
} else
    $arcadeProfile = unserialize($_SESSION['profileResult']);

?>
