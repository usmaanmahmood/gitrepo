<?php include "querytop.php" ?>

<?php


/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 30/10/14
 * Time: 14:50
 */
$string = '
++WORKING
++WORKING
++WORKING
++COMMAND
Welcome and help
++COMMAND
If the data is wrong
++COMMAND
registration-details
++COMMAND
registration-details: with lab groups
++COMMAND
display-picture
++COMMAND
time-table: remaining
++COMMAND
time-table: full
++COMMAND
time-table: with extensions
++COMMAND
attendance-summary
++COMMAND
marks-table: all
++COMMAND
marks-table: fails only
++COMMAND
marks-table: ignore empty columns
++COMMAND
expected
++COMMAND
excuses
++COMMAND
irregularities
++COMMAND
failure-predictions
++COMMAND
full-story: with notes
++COMMAND
full-story: without notes
++COMMAND
full-story: chronological
++MODULESORTORDER
Sem1_EXAMS_SH
++MODULESORTORDER
Sem1_EXAMS_CM
++MODULESORTORDER
Sem1_EXAMS_CSwBM
++MODULESORTORDER
Overall
++MODULESORTORDER
OverallFeb
++MODULESORTORDER
OverallExamFeb
++MODULESORTORDER
Sem1Summary
++MODULESORTORDER
Sem2Summary
++MODULESORTORDER
10021
++MODULESORTORDER
10020F
++MODULESORTORDER
10031
++MODULESORTORDER
10081
++MODULESORTORDER
10211
++MODULESORTORDER
10580F
++MODULESORTORDER
10900F
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 21111 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 21111X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 22712 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23111 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23111X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23420 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23421X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23421Xa 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23421Xb 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23422X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25111 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25111X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25212 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25212X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 26120 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 26121X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 26122X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112Xa 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112Xb 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112Xc 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28112 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28112X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28411 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28411X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali Overall 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali OverallCOMP 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali OverallExam 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 21111C 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 21111E 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 22712L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23111E 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23111L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23421L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23421W 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23422L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 25111L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 25212L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 26121L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 26122L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 27112C 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 27112L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 28112L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 28411L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 28411W 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali Careers 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali GSkills 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali GSkills1 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali GSkills2 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali Tut1 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali Tut2 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 101 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 111 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 111s1X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 111s2X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 112 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 112X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 121 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 121X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 141 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 141X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 151 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 151X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161L 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161v162 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 162 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 162L 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 162X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 181 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 181X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali Overall 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallExam 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallSH 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallSem1 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallSem2 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101CL 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s1C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s1P 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s1S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s2C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s2P 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s2S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111T 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s1C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s1E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s1S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s2C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s2E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s2S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 112C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 112E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 112S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 121L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 121S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 141E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 141L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 141S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 151E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 151L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 151S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 161L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 161S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 162L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 162S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 181E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 181L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 181S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Intro1 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Intro23 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali IntroW 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali PASS1 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali PASS2 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Tut1 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Tut2 ';


class Filter {
    public  $database = "";
    public  $group = "";
    public  $studentUsername = "";
    public  $studentFullname = "";
    public  $module = "";

    public function __construct($inDatabase, $inGroup, $inStudentUsername, $inStudentFullname, $inModule) {
        $this->database = $inDatabase;
        $this->group = $inGroup;
        $this->studentUsername = $inStudentUsername;
        $this->studentFullname = $inStudentFullname;
        $this->module = $inModule;
    }

    public function returnSQLValues() {
        return '("'.$this->database.'", "'.$this->group.'", "'.$this->studentUsername.'", "'.$this->studentFullname.'", "'.$this->module.'")';
    }
}


class Query {
    public $filterArray;

    public $arcadeUsername = 'mahmoou1';

    //performs cleanup of ProfileQuery result, and creates 2D array for filter data
    public function __construct($string) {
        $this->filterArray = array();

        $startposition = strrpos($string, "++MODULESORTORDER"); // start of final ++MODULESTOORDER
        $stringcleanedup = substr($string, $startposition); // trim down to start (2 garbage lines still need removing)
        $lines = preg_split('/\r\n|\r|\n/', $stringcleanedup, 2); // remove first line
        $lines = preg_split('/\r\n|\r|\n/', $lines[1], 2); // remove second line so just have required list
        $lines = $lines[1];
        $rowbyrow = explode("\n", trim($lines)); // split $lines into array of strings, line by line, after trimming whitespace

        // create
        foreach($rowbyrow as $key => $row) {
            $colsarray = explode(" ", trim($row)); // split row into array of strings, delimiter is space, after trimming whitespace
            $rowbyrow[$key] = $colsarray;
        }

        // populate
        foreach($rowbyrow as $filter){
                $newFilter = new Filter($filter[0], $filter[1], $filter[2], $filter[3], $filter[4]);
                $this->addFilter($newFilter);
        }
    }

    public function addFilter(Filter $newFilter) {
        array_push($this->filterArray, $newFilter);
    }

    //returns as html table
    public function __toString() {
        $out  = "";
        $out .= "<table>";
        foreach($this->filterArray as $key => $element){
            $out .= "<tr>";
            foreach($element as $subkey => $subelement){
                $out .= "<td>$subelement</td>";
            }
            $out .= "</tr>";
        }
        $out .= "</table>";

        return $out;
    }

    // requires exact name, returns Array of list - use array_column 5.5 onwards
    public function getList($inListName) {
        $array = array();
        foreach($this->filterArray as $filter) {
            array_push($array, $filter->$inListName);
        }
       return array_unique($array);
    }

    //incomplete
    public function returnSQLValues()
    {
        $sql = array();
        foreach ($this->filterArray as $filter) {
            array_push($sql, $this->arcadeUsername . $filter->returnSQLValues() . ",");
        }
        return $sql;
    }
    //incomplete
    public function insertIntoDatabase(){
        $valuesString = $this->returnSQLValues();
        rtrim($valuesString, ",");
        mysql_query('INSERT INTO ProfileCache (arcadeusername, databasename, groupname, studentusername, studentname, module) VALUES '. implode(",", $valuesString));
    }
}

$arcadeQuery = new Query($string);

//echo $arcadeQuery;
//var_dump($arcadeQuery->filterArray);
?>
<select multiple class="form-control" style="float:left" size=10>
<?php foreach($arcadeQuery->getList("database") as $option) { ?>
    <option>
        <?php echo $option ?>
    </option>
<?php }?>
</select>
<select multiple class="form-control" style="float:left" size=10>
    <?php foreach($arcadeQuery->getList("group") as $option) { ?>
        <option>
            <?php echo $option ?>
        </option>
    <?php }?>
</select>
<select multiple class="form-control" style="float:left" size=10>
    <?php foreach($arcadeQuery->getList("studentFullname") as $option) { ?>
        <option>
            <?php echo $option ?>
        </option>
    <?php }?>
</select>
<select multiple class="form-control" style="float:left" size=10>
    <?php foreach($arcadeQuery->getList("module") as $option) { ?>
        <option>
            <?php echo $option ?>
        </option>
    <?php }?>
</select>
<?php include "querybottom.php" ?>
