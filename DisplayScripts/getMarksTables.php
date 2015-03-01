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

<?php foreach ($result->getDatabaseList() as $database) {
    if (!empty($database->getTableList())) {
        echo "<h3>" . $database->getDatabaseParsedName() . "</h3>";
        foreach ($database->getTableList() as $table) {
            echo "<h3>Table: " . $table->getName() . "</h3>";
            echo "<h5>" . $table->getScalingFactor() . "</h5>";
            ?>
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr>
                    <th width="150px"><h4>Deadline</h4></th>
                    <?php foreach ($table->getEmailNames() as $name) {
                        echo "<th><h4>" . $name . "</h4></th>";
                    }?>
                </tr>
                <tr>
                    <th width="150px"><h4>Marks</h4></th>
                    <?php
                    $weightings = $table->getMarks();
                    $denominators = $table->getDenominators();
                    $percentages = $table->getPercMark();
                    $percWeight = $table->getPercWeight();

                    foreach ($weightings as $key => $weighting) {
                        $markString = "<td>" . $weighting;
                        if (is_numeric($denominators[$key]))
                            $markString = $markString . "/" . $denominators[$key]; // ignores last two cols

                        if (!empty($percentages[$key])) {
                            if ($percentages[$key] >= 70)
                                $markString = $markString . " <span class=\"label label-success\">" . $percentages[$key] . "%</span>";
                            elseif ($percentages[$key] >= 60)
                                $markString = $markString . " <span class=\"label label-warning\">" . $percentages[$key] . "%</span>";
                            elseif ($percentages[$key] >= 50)
                                $markString = $markString . " <span class=\"label label-danger\">" . $percentages[$key] . "%</span>";
                            else
                                $markString = $markString . " <span class=\"label label-default\">" . $percentages[$key] . "%</span>";
                        }

                        $markString = $markString . "</td>";
                        echo $markString;
                    }
                    ?>
                </tr>
                <tr>
                    <th width="150px"><h4>Weightings</h4></th>
                    <?php foreach ($table->getWeightings() as $key => $weighting) {
                        $td = "<td>";
                        if (!empty($percWeight[$key]))
                            $td = $td . $weighting . " (<strong>" . $percWeight[$key] . "</strong>)";
                        $td = $td . "</td>";
                        echo $td;
                    }?>
                </tr>
            </table>
            <hr/>

            <pre id="csv">Deadline, Mark
                <?php
                $percentages = $table->getPercMark();
                $names = $table->getEmailNames();

                foreach($names as $key => $name)
                {
                    echo $name . "," . $percentages[$key] . ",";
                }
                ?>
            </pre>



            


        <?php
        }
    }
}?>