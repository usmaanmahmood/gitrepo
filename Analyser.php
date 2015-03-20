<?php include "template-head.php" ?>
    <title>Registration Details | ARCADE</title>
    <style>
        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    </head>

<body>

<?php include("template-nav.php");


$analyserParser = new AnalyserParser();

$twoDArray = $arcadeProfile->getTwoDimensionalArray();
//var_dump($twoDArray);


foreach($twoDArray as $oneDArray)
{
    if ($oneDArray[0] == "12-13-2")
    {
        echo $oneDArray[2];
    }
}

//$result = $analyserParser->parse("12-13-2", array("21111E", "22712L"));

$moduleList = $result->getModuleList();

?>

    <!-- Page Content -->
    <div class="container">
        <table class="table table-striped table-hover table-bordered table-condensed">
            <tr>
                <th><h4>Module</h4></th>
                <th><h4>Attendance %</h4></th>
                <th><h4>Total Mark</h4></th>
            </tr>
            <?php
            foreach($moduleList as $module)
            {
                continue;
                echo "<tr>";
                echo "<td>" . $module->getModuleId() . "</td>";
                echo "<td>" . $module->getAttendancePercentage() . "</td>";
                echo "<td>" . $module->getTotalMark() . "</td>";
                echo "</tr>";
            }
            ?>
        </table>


    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {


        // } document ready in template end

<?php include("template-end.php"); ?>