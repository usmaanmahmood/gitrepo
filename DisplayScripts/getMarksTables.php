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


    <h1>Marks Table</h1>
<?php foreach ($result->getDatabaseList() as $database) {
    if (!empty($database->getTableList())) {
        echo "<h3>" . $database->getDatabaseParsedName() . "</h3>";
        foreach ($database->getTableList() as $table) {
            echo "<h3>Table: " . $table->getName() . "</h3lattfields park>";
            echo "<h5>" . $table->getScalingFactor() . "</h5>";
            ?>
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr>
                    <th width="150px"><h4>Name</h4></th>
                    <?php foreach ($table->getEmailNames() as $weighting) {
                        echo "<th><h4>" . $weighting . "</h4></th>";
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

                        if (!empty($percentages[$key]))
                        $markString = $markString . " (<strong>" . $percentages[$key] . "</strong>)";

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
                        $td = $td ."</td>";
                        echo $td;
                    }?>
                </tr>
<!--                <tr>-->
<!--                    <th width="150px">Deadline &percnt; of Coursework</th>-->
<!--                    --><?php //foreach ($table->getPercWeight() as $percentage) {
//                        echo "<td>" . $percentage . "</td>";
//                    }?>
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th width="150px">&percnt; of Coursework</th>-->
<!--                    --><?php //foreach ($table->getPercScore() as $percentage) {
//                        echo "<td>" . $percentage . "</td>";
//                    }?>
<!--                </tr>-->
            </table>
            <hr />
<!-----------------------------------------------new table----------------------------------------------->
<!--            <table class="table table-striped table-hover table-bordered table-condensed">-->
<!--                <tr>-->
<!--                    <th>Name</th>-->
<!--                    <th>Mark</th>-->
<!--                    <th>Weightings</th>-->
<!--                    <th>Deadline &percnt; of Coursework</th>-->
<!--                    <th>Your &percnt; of Coursework</th>-->
<!--                </tr>-->
<!--                --><?php
//                $names = $table->getEmailNames();
//                $weightings = $table->getMarks();
//                $denominators = $table->getDenominators();
//                $percentageMarks = $table->getPercMark();
//                $percentageWeights = $table->getPercWeight();
//                $percentageScores = $table->getPercScore();
//
//
//                foreach ($weightings as $key => $weighting) {
//                    echo "<tr>";
                    //////////////////////////////////
//                    echo "<th>" . $names[$key] . "</th>";
                    //////////////////////////////////
//                    $markString = "<td>" . $weighting;
//                    if (is_numeric($denominators[$key]))
//                        $markString = $markString . "/" . $denominators[$key]; // ignores last two cols
//
//                    if (!empty($percentages[$key]))
//                        $markString = $markString . " | " . $percentages[$key];
//
//                    $markString = $markString . "</td>";
//                    echo $markString;
                    //////////////////////////////////
//                    echo "<td>" . $percentageMarks[$key] . "</td>";
                    //////////////////////////////////
//                    echo "<td>" . $percentageWeights[$key] . "</td>";
                    //////////////////////////////////
//                    echo "<td>" . $percentageScores[$key] . "</td>";
                    //////////////////////////////////
//                    echo "</tr>";
//                }
//                ?>
<!---->
<!--            </table>-->
        <?php
        }
    }
}?>
<script type="javascript">
    $(function () {
        $('#container').highcharts({
            title: {
                text: 'Marks Table',
                x: -20 //center
            },
            subtitle: {
                text: 'Subtitle',
                x: -20
            },
            xAxis: {
                categories: ['14D', '16D', 'Ex7D', 'Ex9D']
            },
            yAxis: {
                title: {
                    text: 'Marks Percentage (%)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '%'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Score',
                data: [65,55,70,70]
            }]
        });
    });</script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
