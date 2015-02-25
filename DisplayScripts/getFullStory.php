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

        <h3 class="text-center">Module: <?= $module->getModuleName(); ?> </h3>

        <table class="table table-hover table-bordered table-condensed">
            <tr>
                <th>Session</th>
                <th>Session Date(s)</th>
                <th>Attended</th>
                <th><abbr title="Completed By Deadline">C.B.D.</th>
                <th><abbr title="Extension">Ext</th>
                <th><abbr title="Completed By Extension">C.B.E.</abbr></th>
                <th>Date Submitted</th>
                <th>Mark</th>
                <th>Other</th>
            </tr>
            <?php foreach ($module->getSessionList() as $session) {
                $getname = $session->getName();
                if (!empty($getname)) {
                    ?>
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
        <h4>Key:</h4>
        <?php $var = preg_replace('/[ ](?=[^>]*(?:<|$))/', '&nbsp', $module->getSessionInfo());
        echo nl2br($var); ?>
        <hr />
    <?php
    }
    ?>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>


<?php } ?>
