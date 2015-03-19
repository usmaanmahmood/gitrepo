<?php

/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 12:10
 */
class Query
{
    private $command;
    private $databaseList;
    private $groupList;
    private $studentList;
    private $moduleList;
    private $plainResult;

    // if profile object is passed, auto add the filterlist
    public function __construct($inCommand, $inPlainResult)
    {
        $this->command = $inCommand;
        $this->databaseList = array();
        $this->groupList = array();
        $this->studentList = array();
        $this->moduleList = array();
        $this->plainResult = $inPlainResult;
    }

    //setters
    public function addDatabase($inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }

    // they all need arrays to be passed in or fail
    public function addDatabases($inList)
    {
        if (empty($inList)) $inList = array();
        $this->databaseList = array_merge($this->databaseList, $inList);
    }

    public function addGroups($inList)
    {
        if (empty($inList)) $inList = array();
        $this->groupList = array_merge($this->groupList, $inList);
    }

    public function addStudents($inList)
    {
        if (empty($inList)) $inList = array();
        $this->studentList = array_merge($this->studentList, $inList);
    }

    public function addModules($inList)
    {
        if (empty($inList)) $inList = array();
        $this->moduleList = array_merge($this->moduleList, $inList);
    }

    //getters
    public function getCommand()
    {
        return $this->command;
    }

    public function getDatabases()
    {
        return count($this->databaseList) == 0 ? array() : $this->databaseList;
    }

    public function getGroups()
    {
        return count($this->groupList) == 0 ? array() : $this->groupList;
    }

    public function getStudents()
    {
        return count($this->studentList) == 0 ? array() : $this->studentList;
    }

    public function getModules()
    {
        return count($this->moduleList) == 0 ? array() : $this->moduleList;
    }

    public function getPlainResult()
    {
        return $this->plainResult;
    }


}