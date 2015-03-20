<?php

class AnalyserResult //extends Result
{
    private $databaseName;
    private $databaseParsedName;
    private $moduleList; // array of AnalyserDatabases

    public function __construct()
    {
        $this->moduleList = array();
    }

    public function getModuleList()
    {
        return $this->moduleList;
    }

    public function addModule(AnalyserModule $inModule)
    {
        array_push($this->moduleList, $inModule);
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

}

class AnalyserModule
{
    private $moduleName;
    private $moduleId;
    private $attendancePercentage;
    private $totalMark;
    private $attendancePattern;

    public function getAttendancePattern()
    {
        return $this->attendancePattern;
    }

    public function setAttendancePattern($attendancePattern)
    {
        $this->attendancePattern = $attendancePattern;
    }

    public function getAttendancePercentage()
    {
        return $this->attendancePercentage;
    }

    public function setAttendancePercentage($attendancePercentage)
    {
        $this->attendancePercentage = $attendancePercentage;
    }

    public function getModuleId()
    {
        return $this->moduleId;
    }

    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;
    }

    public function getModuleName()
    {
        return $this->moduleName;
    }

    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    public function getTotalMark()
    {
        return $this->totalMark;
    }

    public function setTotalMark($totalMark)
    {
        $this->totalMark = $totalMark;
    }

}


?>