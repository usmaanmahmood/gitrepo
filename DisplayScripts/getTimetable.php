<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 03/12/14
 * Time: 08:54
 */

include("../config.php");

$arcadeClient = new ARCADEClient();
$query = new Query("time-table: full", 0); // command, plainTextWanted

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


    <?php

    $infoList = $database->getSessionInfoList();
    foreach ($infoList as $infoLine)
        echo $infoLine . "<br />";
    ?>
    <table class="table table-striped table-hover table-bordered table-condensed">
        <tr>
            <td>Week #</td>
            <td>Monday</td>
            <td>Tuesday</td>
            <td>Wednesday</td>
            <td>Thursday</td>
            <td>Friday</td>
        </tr>
        <?php
        foreach ($database->getWeekList() as $weekKey => $week) {
            ?><tr>
            <td><?=($weekKey + 1)?></td>
            <?php
//                echo "Week " . ($weekKey + 1) . "<br />";

            foreach ($week->getDayList() as $dayListKey => $day) {
//                echo "Day " . ($dayListKey + 1) . "<br />";
                foreach ($day->getSessionList() as $daySession) {
//                echo "----------Session <br />";

                    $daySessionName = $daySession->getName();
//                    echo "----------" . $daySessionName . "<br />";
            ?>
            <td><?=$daySessionName?></td>
                <?}
            }

        }
        ?>
                </tr>
    </table>

<?php } ?>
