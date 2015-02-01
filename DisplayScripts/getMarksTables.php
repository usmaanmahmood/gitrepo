<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 03/12/14
 * Time: 08:54
 */

include("../config.php");

$arcadeClient = new ARCADEClient();
$query = new Query("marks-table: all", 0); // command, plainTextWanted

// if none selected then it is empty. if it is, send the array through
if (!empty($_GET["databases"])) $query->addDatabases($_GET["databases"]);
if (!empty($_GET["groups"])) $query->addGroups($_GET["groups"]);
if (!empty($_GET["students"])) $query->addStudents($_GET["students"]);
if (!empty($_GET["modules"])) $query->addModules($_GET["modules"]);

$result = $arcadeClient->execute($query);

?>


    <h1>Marks Table</h1>
<?php foreach ($result->getDatabaseList() as $database) {
    if (!empty($database->getTableList())) {
        echo "<h3>" . $database->getDatabaseParsedName() . "</h3>";
        foreach ($database->getTableList() as $table) {
            echo "<h4>Table: " . $table->getName() . "</h4>";
            echo "<h5>" . $table->getScalingFactor() . "</h5>";
            ?>
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr>
                    <th width="150px">Name</th>
                    <?php foreach ($table->getEmailNames() as $weighting) {
                        echo "<th>" . $weighting . "</th>";
                    }?>
                </tr>
                <tr>
                    <th width="150px">Marks</th>
                    <?php
                    $weightings = $table->getMarks();
                    $denominators = $table->getDenominators();
                    $percentages = $table->getPercMark();
                    $percWeight = $table->getPercWeight();

                    foreach ($weightings as $key => $weighting) {
                        $markString = "<td>" . $weighting;
                        if (is_numeric($denominators[$key]))
                            $markString = $markString . "/" . $denominators[$key]; // ignores last two cols

                        if (!empty($percentages[$key]))
                        $markString = $markString . "<br />" . $percentages[$key];

                        $markString = $markString . "</td>";
                        echo $markString;
                    }
                    ?>
                </tr>
                <tr>
                    <th width="150px">Weightings</th>
                    <?php foreach ($table->getWeightings() as $key => $weighting) {
                        echo "<td>" . $weighting . "<br />" . $percWeight[$key] . "</td>";
                    }?>
                </tr>
<!--                <tr>-->
<!--                    <th width="150px">Deadline &percnt; of Coursework</th>-->
<!--                    --><?php //foreach ($table->getPercWeight() as $percentage) {
//                        echo "<td>" . $percentage . "</td>";
//                    }?>
<!--                </tr>-->
                <tr>
                    <th width="150px">&percnt; of Coursework</th>
                    <?php foreach ($table->getPercScore() as $percentage) {
                        echo "<td>" . $percentage . "</td>";
                    }?>
                </tr>
            </table>
            <hr />
<!-----------------------------------------------new table----------------------------------------------->
<!--            <table class="table table-striped table-hover table-bordered table-condensed">-->
<!--                <tr>-->
<!--                    <th>Name</th>-->
<!--                    <th>Mark</th>-->
<!--                    <th>Weightings</th>-->
<!--                    <th>Deadline &percnt; of Coursework</th>-->
<!--                    <th>Your &percnt; of Coursework</th>-->
<!--                </tr>-->
<!--                --><?php
//                $names = $table->getEmailNames();
//                $weightings = $table->getMarks();
//                $denominators = $table->getDenominators();
//                $percentageMarks = $table->getPercMark();
//                $percentageWeights = $table->getPercWeight();
//                $percentageScores = $table->getPercScore();
//
//
//                foreach ($weightings as $key => $weighting) {
//                    echo "<tr>";
                    //////////////////////////////////
//                    echo "<th>" . $names[$key] . "</th>";
                    //////////////////////////////////
//                    $markString = "<td>" . $weighting;
//                    if (is_numeric($denominators[$key]))
//                        $markString = $markString . "/" . $denominators[$key]; // ignores last two cols
//
//                    if (!empty($percentages[$key]))
//                        $markString = $markString . " | " . $percentages[$key];
//
//                    $markString = $markString . "</td>";
//                    echo $markString;
                    //////////////////////////////////
//                    echo "<td>" . $percentageMarks[$key] . "</td>";
                    //////////////////////////////////
//                    echo "<td>" . $percentageWeights[$key] . "</td>";
                    //////////////////////////////////
//                    echo "<td>" . $percentageScores[$key] . "</td>";
                    //////////////////////////////////
//                    echo "</tr>";
//                }
//                ?>
<!---->
<!--            </table>-->
        <?php
        }
    }
}?>