<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 12:09
 */

class Filter {
    private  $database;
    private  $group;
    private  $studentUsername;
    private  $studentFullname;
    private  $module;

    public function __construct($inString) {
        $filterArray = explode(" ", $inString);
        $this->database = $filterArray[0];
        $this->group = $filterArray[1];
        $this->studentUsername = $filterArray[2];
        $this->studentFullname = $filterArray[3];
        $this->module = $filterArray[4];
    }

    //getters
    public function getDatabase() { return $this->database; }
    public function getGroup() { return $this->group; }
    public function getStudentUsername() { return $this->studentUsername; }
    public function getStudentFullname() { return $this->studentFullname; }
    public function getModule() { return $this->module; }
    public function getJSON() { return json_encode($this); }
}

?>