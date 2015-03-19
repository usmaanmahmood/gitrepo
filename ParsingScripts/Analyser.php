<?php



class AnalyserParser // extends Parser
{
    public function parse($inString)
    {
        $databaseStringArray = preg_split("/\n===============================================================================\n/", $inString,  null, PREG_SPLIT_NO_EMPTY);
        array_pop($databaseStringArray); // remove the "End of query results" line

        $result = new AnalyserResult();

        foreach($databaseStringArray as $key => $database)
            $result->addDatabase($this->parseDatabase($database));

        return $result;
    }

    private function parseDatabase($inString)
    {
        $database = new AnalyserDatabase();

        // get the database name
        preg_match("/(Database\s+(\S+))/", $inString, $matches);
        $rawDbName = $matches[1];

        $database->setDatabaseName($rawDbName);
        preg_match("/(\d+)-(\d+)-(\d)(.*)/", $rawDbName, $rawDbNameMatches);
        $database->setDatabaseParsedName("20".$rawDbNameMatches[1]."/20".$rawDbNameMatches[2]." - Year ".$rawDbNameMatches[3]." - ".($rawDbNameMatches[4] == "X" ? ("Overall") : "Coursework Only"));

        preg_match_all("/\n\nAttendance summary for group (\S+) modules ((?:(?:[\S]*)\s)*?)\n(\S*)\s(\S*)%\s(\S*)/", $inString, $matches);
        array_shift($matches); // remove the first match which is the entire result
        if (!empty($matches[0])) {
            $database->setGroup($matches[0][0]);
            $database->setModuleList(explode(" ", trim($matches[1][0]))); // modules list
//        $database->setGroup($matches[2]); // name - dont need
            $database->setPercentage($matches[3][0]); // percentage
            $database->setAttendancePattern($matches[4][0]); // pattern
        }

        return $database;
    } // parseDatabase

}



// all below this line is temp for testing purposes only
//include("Result.php");
//
//$parser = new AnalyserParser();
//$result = $parser->parse($sampleAnalyserString);
//var_dump($result);