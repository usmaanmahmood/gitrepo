<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 03/12/14
 * Time: 08:54
 */

include("../config.php");

$arcadeClient = new ARCADEClient();
$query = new Query("full-story: with notes", 0); // command, plainTextWanted

// if none selected then it is empty. if it is, send the array through
if (!empty($_GET["databases"])) $query->addDatabases($_GET["databases"]);
if (!empty($_GET["groups"])) $query->addGroups($_GET["groups"]);
if (!empty($_GET["students"])) $query->addStudents($_GET["students"]);
if (!empty($_GET["modules"])) $query->addModules($_GET["modules"]);

$result = $arcadeClient->execute($query);

?>
<?php foreach ($result->getDatabaseList() as $database) {
    ?>
    <h3>Database: <?= $database->getDatabaseParsedName(); ?></h3>
    <?php foreach ($database->getModuleList() as $module) {
        ?>
        <table class="table table-striped table-hover table-bordered table-condensed">
            <tr>
                <td>Module:</td>
                <td><?= $module->getModuleName(); ?> </td>
            </tr>
            <tr>
                <td>Session:</td>
                <td>
                    <table class="table table-striped table-hover table-bordered table-condensed">
                        <tr>
                            <td>Attended</td>
                            <td>Completed By Deadline</td>
                            <td>Extension</td>
                            <td>Completed By Extension</td>
                            <td>Date</td>
                            <td>Mark</td>
                            <td>Other</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>Raw Session:</td>
                <td><pre><?= $module->getRawSession(); ?></pre></td>
            </tr>
            <tr>
                <td>Session Info:</td>
                <td><pre><?= $module->getSessionInfo(); ?></pre></td>
            </tr>
        </table>
    <?php
    }
    ?>



<?php } ?>
