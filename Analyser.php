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

$applicableModuleList = array();

foreach($twoDArray as $oneDArray)
{
    if ($oneDArray[0] == "12-13-2")
    {
//        echo $oneDArray[4] . "<br/>";
        array_push($applicableModuleList, $oneDArray[4]);
    }
}

$result = $analyserParser->parse("12-13-2", $applicableModuleList);

$moduleList = $result->getModuleList();

?>

    <!-- Page Content -->
    <div class="container">
        <h1>Analyser <small>Warning: can take an extended period of time (up to 3 minutes) to analyse your data.</small></h1>
        <p>Where values are missing, it means they are not stored on the ARCADE server.</p>

        <div class="row">
            <div class="col-md-3">
                <?php include("SearchBarDatabaseModule.php"); ?>
            </div>

            <div class="col-md-9">
                <div id="result">

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
                            echo "<td>" . $module->getAttendancePercentage() . "</td>";
                            echo "<td>" . $module->getTotalMark() . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                </div>


            </div>
        </div>





    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {

    $("#ModuleList option").hide();


    // for this page
    $("#modulessearchsection").hide() // hide module search for this
    $("#listitemthree").hide() // hide module search for this
    $("#listitemtwo").html("2. Choose your search!"); // hide module search for this
        // } document ready in template end

<?php include("template-end.php"); ?>