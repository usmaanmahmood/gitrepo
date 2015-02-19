<?php

class AttendanceSummaryResult //extends Result
{
    private $databaseList; // array of AttendanceSummaryDatabases

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(AttendanceSummaryDatabase $inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }
}

class AttendanceSummaryDatabase
{
    private $databaseName;
    private $databaseParsedName;
    private $attendancePattern;
    private $moduleList; // array
    private $group;
    private $percentage;


    public function __construct()
    {
        $this->moduleList = array();
    }

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }

    public function getModuleList()
    {
        return $this->moduleList;
    }

    public function setModuleList($moduleList)
    {
        $this->moduleList = $moduleList;
    }

    public function getAttendancePattern()
    {
        return $this->attendancePattern;
    }

    public function setAttendancePattern($attendancePattern)
    {
        $this->attendancePattern = $attendancePattern;
    }

    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    public function setDatabaseParsedName($databaseParsedName)
    {
        $this->databaseParsedName = $databaseParsedName;
    }

    public function getDatabaseParsedName()
    {
        return $this->databaseParsedName;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }

}


?>