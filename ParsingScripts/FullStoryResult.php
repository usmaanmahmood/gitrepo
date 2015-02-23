<?php

class FullStoryResult //extends Result
{
    private $databaseList; // array of FullStoryDatabases

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(FullStoryDatabase $inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }
}

class FullStoryDatabase
{
    private $databaseName;
    private $databaseParsedName;
    private $moduleList; // array


    public function __construct()
    {
        $this->moduleList = array();
    }

    public function getModuleList()
    {
        return $this->moduleList;
    }

    public function addModule(FullStoryModule $fullStoryModule)
    {
        array_push($this->moduleList, $fullStoryModule);
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

class FullStoryModule
{
    private $sessionList; // array
    private $sessionInfo;
    private $moduleName;

    public function __construct()
    {
        $this->sessionList = array();
    }

    public function getSessionInfo()
    {
        return $this->databaseName;
    }

    public function setSessionInfo($sessionInfo)
    {
        $this->sessionInfo = $sessionInfo;
    }

    public function getModuleName()
    {
        return $this->moduleName;
    }

    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    public function getSessionList()
    {
        return $this->sessionList;
    }

    public function addSession(FullStoryModuleSession $session)
    {
        array_push($this->sessionList, $session);
    }
}

class FullStoryModuleSession
{
    private $name;
    private $sessionDates;
    private $attend;
    private $cbd;
    private $ext;
    private $cbe;
    private $date;
    private $mark;

    public function getAttend()
    {
        return $this->attend;
    }

    public function setAttend($attend)
    {
        $this->attend = $attend;
    }

    public function getCbd()
    {
        return $this->cbd;
    }

    public function setCbd($cbd)
    {
        $this->cbd = $cbd;
    }

    public function getCbe()
    {
        return $this->cbe;
    }

    public function setCbe($cbe)
    {
        $this->cbe = $cbe;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getExt()
    {
        return $this->ext;
    }

    public function setExt($ext)
    {
        $this->ext = $ext;
    }

    public function getMark()
    {
        return $this->mark;
    }

    public function setMark($mark)
    {
        $this->mark = $mark;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSessionDates()
    {
        return $this->sessionDates;
    }

    public function setSessionDates($sessionDates)
    {
        $this->sessionDates = $sessionDates;
    }



}




?>