<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 12:09
 */

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
}

?>