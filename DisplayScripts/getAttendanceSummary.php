<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 03/12/14
 * Time: 08:54
 */

include("../config.php");

$arcadeClient = new ARCADEClient();
$query = new Query("attendance-summary", 0); // command, plainTextWanted

// if none selected then it is empty. if it is, send the array through
if (!empty($_GET["databases"])) $query->addDatabases($_GET["databases"]);
if (!empty($_GET["groups"])) $query->addGroups($_GET["groups"]);
if (!empty($_GET["students"])) $query->addStudents($_GET["students"]);
if (!empty($_GET["modules"])) $query->addModules($_GET["modules"]);

$result = $arcadeClient->execute($query);

?>
<?php foreach($result->getDatabaseList() as $database)
{
?>
<table class="table table-striped table-hover table-bordered table-condensed">
    <tr>
        <td>Database:</td><td><?=$database->getDatabaseParsedName();?></td>
    </tr>
    <tr>
        <td>Group</td><td><?=$database->getGroup();?></td>
    </tr>
    <tr>
        <td>Module List</td><td><?=implode(" ", $database->getModuleList());?></td>
    </tr>
    <tr>
        <td>Percentage</td><td><?=$database->getPercentage();?></td>
    </tr>

    <tr>
        <td>Pattern</td><td><?=$database->getAttendancePattern();?></td>
    </tr>
    <tr>
        <td>Pattern</td><td>
    <?php
    $rawPattern = $database->getAttendancePattern();
    $splitPattern = str_split($rawPattern);

    foreach($splitPattern as $character)
    {

        if ($character == "|") {
            echo "<br />New Semester</br>";
            continue;
        }
        else if ($character == ".") {
            echo "<br /></br>";
            continue;
        }

        $colour = "null";
        switch ($character) {
            case "/":   $colour = "green";
                break;
            case "x":   $colour = "red";
                break;
            case "E":   $colour = "orange";
                break;
            case "N":   $colour = "white";
                break;
            case "|":   $divider = "|";
                break;
            case ".":   $divider = ".";
                break;
        }
        if ($colour != "null")
            echo "<div class=\"" . $colour . "\"></div>";
    }
    ?></td>
    </tr>
</table>
<?php } ?>
