<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 26/11/14
 * Time: 12:06
 */
$sampleString = "For explanation of columns, see `full-story: with notes'.

===============================================================================
Database 12-13-2

Table 21111C:
21111C No module scaling factor applied
------------------------------------------------------------------------------------------------
      Weighting     |1    |1    |1    |1    |1    |1    |1    |1    |1    |1    |10      |
------------------------------------------------------------------------------------------------
      Denominator   |20   |20   |20   |20   |20   |20   |20   |20   |20   |20   |%       |%
------------------------------------------------------------------------------------------------
Email Name          |Ex1D |Ex2D |Ex3D |Ex4D |Ex5D |Ex6D |Ex7D |Ex8D |Ex9D |Ex10D|Total   |Marked
================================================================================================
mahmoou1 Mahmood,Usm|17   |20   |10   |16   |19   |16   |20   |13   |14   |7    |76      |76

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


===============================================================================
End of query results";


class MarksTableResult //extends Parser
{


    private $databaseList; // array of MarksTableDatabase

    public function __construct()
    {
        $this->databaseList = array();
    }

    public function getDatabaseList()
    {
        return $this->databaseList;
    }

    public function addDatabase(MarksTableDatabase $inDatabase)
    {
        array_push($this->databaseList, $inDatabase);
    }
}

class MarksTableDatabase
{
    private $databaseName;
    private $databaseParsedName;
    private $tableList; // array of MarksTableTable

    public function __construct()
    {
        $this->tableList = array();
    }

    public function getTableList()
    {
        return $this->tableList;
    }

    public function addTable(MarksTableTable $tableList)
    {
        array_push($this->tableList, $tableList);
    }

    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    public function setDatabaseParsedName($databaseParsedName)
    {
        $this->databaseParsedName = $databaseParsedName;
    }

    public function getDatabaseParsedName()
    {
        return $this->databaseParsedName;
    }

}

class MarksTableTable {

    private $name;
    private $scalingFactor;
    private $range;
    private $weightings; // array
    private $denominators; // array
    private $emailNames; // array
    private $marks; // array
    private $marksTable; // 2d array

    public function __construct()
    {
        $this->marks = [];
    }

    public function buildMarksTable()
    {
        $this->marksTable = [];
        $arrayLength = count($this->marks);
        $i = 0;
        while ($i < $arrayLength)
        {
            $this->marksTable[$i] = array($this->weightings[$i], $this->denominators[$i], $this->emailNames[$i], $this->marks[$i]);
            $cleanMark = preg_replace("/[^0-9.]+/", "", $this->marks[$i]);
            $cleanDen = preg_replace("/[^0-9.]+/", "", $this->denominators[$i]);

            // add percentage of Mark
            if ($cleanMark != "" && $cleanDen != "") {
                $percMark = number_format((float)(((float)$cleanMark / (float)$cleanDen) * 100), 1, '.', '');
                $this->marksTable[$i][4] = $percMark;
            }
            else
                $this->marksTable[$i][4] = "";

            // add exercise value percentage of entire result
            // arraylength-2 always stores total
            $cleanWeighting = preg_replace("/[^0-9.]+/", "", $this->weightings[$i]);
            if ($cleanWeighting != "") {
                $percWeight = number_format((float)(((float)$this->weightings[$i] / (float)$this->weightings[$arrayLength - 2]) * 100), 1, '.', '');
                $this->marksTable[$i][5] = $percWeight;
            }
            else
                $this->marksTable[$i][5] = "";

            // add percentage scored of total mark
            if ($this->marksTable[$i][4] != "" && $this->marksTable[$i][5] != "") {
                $percScore = number_format((float)(((float)$percWeight) * ((float)$percMark / 100)), 1, '.', '');
                $this->marksTable[$i][6] = $percScore;
            }
            else
                $this->marksTable[$i][6] = "";

            $i++;
        }
        $totalPercScore = 0;
        foreach($this->marksTable[6] as $percScored)
            if ($percScored != "")
                $totalPercScore = $totalPercScore + $percScored;

        echo $totalPercScore;
        $this->marksTable[6][$arrayLength-2] = $totalPercScore;
    }

    public function getPercMark() {
        $array = [];
        foreach($this->marksTable as $marksObject)
        {
            array_push($array, $marksObject[4]);
        }
        return $array;
    }

    public function getPercWeight() {
        $array = [];
        foreach($this->marksTable as $marksObject)
        {
            array_push($array, $marksObject[5]);
        }
        return $array;
    }

    public function getPercScore() {
        $array = [];
        foreach($this->marksTable as $marksObject)
        {
            array_push($array, $marksObject[6]);
        }
        return $array;
    }

    public function getDenominators()
    {
        return $this->denominators;
    }

    public function setDenominators($denominators)
    {
        $this->denominators = $denominators;
    }

    public function getEmailNames()
    {
        return $this->emailNames;
    }

    public function setEmailNames($emailNames)
    {
        $this->emailNames = $emailNames;
    }

    public function getMarks()
    {
        return $this->marks;
    }

    public function setMarks($marks)
    {
        $this->marks = $marks;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRange()
    {
        return $this->range;
    }

    public function setRange($range)
    {
        $this->range = $range;
    }

    public function getScalingFactor()
    {
        return $this->scalingFactor;
    }

    public function setScalingFactor($scalingFactor)
    {
        $this->scalingFactor = $scalingFactor;
    }

    public function getWeightings()
    {
        return $this->weightings;
    }

    public function setWeightings($weightings)
    {
        $this->weightings = $weightings;
    }

}


?>