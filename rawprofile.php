<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 14:52
 */

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

$username = "mahmoou1";
$arcadepassword = "LQKUGRIRDE";

socket_write($socket, "LKJHGFDSA\n"); // hello token
socket_write($socket, $username . "\n"); // arcade user
socket_write($socket, $arcadepassword . "\n"); // arcade pass
$fullquery = "profile" . "\n" . "" . "\n" . "" . "\n" . "" . "\n" . "" . "\n";
socket_write($socket, $fullquery); // this sends it off

$results = "";

// accept data until remote host closes the connection
while ($socketoutput = socket_read($socket, "100000"))	{
    if ($socketoutput != '++WORKING\n')
        $results .= $socketoutput;
}

//$results.=socket_strerror(socket_last_error($socket)); // debugging
socket_shutdown($socket, 2); // 2 = shutdown reading and writing
socket_close($socket);

echo $results;

//include("ProfileParser.php");

//$profileParser = new ProfileParser();
//$profile = $profileParser->parse($results);

//echo var_dump($profile);