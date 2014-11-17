<?php

/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 17/11/14
 * Time: 11:23
 */
class RegistrationDetailsResult extends Result
{

    private $databaseList; // array of RegistrationDetailsDatabase

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(RegistrationDetailsDatabase $inDatabase)
    {
        $this->databaseList . push($inDatabase);
    }

    public $sampleinString = "===============================================================================
Database 12-13-2X

One matching student

Student id:	155
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		2
Owner:		admin2
Lab Group:	SH
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 21111 22712 23111 23420 25111 25212 26120 27112 28112 28411
";

    /*
    for each database
        display db name
        display number of matching students
        for each student
            display details
    */

} // RegistrationDetailsResult

class RegistrationDetailsDatabase
{
    private $studentList; // array of RegistrationDetailsStudent

    public function __construct()
    {
        $this->studentList = array();
    }

    public function getStudentList()
    {
        return $this->studentList;
    }

    public function addStudent(RegistrationDetailsStudent $studentList)
    {
        $this->studentList . push($studentList);
    }

} // RegistrationDetailsDatabase

class RegistrationDetailsStudent
{
    private $studentID;
    private $regStatus;
    private $regNumber;
    private $degree;
    private $year;
    private $owner;
    private $labGroup;
    private $tutorialGroup;
    private $tutor;
    private $preferredName;
    private $dbSurname;
    private $dbFirstNames;
    private $emailName;
    private $modules; // array of String modules

    public function __construct()
    {
        $this->modules = array();
    }

    public function getDbFirstNames()
    {
        return $this->dbFirstNames;
    }

    public function setDbFirstNames($dbFirstNames)
    {
        $this->dbFirstNames = $dbFirstNames;
    }

    public function getDbSurname()
    {
        return $this->dbSurname;
    }

    public function setDbSurname($dbSurname)
    {
        $this->dbSurname = $dbSurname;
    }

    public function getDegree()
    {
        return $this->degree;
    }

    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    public function getEmailName()
    {
        return $this->emailName;
    }

    public function setEmailName($emailName)
    {
        $this->emailName = $emailName;
    }

    public function getLabGroup()
    {
        return $this->labGroup;
    }

    public function setLabGroup($labGroup)
    {
        $this->labGroup = $labGroup;
    }

    public function getModules()
    {
        return $this->modules;
    }

    // takes a space seperated list of modules
    public function setModules($modules)
    {
        $this->modules = explode(" ", $modules);
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getPreferredName()
    {
        return $this->preferredName;
    }

    public function setPreferredName($preferredName)
    {
        $this->preferredName = $preferredName;
    }

    public function getRegNumber()
    {
        return $this->regNumber;
    }

    public function setRegNumber($regNumber)
    {
        $this->regNumber = $regNumber;
    }

    public function getRegStatus()
    {
        return $this->regStatus;
    }

    public function setRegStatus($regStatus)
    {
        $this->regStatus = $regStatus;
    }

    public function getStudentID()
    {
        return $this->studentID;
    }

    public function setStudentID($studentID)
    {
        $this->studentID = $studentID;
    }

    public function getTutor()
    {
        return $this->tutor;
    }

    public function setTutor($tutor)
    {
        $this->tutor = $tutor;
    }

    public function getTutorialGroup()
    {
        return $this->tutorialGroup;
    }

    public function setTutorialGroup($tutorialGroup)
    {
        $this->tutorialGroup = $tutorialGroup;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
} // RegistrationDetailsStudent

