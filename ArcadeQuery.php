<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:00
 */

class Filter {
    public  $database;
    public  $group;
    public  $studentUsername;
    public  $studentFullname;
    public  $module;

    public function __construct($inDatabase, $inGroup, $inStudentUsername, $inStudentFullname, $inModule) {
        $this->database = $inDatabase;
        $this->group = $inGroup;
        $this->studentUsername = $inStudentUsername;
        $this->studentFullname = $inStudentFullname;
        $this->module = $inModule;
    }

    //getters
    public function getDatabase() { return $this->database; }
    public function getGroup() { return $this->group; }
    public function getStudentUsername() { return $this->studentUsername; }
    public function getStudentFullname() { return $this->studentFullname; }
    public function getModule() { return $this->module; }

    public function returnSQLValues() {
        return '("'.$this->database.'", "'.$this->group.'", "'.$this->studentUsername.'", "'.$this->studentFullname.'", "'.$this->module.'")';
    }
}

class FilterList {
    public $filterList; // array of Filters

    public function __construct() {$this->filterList = array(); }

    public function addFilter($inFilter) { array_push($this->filterList, $inFilter); }

    public function removeFilter($inFilter) {
        foreach (array_keys($this->filterList, $inFilter, true) as $key) {
            unset($this->filterList[$key]);
        }
    }

    public function getList($inListName) {
        $array = array();
        foreach($this->filterList as $filter) {
            array_push($array, $filter->$inListName);
        }
        return array_unique($array);
    }
}

class ArcadeQuery {
    public  $command;
    public  $filterList;

    public function __construct($inCommand) {
        $this->command = $inCommand;
        $this->filterList = new FilterList();
    }

    public function addFilter(Filter $inFilter) { $this->filterList->addFilter($inFilter); }
    public function addFilters(Filter $inFilters) { $this->filterList->addFilters($inFilters); }

    //getters
    public function getCommand() { return $this->command; }
    public function getDatabases() { return $this->filterList->getList('database'); }
    public function getGroups() { return $this->filterList->getList('group'); }
    public function getStudentUsernames() { return $this->filterList->getList('studentUsername'); }
    public function getModules() { return $this->filterList->getList('module'); }

    public function sendQuery() {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
        socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

        $username = 'mahmoou1';//$_SESSION['username'];
        $arcadepassword = 'LQKUGRIRDE';//$_SESSION['arcadepassword'];

        socket_write($socket, "LKJHGFDSA\n"); // hello token
        socket_write($socket, $username . "\n"); // arcade user
        socket_write($socket, $arcadepassword . "\n"); // arcade pass

        $fullquery =    $this->command . "\n"
            . implode(' ', $this->getDatabases()). "\n"
            . implode(' ', $this->getGroups()) . "\n"
            . implode(' ', $this->getStudentUsernames()) . "\n"
            . implode(' ', $this->getDatabases()) . "\n";

        socket_write($socket, $fullquery); // this sends it off

        $results = "";

        // accept data until remote host closes the connection
        while ($socketoutput = socket_read($socket, "100000"))	{
            if ($socketoutput <> '++WORKING')
                $results .= $socketoutput;
        }

        socket_shutdown($socket, 2); // 2 = shutdown reading and writing
        socket_close($socket);

        return $results;
    }
}



?>