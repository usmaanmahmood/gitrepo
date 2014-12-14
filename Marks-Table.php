<?php include "template-head.php" ?>
<title>Marks Table | ARCADE</title>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
</style>
</head>

<body>

<?php include("template-nav.php");

//$arcadeClient = new ARCADEClient();
//$query = new Query("marks-table: all", 0); // command, plainTextWanted
//
//$query->addDatabases(array("11-12-1", "11-12-1X"));
//$query->addModules(array("162L"));
//$result = $arcadeClient->execute($query);
//
//
//function objectToArray($object)
//{
//    if (!is_object($object) && !is_array($object))
//        return $object;
//
//    return array_map('objectToArray', (array)$object);
//}

//    $result = objectToArray($result);
?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-3">
                <div class="col-md-12">
                    <span class="text-center" style="font-size:30px;">Modules
                        <button type="button" class="btn btn-default btn-xs reset-filters btn-block">Reset</button>
                    </span>
                    <select multiple class="form-control" size=20 id="ModuleList">
                        <?php $moduleList = array_unique($arcadeProfile->getModuleList());
                            asort($moduleList);

                        foreach ($moduleList as $option) { ?>
                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..."
                            id="submit">Execute Query
                    </button>
                </div>
            </div>

            <div id="result" class="col-md-9">
            </div><!-- result -->
            <div id="chart_div" style="width:400; height:300"></div>
        </div>
    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {


        $("#submit").click(function () {
            var $modules = $("#ModuleList").val();

            var $submitbutton = $('#submit').button('loading');

            var $resultDiv = $('#result');
            $resultDiv.fadeOut('slow');

            $.get("DisplayScripts/getMarksTables.php", { "modules": $modules } )
                .done(function (result) {
                    $resultDiv.html(result);
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                })
                .error(function (xhr, status, error) {
                    $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com.</p>");
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                });

        });

    }) // document ready

</script>

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Deadline');
        data.addColumn('number', 'Percentage');
        data.addRows([
            ['1.1D', 75],
            ['1.2D', 60],
            ['2D', 100],
            ['3D', 95],
            ['4D', 80]
        ]);

        // Set chart options
        var options = {
            width: 1000,
            height: 563,
            hAxis: {
                title: 'Percentage'

            },
            vAxis: {
                title: 'Deadline',
                minValue: 0
            }};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

</body>
</html>