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
    echo "<h1>Database: " . $database->getDatabaseParsedName() . "</h1>";
    foreach ($database->getTableList() as $table) {
        echo "<h2>Table: " . $table->getName() . "</h2>";

        ?>
        <table class="table table-striped table-hover table-bordered table-condensed">
            <tr>
                <td><strong>Weightings</strong></td>
                <?php foreach ($table->getWeightings() as $weighting) {
                    echo "<td>" . $weighting . "</td>";
                }?>
            </tr>
            <tr>
                <td><strong>Denominators</strong></td>
                <?php foreach ($table->getDenominators() as $weighting) {
                    echo "<td>" . $weighting . "</td>";
                }?>
            </tr>
            <tr>
                <td><strong>Names</strong></td>
                <?php foreach ($table->getEmailNames() as $weighting) {
                    echo "<td>" . $weighting . "</td>";
                }?>
            </tr>
            <tr>
                <td><strong>Marks</strong></td>
                <?php foreach ($table->getMarks() as $weighting) {
                    echo "<td>" . $weighting . "</td>";
                }?>
            </tr>
        </table>
    <?php
    }
}?>

<!--echo $result;-->