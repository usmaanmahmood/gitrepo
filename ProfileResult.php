<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 14:34
 */

include("Filter.php");

class ProfileResult extends Result
{
    private $commandList;
    private $filterList;

    private $databaseList;
    private $groupList;
    private $studentUsernameList;
    private $studentFullnameList;
    private $moduleList;
    private $twoDimensionalArray;

    public function __construct()
    {
        $this->commandList = array();
        $this->filterList = array();
    }

    public function addCommand($inCommand) { array_push($this->commandList, $inCommand); }
    public function addFilter($inFilter) { array_push($this->filterList, $inFilter); }

    public function getCommandList() { return $this->commandList; }
    public function getFilterList() { return $this->filterList; }
    public function getTwoDimensionalArray() { return $this->twoDimensionalArray; }


    public function getDatabaseList() { return $this->databaseList; }
    public function getGroupList() { return $this->groupList; }
    public function getStudentUsernameList() { return $this->studentUsernameList; }
    public function getStudentFullnameList() { return $this->studentFullnameList; }
    public function getModuleList() { return $this->moduleList; }


    public function buildLists() {
        $this->databaseList = array();
        $this->groupList = array();
        $this->studentUsernameList = array();
        $this->studentFullnameList = array();
        $this->moduleList = array();

        foreach($this->filterList as $filter)
        {
            $thisDatabase = $filter->getDatabase();
            $thisGroup = $filter->getGroup();
            $thisStudentUsername = $filter->getStudentUsername();
            $thisStudentFullname = $filter->getStudentFullname();
            $thisModule = $filter->getModule();

            array_push($this->databaseList, $thisDatabase);
            array_push($this->groupList, $thisGroup);
            array_push($this->studentUsernameList, $thisStudentUsername);
            array_push($this->studentFullnameList, $thisStudentFullname);
            array_push($this->moduleList, $thisModule);

            if (!empty($thisDatabase))  $this->twoDimensionalArray[] =  array($thisDatabase, $thisGroup, $thisStudentUsername, $thisStudentFullname, $thisModule);
        }
    }

}