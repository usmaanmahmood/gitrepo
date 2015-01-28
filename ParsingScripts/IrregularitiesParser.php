<?php

/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 26/11/14
 * Time: 12:55
 */
$sampleString = "===============================================================================
Database 12-13-2

Mahmood,Usmaan_Ali	I 22712L Lab 10 (22/4) (OLD): Absent on 22/4.
Mahmood,Usmaan_Ali	I 22712L Lab 11 (29/4) (OLD): Absent on 29/4.
Mahmood,Usmaan_Ali	I 22712L Lab 16D (27/2) Reduced due to copying or close working.
Mahmood,Usmaan_Ali	I 22712L Lab 18 (13/3) (OLD): Absent on 13/3.
Mahmood,Usmaan_Ali	I 22712L Lab 19 (20/3) (OLD): Absent on 20/3.
Mahmood,Usmaan_Ali	I 28112L Lab 2.2 (5/3) (OLD): Absent on 5/3.
Mahmood,Usmaan_Ali	J 28411W Wrk 1D (2/10) (OLD): Missed deadline, Done (by 16/10) but Late.
Mahmood,Usmaan_Ali	J 28411W Wrk 2D (16/10) (OLD): Missed deadline, Not done, Late.
Mahmood,Usmaan_Ali	J 28411W Wrk 5D (4/12) (OLD): Missed deadline, Not done, Late.
Mahmood,Usmaan_Ali	All GSkills1 Item EssayD (2/11) (OLD): Missed deadline, Excuse expired on 14/12, Not done, Late.
Mahmood,Usmaan_Ali	All GSkills1 Item PresD (19/11-12/12) (OLD): Missed deadline, Not done, Late.
Mahmood,Usmaan_Ali	X6 Tut2 Tutorial 10_Tut-9D (16/4) (OLD): Absent on 16/4, Missed deadline, Not done, Late.

===============================================================================
Database 11-12-1

Mahmood,Usmaan_Ali	B+X 101L Lab 7D (17/11) (OLD) Attended, Extension to 17/11, BUT: Done after extension, Demo missed, Done (on 24/11) but Late.
Mahmood,Usmaan_Ali	B+X 101L Lab 8D (24/11) (OLD) Attended, Extension to 24/11, BUT: Not done, Late.
Mahmood,Usmaan_Ali	All 101s2S Lecture 2 (6/2) (OLD): Absent on 6/2.
Mahmood,Usmaan_Ali	All 101s2S Lecture 4 (24/2) (OLD): Absent on 24/2.
Mahmood,Usmaan_Ali	All 111s1S Lecture 19 (8/12) (OLD): Absent on 8/12.
Mahmood,Usmaan_Ali	B+X 111s2E Ex-Class 2D (14/2) (OLD) Attendance excused, Extension non-expiring, Excused further, BUT: Still to be done.
Mahmood,Usmaan_Ali	X 151L Lab 5D (6/12) (OLD) Attended, Extension to 6/12, BUT: Not done, Late.
Mahmood,Usmaan_Ali	B+X 161L Lab 10oD (13/12) (OLD) Extension to 15/12, BUT: Not done, Late.
Mahmood,Usmaan_Ali	B+X 161L Lab 8.1 (29/11) (OLD): Absent on 29/11.
Mahmood,Usmaan_Ali	B+X 161L Lab 8oD (13/12) (OLD) Extension to 15/12, BUT: Not done, Late.
Mahmood,Usmaan_Ali	B+X 162L Lab 1.2 (6/2) (OLD): Absent on 6/2.
Mahmood,Usmaan_Ali	B+X 162L Lab 11oD (4/5) (OLD) Extension to 14/5, BUT: Not done, Late.
Mahmood,Usmaan_Ali	B+X 162L Lab 13oD (4/5) (OLD) Extension to 14/5, BUT: Not done, Late.
Mahmood,Usmaan_Ali	B+X 162L Lab 2.1 (17/2) (OLD): Absent on 17/2.
Mahmood,Usmaan_Ali	B+X 162L Lab 7.1 (19/3) (OLD): Absent on 19/3.

===============================================================================
End of query results";

class IrregularitiesParser // extends Parser
{
    public function parse($inString)
    {
        $databaseStringArray = preg_split("/\n===============================================================================\n/", $inString,  null, PREG_SPLIT_NO_EMPTY);
        array_shift($databaseStringArray); // remove the "For explanation of columns" line
        array_pop($databaseStringArray); // remove the "End of query results" line

        $result = new IrregularitiesResult();
        // create a database object for each
        // add the database name to the object
        // for each database
        //      add list of irregularities to list
        //          for each irregularity
        //              create object
        //              fill it
        foreach($databaseStringArray as $key => $database)
            $result->addDatabase($this->parseDatabase($database));

        return $result;
    }

    private function parseDatabase($inString)
    {
        $database = new IrregularitiesDatabase();

        // get the database name
        preg_match("/(?:Database\s+(\S+))/", $inString, $matches);
        $rawDbName = $matches[1];
        $database->setDatabaseName($rawDbName);
        preg_match("/(\d+)-(\d+)-(\d)(.*)/", $rawDbName, $rawDbNameMatches);
        $database->setDatabaseParsedName("20".$rawDbNameMatches[1]."/20".$rawDbNameMatches[2]." - Semester ".$rawDbNameMatches[3]." - ".($rawDbNameMatches[4] == "X" ? ("Overall") : "Coursework Only"));

        // http://regex101.com/r/oE6jJ1/34#pcre
        // split up the tables
        preg_match_all("/Table\s+([^:]+)[\s\S]*?Weighting\s+\|([\s\S]*?)\n-+\s+Denominator\s+\|([\s\S]*?)\n-+\s+Email Name\s+\|([\s\S]*?)\n=+[\s\S]+?\|([ \S]+)\n/", $inString, $matches);
        array_shift($matches); // remove the first match which is the entire table

        // parse further into perfect form
        foreach($matches as $key => $table)
            foreach($table as $key2 => $row)
                $matches[$key][$key2] = array_map('trim', explode('|', $row));

        $numberOfTables = count($matches[0]);

        // parse the tables
        for ($i = 0; $i < $numberOfTables; $i++)
        {
            $table = new IrregularitiesTable();
            $table->setName($matches[0][$i][0]);
            $table->setWeightings($matches[1][$i]);
            $table->setDenominators($matches[2][$i]);
            $table->setEmailNames($matches[3][$i]);
            $table->setMarks($matches[4][$i]);
            $table->buildIrregularities();
            $database->addTable($table);
        }

        return $database;
    } // parseDatabase

}



// all below this line is temp for testing purposes only
//include("Result.php");
//
//$parser = new IrregularitiesParser();
//$result = $parser->parse($parser->sampleString);
//var_dump($result->getDatabaseList());