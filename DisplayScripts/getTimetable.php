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

    foreach ($database->getWeekList() as $week) {
        echo "Week <br />";

        foreach ($week->getDayList() as $day) {
            echo "-Day <br />";

            foreach ($day->getSessionList() as $daySession) {
//                echo "--Session <br />";

                $daySessionName = $daySession->getName() == "" ? "empty" : $daySession->getName();
//                echo "--" . $daySessionName . "<br />";
            }
        }

    }
    ?>


<?php } ?>
