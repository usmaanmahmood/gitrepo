<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 03/12/14
 * Time: 08:54
 */

include("../config.php");

$arcadeClient = new ARCADEClient();
$querystr = "time-table: " . $_GET["search"];
$query = new Query($querystr, 0); // command, plainTextWanted

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
        ?>
        <tr>
            <td><?= ($weekKey + 1) ?></td>
            <?php
            foreach ($week->getDayList() as $dayListKey => $day) {
                ?>
                <td><?php
                foreach ($day->getSessionList() as $daySession) {
                    $daySessionName = $daySession->getName();
                    if ($daySessionName != "") {
                        ?>
                        <span class="label label-success"><?= $daySession->getModule() ?></span><br/>
                        <span class="label label-info"><?php if($daySession->getTime() != "") echo $daySession->getTime() . " on ";
                            echo $daySession->getDateDay() . "/" . $daySession->getDateMonth() ?></span>
                        <br/>
                        <span class="label label-default">Group: <?= $daySession->getGroup() ?></span>
                        <span class="label label-default">Info: <?= $daySession->getInfo() ?></span>
<br/><br/>
                    <?php
                    }?>
<?php }?>
                    </td>

                <?php

            }

            }
            ?>
        </tr>
    </table>

<?php } ?>
