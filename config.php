<?php
// Load the configuration file containing your database credentials
//require_once('config.inc.php');

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
    //printf("Select returned %d rows.\n", $result -> num_rows);

    $result -> close(); // Remember to release the result set
}

// Always close your connection to the database cleanly!
$mysqli -> close();

function classicQuery($query, $database, $group, $student, $module)
{
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
	socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

	$username = $_SESSION['username']; 
	$arcadepassword = $_SESSION['arcadepassword']; 

	socket_write($socket, "LKJHGFDSA\n"); // hello token
	socket_write($socket, $username . "\n"); // arcade user
	socket_write($socket, $arcadepassword . "\n"); // arcade pass
	$fullquery = $query . "\n" . $database . "\n" . $group . "\n" . $student . "\n" . $module . "\n";
	socket_write($socket, $fullquery); // this sends it off

	$results = "";

	// accept data until remote host closes the connection
	while ($socketoutput = socket_read($socket, "100000"))	{
		if ($socketoutput <> '++WORKING')
            $results .= $socketoutput;
	}

	$results.=socket_strerror(socket_last_error($socket)); // debugging
	socket_shutdown($socket, 2); // 2 = shutdown reading and writing
	socket_close($socket);

	return $results;
}

?>
