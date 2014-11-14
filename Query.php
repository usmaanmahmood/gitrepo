<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 12:10
 */

class Query {
    private $command;
    private $databaseList;
    private $groupList;
    private $studentList;
    private $moduleList;
    private $plainResult;

    // if profile object is passed, auto add the filterlist
    public function __construct($inCommand, $inPlainResult) {
        $this->command = $inCommand;
        $this->databaseList = [];
        $this->groupList = [];
        $this->studentList = [];
        $this->moduleList = [];
        $this->plainResult = $inPlainResult;
    }

    //setters
    public function addDatabases($inDatabases) { $this->databaseList = array_merge($this->databaseList, $inDatabases); }
    public function addGroups($inGroups) { $this->groupList = array_merge($this->databaseList, $inGroups); }
    public function addStudents($inStudents) { $this->studentList = array_merge($this->databaseList, $inStudents); }
    public function addModules($inModules) { $this->moduleList = array_merge($this->databaseList, $inModules); }

    //getters
    public function getCommand() { return $this->command; }
    public function getDatabases() { return count($this->databaseList) == 0 ? "" : $this->databaseList; }
    public function getGroups() { return count($this->groupList) == 0 ? "" : $this->groupList; }
    public function getStudents() { return count($this->studentList) == 0 ? "" : $this->studentList; }
    public function getModules() { return count($this->moduleList) == 0 ? "" : $this->moduleList; }
    public function getPlainResult() { return $this->plainResult; }


}