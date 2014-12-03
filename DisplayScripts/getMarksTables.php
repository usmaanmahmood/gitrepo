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
                    <th width="100px">Names</th>
                    <?php foreach ($table->getEmailNames() as $weighting) {
                        echo "<th>" . $weighting . "</th>";
                    }?>
                </tr>
                <tr>
                    <th width="100px">Marks</th>
                    <?php foreach ($table->getMarks() as $weighting) {
                        echo "<td>" . $weighting . "</td>";
                    }?>
                </tr>
                <tr>
                    <th width="100px">Percentage</th>
                    <?php

                    $marksPercentageArray = [];



                    foreach ($table->getDenominators() as $weighting) {
                        echo "<td>" . $weighting . "</td>";
                    }?>
                </tr>
                <tr>
                    <th width="100px">Denominators</th>
                    <?php foreach ($table->getDenominators() as $weighting) {
                        echo "<td>" . $weighting . "</td>";
                    }?>
                </tr>

                <tr>
                    <th width="100px">Weightings</th>
                    <?php foreach ($table->getWeightings() as $weighting) {
                        echo "<td>" . $weighting . "</td>";
                    }?>
                </tr>
            </table>
        <?php
        }
    }
}?>