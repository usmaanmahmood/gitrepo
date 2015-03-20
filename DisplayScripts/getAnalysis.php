<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 03/12/14
 * Time: 08:54
 */

include("../config.php");

$analyserParser = new AnalyserParser();

$twoDArray = $arcadeProfile->getTwoDimensionalArray();

$applicableModuleList = array();

foreach($twoDArray as $oneDArray)
{
    if ($oneDArray[0] == $_GET["databases"])
    {
//        echo $oneDArray[4] . "<br/>";
        array_push($applicableModuleList, $oneDArray[4]);
    }
}

$result = $analyserParser->parse($_GET["databases"], $applicableModuleList);

$moduleList = $result->getModuleList();

?>
    <table class="table table-striped table-hover table-bordered table-condensed">
        <tr>
            <th><h4>Module</h4></th>
            <th><h4>Attendance %</h4></th>
            <th><h4>Total Mark</h4></th>
        </tr>
        <?php
        foreach($moduleList as $module)
        {
//                continue;
            echo "<tr>";
            echo "<td>" . $module->getModuleId() . "</td>";
            echo "<td>" . $module->getTotalMark() . "</td>";
            echo "<td>" . $module->getAttendancePercentage() . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
