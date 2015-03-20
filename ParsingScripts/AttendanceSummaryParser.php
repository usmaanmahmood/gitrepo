<?php

$sampleAttendanceSummaryString = "===============================================================================
Database 12-13-2X

Attendance summary for group X6 modules 21111 21111X 22712 23111 23111X 23420 23421X

Mahmood,Usmaan_Ali 100.0% NNNNNN|..................//

===============================================================================
Database 12-13-2

Attendance summary for group X6 modules 21111C 21111E 22712L 23111E 23111L 23421L 23421W 23422L 25111L 25212L 26121L 26122L 27112C 27112L 28112L 28411L 28411W Careers GSkills GSkills1 GSkills2 Tut1 Tut2

Mahmood,Usmaan_Ali 60.4% |/////./N.////./N////.N//Ex./N/xx..N///x./N//xx.N//Ex.xN//xx.NE/Ex./Nx/Nx.|.////.E//Ex/.//x/x/.//////./xxEx/./x//x/.x/?xE/.x/xE/E.x/xxx/.x/x/x/.xNx//./

===============================================================================
Database 11-12-1X

Attendance summary for group X6 modules 101 111 111s1X 111s2X 112 112X 121 121X 141 141X 151 151X 161 161L 161X 161v162 162 162L 162X 181 181X Overall OverallExam OverallSH OverallSem1 OverallSem2

Mahmood,Usmaan_Ali 100.0% NNNNNNNNNNNNNNNNNN/////////

===============================================================================
Database 11-12-1

Attendance summary for group X6 modules 101CL 101L 101s1C 101s1P 101s1S 101s2C 101s2P 101s2S 111T 111s1C 111s1E 111s1S 111s2C 111s2E 111s2S 112C 112E 112S 121L 121S 141E 141L 141S 151E 151L 151S 161L 161S 162L 162S 181E 181L 181S Intro1 Intro23 IntroW PASS1 PASS2 Tut1 Tut2

Mahmood,Usmaan_Ali 70.0% ///|./////////////.////N///////////./////////////////N.////////N////////.//////N///x///////../////////x//////.//N//x////xx///E//.xExxx////x/////x.//xxxx/x//Ex//////.x/xxx////xx/E/x./xxxx//xxN|.////N///E////./Nx/x////N/////////./NEEEE//E//////EE//x.//xx////x//N//E/xx/N.x//x////x//////E/x/.//x///xxNx////x//E.xNxxxNx/x//NNx//////.xN/xxx/xxxx/xxE/x/E./xxx///x/NxxNx/NE.NxNx///x/x/Nx//xEN.xN/x/N/N/N//xxE.xxx...???


===============================================================================
End of query results";

class AttendanceSummaryParser // extends Parser
{
    public function parse($inString)
    {
        $databaseStringArray = preg_split("/\n===============================================================================\n/", $inString,  null, PREG_SPLIT_NO_EMPTY);
        array_pop($databaseStringArray); // remove the "End of query results" line

        $result = new AttendanceSummaryResult();

        foreach($databaseStringArray as $key => $database)
            $result->addDatabase($this->parseDatabase($database));

        return $result;
    }

    private function parseDatabase($inString)
    {
        $database = new AttendanceSummaryDatabase();

        // get the database name
        preg_match("/(Database\s+(\S+))/", $inString, $matches);
        if (!empty($matches[1]))
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
//$parser = new AttendanceSummaryParser();
//$result = $parser->parse($sampleAttendanceSummaryString);
//var_dump($result);