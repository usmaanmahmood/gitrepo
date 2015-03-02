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
<?php foreach ($result->getDatabaseList() as $database) {
    ?>
    <table class="table table-striped table-hover table-bordered table-condensed">
        <tr>
            <td>Database</td>
            <td><?= $database->getDatabaseParsedName(); ?></td>
        </tr>
        <tr>
            <td>Group</td>
            <td><?= $database->getGroup(); ?></td>
        </tr>
        <tr>
            <td>Module List</td>
            <td><?= implode(" ", $database->getModuleList()); ?></td>
        </tr>
        <tr>
            <td>Percentage</td>
            <td><?= $database->getPercentage(); ?>&percnt;</td>
        </tr>
        <tr>
            <td>Pattern</td>
            <td><div class="pull-right bg-info" style="margin: 10px; padding:20px;"><strong>Key:</strong><br />
                    One line per week<br />
                    <div class="green pull-left"></div> : attended<br />
                    <div class="orange pull-left"></div> : excused<br />
                    <div class="red pull-left"></div> : absent<br />
                    <div class="white pull-left"></div> : no attendance taken
                    </div>
                <?php
                $rawPattern = $database->getAttendancePattern();
                $splitPattern = str_split($rawPattern);
                $weekCount = 1;
                $lastWasSemester = 0;

                foreach ($splitPattern as $character) {

                    if ($character == "|") {
                        $weekCount = 1;
                        echo "<br /><br /><div class=\"pull-left\">Semester Change</div><br /><span class=\"pull-left\" style=\"width:65px\">Week " . $weekCount . " </span>";
                        $lastWasSemester = 1;
                        continue;
                    } else if ($character == ".") {
                        if (!$lastWasSemester) {
                            $weekCount++;
                            echo "<br /><span class=\"pull-left\" style=\"width:65px\">Week " . $weekCount . " </span>";
                        }
                        continue;
                    }
                    else
                    {
                        $lastWasSemester = 0;
                    }

//        echo $character;

                    $colour = "null";
                    switch ($character) {
                        case "/":
                            $colour = "green";
                            break;
                        case "x":
                            $colour = "red";
                            break;
                        case "E":
                            $colour = "orange";
                            break;
                        case "N":
                            $colour = "white";
                            break;
                        case "|":
                            $divider = "|";
                            break;
                        case ".":
                            $divider = ".";
                            break;
                    }
                    if ($colour != "null")
                        echo "<div class=\"" . $colour . " pull-left\"></div>";
                }
                ?></td>
        </tr>
        <tr class="hide">
            <td>Raw Pattern</td>
            <td><?= $database->getAttendancePattern(); ?></td>
        </tr>
    </table>
<?php } ?>
<script type="javascript">
    $(function () {
        $('[data-toggle="popover"]').popover();
    })
</script>
