<?php



class AnalyserParser // extends Parser
{
    public function parse($inDatabaseID)
    {
        // for selected database

        // for each module in list

        // run attendance-summary query with that db and module selected - get the value out of the result object

        // extract the attendance percentage into the analyser result object

        // do the same for marks-table

        // set up lists
//        $arcadeClient = new ARCADEClient();
//        $query = new Query("profile", 0);
//        $arcadeProfile = $arcadeClient->execute($query);
//        $twoDArray = $arcadeProfile->getTwoDimensionalArray();
//
//        var_dump($twoDArray);
        var_dump($inDatabaseID);

//        $result = new AnalyserResult();
//        return $result;
    }



}



// all below this line is temp for testing purposes only
//include("../ARCADEClient.php");
//include("Result.php");

//$parser = new AnalyserParser();
//$result = $parser->parse('12-13-2X');
//var_dump($result);