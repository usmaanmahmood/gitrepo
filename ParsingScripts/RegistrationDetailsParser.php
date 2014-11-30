<?php

/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 17/11/14
 * Time: 11:07
 */
class RegistrationDetailsParser // extends Parser
{

    public $sampleString = "===============================================================================
Database 12-13-2X

Two matching students

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

Student id:	020
Reg. status:	R
Reg. number:	7688898
Degree:		CSEwIE
Year:		2
Owner:		admin2
Lab Group:	SH
Tutorial Group:	W2
Tutor:		DER
Preferred Name:	Ali,Mohim
DB Surname:	Ali
DB First names:	Mohim
Email name:	alim1
Modules:	 22111 22712 23111 23420 25111 25212 26120 27112 28411 28512

===============================================================================
Database 12-13-2

One matching student

Student id:	155
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		2
Owner:		admin2
Lab Group:	-/21111E=J,22712L=I,23111E=K,23111L=F,23421L=I,23421W=I,23422L=F,25111L=G,25212L=G,26121L=H,26122L=H,27112L=H,28112L=I,28411L=F,28411W=J,Tut1=X6,Tut2=X6
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 21111 22712 23111 23420 25111 25212 26120 27112 28112 28411

===============================================================================
Database 11-12-1

One matching student

Student id:	133
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		1
Owner:		admin1
Lab Group:	X/101s1P=X6,101s2P=X6,IntroW=sLQ,PASS1=PS3,PASS2=PS6,Tut1=X6,Tut2=X6
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 10120 11120 11212 12111 14112 15111 16121 16212 18112


===============================================================================
End of query results";

    public function parse($inString)
    {
        // split into databases
        $databaseStringArray = preg_split("/===============================================================================\n/", $inString,  null, PREG_SPLIT_NO_EMPTY);
        array_pop($databaseStringArray); // remove the "End of query results" line

        // create the new data structure
        $result = new RegistrationDetailsResult();

        // populate the data structure
        foreach($databaseStringArray as $databaseString)
            $result->addDatabase($this->parseDatabase(trim($databaseString)));

        return $result;
    }

    private function parseDatabase($inDatabaseString)
    {
        // create the new data structure
        $result = new RegistrationDetailsDatabase();

        // add the name of this database
        preg_match("/Database (\S+)/", $inDatabaseString, $databaseName);
        $result->setDatabaseName($databaseName[1]); // [0] is the whole match, [1] is the first matched..etc
        // set the parsed name
        preg_match("/(\d+)-(\d+)-(\d)(.*)/", $databaseName[1], $matches);
        $result->setDatabaseParsedName("Year: 20".$matches[1]."/20".$matches[2]." - Semester ".$matches[3]." - ".($matches[4] == "X" ? ("Overall") : "Coursework Only"));

        // split into students
        $studentStringArray = preg_split("/\nStudent /", $inDatabaseString, null, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE); // left with id:.....end
        array_shift($studentStringArray); // get rid of the first line that talks about the database / number of students etc

        foreach($studentStringArray as $studentString)
            $result->addStudent($this->parseStudent($studentString));

        return $result;
    }

    private function parseStudent($inStudentString)
    {
        // create new data structure
        $result = new RegistrationDetailsStudent();

        preg_match("/id:\s+(.*)/", $inStudentString, $matches);
        $result->setStudentID($matches[1]);

        preg_match("/Reg. status:\s+(.*)/", $inStudentString, $matches);
        $result->setRegStatus($matches[1]);

        preg_match("/Reg. number:\s+(.*)/", $inStudentString, $matches);
        $result->setRegNumber($matches[1]);

        preg_match("/Degree:\s+(.*)/", $inStudentString, $matches);
        $result->setDegree($matches[1]);

        preg_match("/Year:\s+(.*)/", $inStudentString, $matches);
        $result->setYear($matches[1]);

        preg_match("/Owner:\s+(.*)/", $inStudentString, $matches);
        $result->setOwner($matches[1]);

        preg_match("/Lab Group:\s+(.*)/", $inStudentString, $matches);
        $result->setLabGroup($matches[1]);

        preg_match("/Tutorial Group:\s+(.*)/", $inStudentString, $matches);
        $result->setTutorialGroup($matches[1]);

        preg_match("/Tutor:\s+(.*)/", $inStudentString, $matches);
        $result->setTutor($matches[1]);

        preg_match("/Preferred Name:\s+(.*)/", $inStudentString, $matches);
        $result->setPreferredName(str_replace("_", " ", $matches[1]));

        preg_match("/DB Surname:\s+(.*)/", $inStudentString, $matches);
        $result->setDbSurname($matches[1]);

        preg_match("/DB First names:\s+(.*)/", $inStudentString, $matches);
        $result->setDbFirstNames(str_replace("_", " ", $matches[1]));

        preg_match("/Email name:\s+(.*)/", $inStudentString, $matches);
        $result->setEmailName($matches[1]);

        preg_match("/Modules:\s+(.*)/", $inStudentString, $matches);
        $result->setModules($matches[1]);

        return $result;
    }

}

// all below this line is temp for testing purposes only
//include("Result.php");
//
//
//$parser = new RegistrationDetailsParser();
//$result = $parser->parse($parser->sampleString);
//var_dump($result);