<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:00
 */
if(session_id() == '') {
    session_start();
}

include "FilterList.php";
include "ArcadeProfile.php";


class ArcadeQuery {
    public  $command;
    public  $filterList;
    public  $queryOutput;

    // if profile object is passed, auto add the filterlist
    public function __construct($inCommand) {
        $this->command = $inCommand;
        $this->filterList = new FilterList();

        if ($inCommand <> "profile")
        {
//            $arcadeProfile = unserialize($_SESSION["arcadeprofile"]);
//            $this->filterList = $arcadeProfile->getFilterList();
        }
        else
            $this->sendQuery();

    }

    public function addFilter(Filter $inFilter) { $this->filterList->addFilter($inFilter); }
    public function addFilters(Filter $inFilters) { $this->filterList->addFilters($inFilters); }

    //getters
    public function getCommand() { return $this->command; }
    public function getDatabases() { return $this->filterList->getList('database'); }
    public function getGroups() { return $this->filterList->getList('group'); }
    public function getStudentUsernames() { return $this->filterList->getList('studentUsername'); }
    public function getModules() { return $this->filterList->getList('module'); }
    public function getResult() { return $this->queryOutput; }

    public function sendQuery() {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
        socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

        $username = $_SESSION['username'];
        $arcadepassword = $_SESSION['arcadepassword'];

        socket_write($socket, "LKJHGFDSA" . "\n"); // hello token
        socket_write($socket, $username . "\n"); // arcade user
        socket_write($socket, $arcadepassword . "\n"); // arcade pass

        $fullquery =    $this->command . "\n"
            . implode(' ', $this->getDatabases()). "\n"
            . implode(' ', $this->getGroups()) . "\n"
            . implode(' ', $this->getStudentUsernames()) . "\n"
            . implode(' ', $this->getModules()) . "\n";

        socket_write($socket, $fullquery); // this sends it off

        $results = "";

        // accept data until remote host closes the connection
        while ($socketoutput = socket_read($socket, "100000"))	{
            if ($socketoutput <> '++WORKING\n')
                $results .= $socketoutput;
        }

        socket_shutdown($socket, 2); // 2 = shutdown reading and writing
        socket_close($socket);

        $this->queryOutput = $results;
    }
}

// ensure profile object is stored in session
if (!isset($_SESSION['arcadeprofile']))
{
    $profileQuery = new ArcadeQuery("profile"); // set up new profile query + auto send
    $arcadeProfile = new ArcadeProfile($profileQuery->getResult()); // create new object
    $_SESSION['arcadeprofile'] = serialize($arcadeProfile); // save into session
}
else
    $arcadeProfile = unserialize($_SESSION['arcadeprofile']);

?>