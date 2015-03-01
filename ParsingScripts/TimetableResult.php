<?php

class TimetableResult //extends Result
{
    private $databaseList; // array of TimetableDatabases

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(TimetableDatabase $inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }
}

class TimetableDatabase
{
    private $databaseName;
    private $databaseParsedName;
    private $sessionInfoList; //array
    private $weekList; // array

    public function __construct()
    {
        $this->sessionInfoList = array();
        $this->weekList = array();
    }

    public function getSessionInfoList()
    {
        return $this->sessionInfoList;
    }

    public function setSessionInfoList($inList)
    {
        $this->sessionInfoList = $inList;
    }

    public function getWeekList()
    {
        return $this->weekList;
    }

    public function addWeek(TimetableWeek $inWeek)
    {
        array_push($this->weekList, $inWeek);
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

class TimetableWeek
{
    private $dayList;

    function __construct()
    {
        $this->dayList = array();
    }

    public function getDayList()
    {
        return $this->dayList;
    }

    public function addDay(TimetableWeekDay $inDay)
    {
        array_push($this->dayList, $inDay);
    }
}

class TimetableWeekDay
{
    private $sessionList; // array
    private $isEmpty;

    function __construct()
    {
        $this->sessionList = array();
    }

    public function getSessionList()
    {
        return $this->sessionList;
    }

    public function addSession(TimeTableWeekDaySession $inSession)
    {
        array_push($this->sessionList, $inSession);
    }

    public function getEmpty()
    {
        return $this->isEmpty;
    }

    public function setEmpty($isEmpty)
    {
        $this->isEmpty = $isEmpty;
    }
}

class TimetableWeekDaySession
{
    private $week;
    private $dateDay;
    private $dateMonth;
    private $time;
    private $module;
    private $group;
    private $name;
    private $info;

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function getDateDay()
    {
        return $this->dateDay;
    }

    public function setDateDay($dateDay)
    {
        $this->dateDay = $dateDay;
    }

    public function getDateMonth()
    {
        return $this->dateMonth;
    }

    public function setDateMonth($dateMonth)
    {
        $this->dateMonth = $dateMonth;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }

    public function getModule()
    {
        return $this->module;
    }

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getWeek()
    {
        return $this->week;
    }

    public function setWeek($week)
    {
        $this->week = $week;
    }


}


?>