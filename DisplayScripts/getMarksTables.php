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
        echo "<h2>Database: " . $database->getDatabaseParsedName() . "</h2>";
        foreach ($database->getTableList() as $table) {
            echo "<h3>Table: " . $table->getName() . "</h3>";

            ?>
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr>
                    <th width="150px">Names</th>
                    <?php foreach ($table->getEmailNames() as $weighting) {
                        echo "<th>" . $weighting . "</th>";
                    }?>
                </tr>
                <tr>
                    <th width="150px">Marks</th>
                    <?php
                    $weightings = $table->getMarks();
                    $denominators = $table->getDenominators();

                    foreach ($weightings as $key => $weighting) {
                        $markString = "<td>" . $weighting;
                        if (is_numeric($denominators[$key]))
                            $markString = $markString . "/" . $denominators[$key]; // ignores last two cols
                        $markString = $markString . "</td>";
                        echo $markString;
                    }


                    ?>
                </tr>
                <tr>
                    <th width="150px">&percnt; Scored of Exercise</th>
                    <?php
                    foreach ($table->getPercMark() as $percentage) {
                        echo "<td>" . $percentage . "</td>";
                    }?>
                </tr>
                <tr>
                    <th width="150px">Weightings</th>
                    <?php foreach ($table->getWeightings() as $weighting) {
                        echo "<td>" . $weighting . "</td>";
                    }?>
                </tr>
                <tr>
                    <th width="150px">&percnt; Total of Module</th>
                    <?php foreach ($table->getPercWeight() as $percentage) {
                        echo "<td>" . $percentage . "</td>";
                    }?>
                </tr>
                <tr>
                    <th width="150px">&percnt; Scored of Module</th>
                    <?php foreach ($table->getPercScore() as $percentage) {
                        echo "<td>" . $percentage . "</td>";
                    }?>
                </tr>
            </table>
        <?php
        }
    }
}?>