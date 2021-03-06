<?php



class AnalyserParser // extends Parser
{
    public function parse($inDatabaseID, $inModuleList)
    {
        error_reporting(0);


        $result = new AnalyserResult();

//        var_dump($inDatabaseID, $inModuleList);

        foreach($inModuleList as $module)
        {
            $moduleResult = new AnalyserModule();

            $arcadeClient = new ARCADEClient();
            $query = new Query("attendance-summary", 0);
            $query->addDatabase($inDatabaseID);
            $query->addModule($module);
            $queryResult = $arcadeClient->execute($query);
            $dbList = $queryResult->getDatabaseList();

            $moduleResult->setModuleId($module);
            $moduleResult->setAttendancePercentage($dbList[0]->getPercentage());
            $moduleResult->setAttendancePattern($dbList[0]->getAttendancePattern());

            $query = new Query("marks-table: all", 0);
            $query->addDatabase($inDatabaseID);
            $query->addModule($module);
            $queryResult = $arcadeClient->execute($query);
            $dbList = $queryResult->getDatabaseList();

            if (!empty($dbList[0])) {
                $tableList = $dbList[0]->getTableList();
            }

            if (!empty($tableList[0])) {
                $marksArray = $tableList[0]->getMarks();
                $moduleResult->setTotalMark($marksArray[count($marksArray)-2]);
            }


            $result->addModule($moduleResult);
        }

        return $result;
    }

}