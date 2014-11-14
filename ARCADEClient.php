<?php

/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 12:22
 */

include("Query.php");
include("Parser.php");


class ARCADEClient {
    private $arcadeUsername;
    private $arcadePassword;
    private $arcadeHelloToken = "LKJHGFDSA";
    private $parser;

    //performs cleanup of profile string from ArcadeQuery, and creates 2D array for command and filter data
    public function __construct() {
        $this->arcadeUsername = $_SESSION['username'];
        $this->arcadePassword = $_SESSION['arcadepassword'];
    }

    public function execute(Query $inQuery) {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
        socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

        socket_write($socket, $this->arcadeHelloToken . "\n");
        socket_write($socket, $this->arcadeUsername . "\n");
        socket_write($socket, $this->arcadePassword . "\n");

        $queryString =    $inQuery->getCommand() . "\n"
            . implode(' ', $inQuery->getDatabases()). "\n"
            . implode(' ', $inQuery->getGroups()) . "\n"
            . implode(' ', $inQuery->getStudents()) . "\n"
            . implode(' ', $inQuery->getModules()) . "\n";

        socket_write($socket, $queryString); // this sends it off

        $resultString = "";

        // accept data until remote host closes the connection
        while ($socketoutput = socket_read($socket, "100000"))	{
            if ($socketoutput != "++WORKING\n")
                $resultString .= $socketoutput;
        }

        socket_shutdown($socket, 2); // 2 = shutdown reading and writing
        socket_close($socket);

        if ($inQuery->getPlainResult() == 1)
            return $resultString;

        switch($inQuery->getCommand()) {
            case "profile": $parser = new ProfileParser();
                            break;
        }

        return $parser->parse($resultString);
    }
}

?>