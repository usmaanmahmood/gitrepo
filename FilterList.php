<?php

class Filter {
    public  $database;
    public  $group;
    public  $studentUsername;
    public  $studentFullname;
    public  $module;

    public function __construct($inDatabase, $inGroup, $inStudentUsername, $inStudentFullname, $inModule) {
        if (empty($inDatabase)) $this->database = ""; else $this->database = $inDatabase;
        if (empty($inGroup)) $this->group = ""; else $this->group = $inGroup;
        if (empty($inStudentUsername)) $this->studentUsername = ""; else $this->studentUsername = $inStudentUsername;
        if (empty($inStudentFullname)) $this->studentFullname = ""; else $this->studentFullname = $inStudentFullname;
        if (empty($inModule)) $this->module = ""; else $this->module = $inModule;
    }

    //getters
    public function getDatabase() { return $this->database; }
    public function getGroup() { return $this->group; }
    public function getStudentUsername() { return $this->studentUsername; }
    public function getStudentFullname() { return $this->studentFullname; }
    public function getModule() { return $this->module; }

    public function returnSQLValues() {
        return '("'.$this->database.'", "'.$this->group.'", "'.$this->studentUsername.'", "'.$this->studentFullname.'", "'.$this->module.'")';
    }
}

class FilterList {
    public $filterList; // array of Filters

    public function __construct() {$this->filterList = array(); }

    public function addFilter($inFilter) { array_push($this->filterList, $inFilter); }

    public function removeFilter($inFilter) {
        foreach (array_keys($this->filterList, $inFilter, true) as $key) {
            unset($this->filterList[$key]);
        }
    }

    public function removeFilterByDB($inDatabase) {
        foreach($this->filterList as $key => $filter)
        {
            if ($filter->getDatabase() <> $inDatabase)
                unset($this->filterList[$key]);
        }
    }

    public function getList($inListName) {
        $array = array();
        foreach($this->filterList as $filter) {
            array_push($array, $filter->$inListName);
        }
        return array_unique($array);
    }
}

?>