<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */
function classicQuery($query, $database, $group, $student, $module)
{
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
    socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

    $username = 'mahmoou1';//$_SESSION['username'];
    $arcadepassword = 'LQKUGRIRDE';//$_SESSION['arcadepassword'];

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

    //$results.=socket_strerror(socket_last_error($socket)); // debugging
    socket_shutdown($socket, 2); // 2 = shutdown reading and writing
    socket_close($socket);

    return $results;
}


include "ArcadeQuery.php";
$command="registration-details";

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter("12-13-2", "", "", "", ""));
$result = classicQuery($command, "12-13-2", "", "", "");

//echo $result;
//echo var_dump($arcadeQuery);
//echo implode(' ', $arcadeQuery->getDatabases());
//echo implode(' ', $arcadeQuery->getGroups());
echo $arcadeQuery->sendQuery();
?>