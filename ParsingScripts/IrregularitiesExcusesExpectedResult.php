<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 26/11/14
 * Time: 12:06
 */


class IrregularitiesExcusesExpectedResult //extends Result
{
    private $databaseList; // array of IrregularitiesExcusesExpectedDatabase

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(IrregularitiesExcusesExpectedDatabase $inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }
}

class IrregularitiesExcusesExpectedDatabase
{
    private $databaseName;
    private $databaseParsedName;
    private $itemList; // array of Items - lines
    private $itemModuleList;


    public function __construct()
    {
        $this->itemList = array();
        $this->itemModuleList = array();
    }

    public function getItemList()
    {
        return $this->itemList;
    }

    public function addItem(Item $item)
    {
        array_push($this->itemList, $item);
        array_push($this->itemModuleList, $item->getModule());
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

    public function getItemModuleList()
    {
        return $this->itemModuleList;
    }

    public function getNumberOfItems()
    {
        return count($this->getItemList());
    }

}

class Item {

    private $studentName;
    private $group;
    private $module;
    private $name;
    private $date;
    private $note;

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

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
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