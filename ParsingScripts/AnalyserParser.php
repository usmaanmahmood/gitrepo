<?php



class AnalyserParser // extends Parser
{
    public function parse($inDatabaseID, $inModuleList)
    {
        // for selected database

        // for each module in list

        // run attendance-summary query with that db and module selected - get the value out of the result object

        // extract the attendance percentage into the analyser result object

        // do the same for marks-table

        // set up lists

//
//        $twoDArray = $arcadeProfile->getTwoDimensionalArray();
//
//        var_dump($twoDArray);
        var_dump($inDatabaseID, $inModuleList);

        foreach($inModuleList as $module)
        {
            $arcadeClient = new ARCADEClient();
            $query = new Query("attendance-summary", 0);
            $queryResult = $arcadeClient->execute($query);
        }

//        $result = new AnalyserResult();
//        return $result;
    }

}