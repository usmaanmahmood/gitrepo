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

        <h3>Module: <?= $module->getModuleName(); ?> </h3>
        <?php foreach ($module->getSessionList() as $session) {
            $getname = $session->getName();
            if (!empty($getname)) {
                ?>
                <table class="table table-hover table-bordered table-condensed">
                <tr>
                    <th>Session</th>
                    <th>Session Date(s)</th>
                    <th>Attended</th>
                    <th data-toggle="tooltip" data-placement="top" title="Tooltip on top">Completed By
                        Deadline
                    </th>
                    <th>Extension</th>
                    <th>Completed By Extension</th>
                    <th>Date Submitted</th>
                    <th>Mark</th>
                    <th>Other</th>
                </tr>

                <tr>
                    <th><?= $session->getName() ?></th>
                    <td><?= $session->getSessionDates() ?></td>
                    <td><?= $session->getAttend() ?></td>
                    <td><?= $session->getCbd() ?></td>
                    <td><?= $session->getExt() ?></td>
                    <td><?= $session->getCbe() ?></td>
                    <td><?= $session->getDate() ?></td>
                    <td><?= $session->getMark() ?></td>
                    <td><?= $session->getOther() ?></td>
                </tr>
            <?php
            } else {
                ?>
                <tr>
                    <td colspan="9"><strong>Note: </strong><?= $session->getOther() ?></td>
                </tr>
            <?php
            }
        }
        ?>
        </table>
        <table class="table table-striped table-hover table-bordered table-condensed">
                <td>Session Info:</td>
                <td>
                    <pre><?= $module->getSessionInfo(); ?></pre>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>


<?php } ?>
