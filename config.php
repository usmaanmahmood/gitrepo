<?php
// Load the configuration file containing your database credentials
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

// SELECT ALL THE THINGS
if($result = $mysqli -> query("SELECT * FROM User")) {
    printf("Select returned %d rows.\n", $result -> num_rows);

    $result -> close(); // Remember to release the result set
}

// Always close your connection to the database cleanly!
$mysqli -> close();

?>
