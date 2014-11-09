<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 09/11/14
 * Time: 13:21
 */

class ArcadeProfile {
    public $commandArray;
    public $filterList; // will contain all the filters


    //performs cleanup of profile string from ArcadeQuery, and creates 2D array for command and filter data
    public function __construct($string) {
        // create array of commands
        $this->commandArray = array();

        $tempCommandString = $string;
        // while there is a COMMAND remaining
        // maybe use array shift here instead
        while(($startCommandPos = strpos($tempCommandString, "++COMMAND")) > -1) {
            $tempCommandString = substr($tempCommandString, $startCommandPos); // move to start of ++COMMAND line
            $commandLine = preg_split('/\r\n|\r|\n/', $tempCommandString, 2); // split into ++COMMAND and rest
            $commandName = preg_split('/\r\n|\r|\n/', $commandLine[1], 2);// split into Command Name and rest
            array_push($this->commandArray, $commandName[0]); //push Command Name
            $tempCommandString = $commandName[1]; // reset string
        }

        // create array of filters

        $startposition = strrpos($string, "++MODULESORTORDER"); // start of final ++MODULESTOORDER
        $stringcleanedup = substr($string, $startposition); // trim down to start (2 garbage lines still need removing)
        $lines = preg_split('/\r\n|\r|\n/', $stringcleanedup, 2); // remove first line
        $lines = preg_split('/\r\n|\r|\n/', $lines[1], 2); // remove second line so just have required list
        $lines = $lines[1];
        $rowbyrow = explode("\n", trim($lines)); // split $lines into array of strings, line by line, after trimming whitespace

        // create
        foreach($rowbyrow as $key => $row) {
            $colsarray = explode(" ", trim($row)); // split row into array of strings, delimiter is space, after trimming whitespace
            $rowbyrow[$key] = $colsarray;
        }

        $this->filterList = new FilterList();
        // populate List
        foreach($rowbyrow as $filter) {
            $newFilter = new Filter($filter[0], $filter[1], $filter[2], $filter[3], $filter[4]);
            $this->filterList->addFilter($newFilter);
        }
    }

    public function selectDatabase($inDatabase) {
        foreach($this->filterList as $filter)
        {
            echo var_dump($filter);
//            if (strcmp($filter->database, $inDatabase) <> 0)
//                $this->filterList->removeFilter($filter);
        }
    }

    //returns as html table
    public function __toString() {
        $out  = "";
        $out .= "<table>";
        foreach($this->filterList as $key => $element){
            $out .= "<tr>";
            foreach($element as $subkey => $subelement){
                $out .= "<td>$subelement</td>";
            }
            $out .= "</tr>";
        }
        $out .= "</table>";

        return $out;
    }

    // requires exact name, returns Array of list - use array_column 5.5 onwards
    public function getList($inListName) {  $this->filterList->getList($inListName); }

    public function getFilterList() { return $this->filterList; }

    public function getCommandList() {  return $this->commandArray; }

    //incomplete
    public function returnSQLValues()
    {
        $sql = array();
        foreach($this->filterArray as $filter) {
            array_push($sql, $this->arcadeUsername . $filter->returnSQLValues() . ",");
        }
        return $sql;
    }
    //incomplete
    public function insertIntoDatabase(){
        $valuesString = $this->returnSQLValues();
        rtrim($valuesString, ",");
        mysql_query('INSERT INTO ProfileCache (arcadeusername, databasename, groupname, studentusername, studentname, module) VALUES '. implode(",", $valuesString));
    }
}

?>