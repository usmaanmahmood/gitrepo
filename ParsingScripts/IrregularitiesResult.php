<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 26/11/14
 * Time: 12:06
 */


class IrregularitiesResult //extends Result
{
    private $databaseList; // array of IrregularitiesDatabase

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(IrregularitiesDatabase $inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }
}

class IrregularitiesDatabase
{
    private $databaseName;
    private $databaseParsedName;
    private $irregularityList; // array of Irregularities

    public function __construct()
    {
        $this->irregularityList = array();
    }

    public function getIrregularityList()
    {
        return $this->irregularityList;
    }

    public function addIrregularity(Irregularity $irregularityList)
    {
        array_push($this->irregularityList, $irregularityList);
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

class Irregularity {

    private $studentName;
    private $group;
    private $module;
    private $name;
    private $date;
    private $irregularity;

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }

    public function getIrregularity()
    {
        return $this->irregularity;
    }

    public function setIrregularity($irregularity)
    {
        $this->irregularity = $irregularity;
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

    public function getStudentName()
    {
        return $this->studentName;
    }

    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }



}


?>