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
                <td colspan="2">
                    <table class="table table-hover table-bordered table-condensed">
                        <tr>
                            <th>Session</th>
                            <th>Session Date(s)</th>
                            <th>Attended</th>
                            <th>Completed By Deadline</th>
                            <th>Extension</th>
                            <th>Completed By Extension</th>
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
                                    <td colspan="9"><?= $session->getOther() ?></td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <!--            <tr>-->
            <!--                <td>Raw Session:</td>-->
            <!--                <td>-->
            <!--                    <pre>--><? //= $module->getRawSession(); ?><!--</pre>-->
            <!--                </td>-->
            <!--            </tr>-->
            <tr>
                <td>Session Info:</td>
                <td>
                    <pre><?= $module->getSessionInfo(); ?></pre>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>



<?php } ?>
