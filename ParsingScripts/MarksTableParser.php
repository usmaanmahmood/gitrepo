<?php

/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 26/11/14
 * Time: 12:55
 */
class MarksTableParser // extends Parser
{
    public $sampleString = "For explanation of columns, see `full-story: with notes'.

===============================================================================
Database 12-13-2

Table 22712L:
22712L Final dynamic scaling factor (range 60%-65%) is 1.00
------------------------------------------------------------
      Weighting     |1    |1    |1    |1    |4       |
------------------------------------------------------------
      Denominator   |20   |20   |20   |20   |%       |%
------------------------------------------------------------
Email Name          |14D  |16D  |Ex7D |Ex9D |Total   |Marked
============================================================
mahmoou1 Mahmood,Usm|13   |11c  |14   |14   |65c     |65

Table 23111L:
23111L Final dynamic scaling factor (range 60%-65%) is 0.83
------------------------------------------------------------------
      Weighting     |1    |1    |1    |1    |1    |5       |
------------------------------------------------------------------
      Denominator   |20   |20   |20   |20   |20   |%       |%
------------------------------------------------------------------
Email Name          |1D   |2D   |3D   |4D   |5D   |Total   |Marked
==================================================================
mahmoou1 Mahmood,Usm|20   |18   |13   |13   |15   |65.6    |65.6

===============================================================================
Database 11-12-1

Table 162L:
162L Final dynamic scaling factor (range 60%-65%) is 0.83
-------------------------------------------------------------------------------------------------------------------------------
      Weighting     |2    |28   |20   |10   |10   |20   |10   |20   |10   |20   |10   |10   |10   |10   |      |190     |
-------------------------------------------------------------------------------------------------------------------------------
      Denominator   |1    |115  |60   |40   |40   |40   |60   |80   |40   |40   |20   |75   |100  |125  |      |%       |%
-------------------------------------------------------------------------------------------------------------------------------
Email Name          |1.1D |1.3D |2.2D |3D   |4D   |5.2D |6D   |7.2D |8D   |9.2D |10D  |11oD |12oD |13oD |Weight|Total   |Marked
===============================================================================================================================
mahmoou1 Mahmood,Usm|1    |104  |54   |40   |40   |38   |60   |60   |C    |40   |20   |-L   |-L   |-L   |160   |72.3CL  |72.3

Table 181L:
181L Final dynamic scaling factor (range 60%-65%) is 0.89
------------------------------------------------------
      Weighting     |10   |10   |20   |40      |
------------------------------------------------------
      Denominator   |10   |10   |20   |%       |%
------------------------------------------------------
Email Name          |1D   |2.2D |3.2D |Total   |Marked
======================================================
mahmoou1 Mahmood,Usm|9    |8    |20   |82.3    |82.3


===============================================================================
End of query results";

    public function parse($inString)
    {
        $databaseStringArray = preg_split("/\n===============================================================================\n/", $inString,  null, PREG_SPLIT_NO_EMPTY);
        array_shift($databaseStringArray); // remove the "For explanation of columns" line
        array_pop($databaseStringArray); // remove the "End of query results" line

        $result = new MarksTableResult();
        // create a database object for each
        // add the database name to the object
        // parse the database into tables
        // for each table
        //      create new table object
        //      parse it
        //      add the name
        //      add the data in
        //      add it to the database object

        foreach($databaseStringArray as $key => $database)
            $result->addDatabase($this->parseDatabase($database));

        return $result;

    }

    private function parseDatabase($inString)
    {
        $database = new MarksTableDatabase();

        // get the database name
        preg_match("/(?:Database\s+(\S+))/", $inString, $matches);
        $rawDbName = $matches[1];
        $database->setDatabaseName($rawDbName);
        preg_match("/(\d+)-(\d+)-(\d)(.*)/", $rawDbName, $rawDbNameMatches);
        $database->setDatabaseParsedName("Year: 20".$rawDbNameMatches[1]."/20".$rawDbNameMatches[2]." - Semester ".$rawDbNameMatches[3]." - ".($rawDbNameMatches[4] == "X" ? ("Overall") : "Coursework Only"));

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
            $table = new MarksTableTable();
            $table->setName($matches[0][$i]);
            $table->setWeightings($matches[1][$i]);
            $table->setDenominators($matches[2][$i]);
            $table->setEmailNames($matches[3][$i]);
            $table->setMarks($matches[4][$i]);
            $database->addTable($table);
        }

        return $database;
    } // parseDatabase

}


// all below this line is temp for testing purposes only
//include("Result.php");
//
//$parser = new MarksTableParser();
//$result = $parser->parse($parser->sampleString);
//var_dump($result->getDatabaseList());