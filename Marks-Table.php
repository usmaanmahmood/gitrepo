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
?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-3">

            <button type="button" class="btn btn-default btn-block dat-reset-filters">Reset Databases</button>

            <select class="form-control" size=4 id="DatabaseList">
                <?php foreach (array_unique($arcadeProfile->getDatabaseList()) as $option) { ?>
                    <option value="<?php echo $option ?>">
                        <?php preg_match("/(\d+)-(\d+)-(\d)(.*)/", $option, $matches);
                        $databaseParsedName = ("Year " . $matches[3] . " - " . ($matches[4] == "X" ? ("Overall (inc. Exams)") : "Coursework Only"));
                        echo $databaseParsedName; ?></option>
                <?php } ?>
            </select>
            <br/>
            <button type="button" class="btn btn-default btn-block mod-reset-filters">Reset Modules</button>


            <select multiple class="form-control" size=15 id="ModuleList">
                <?php $twoDArray = $arcadeProfile->getTwoDimensionalArray();
                foreach ($twoDArray as $filter) {
                    ?>
                    <option value="<?php echo $filter[4] ?>" data-db="<?= $filter[0] ?>">
                        <?php
                        $matched = preg_match("/(\d{3,5})(\S)$/", $filter[4], $matches);

                        if ($matched) {
                            switch ($matches[2]) {
                                case "L":
                                    $matches[2] = " Labs";
                                    break;
                                case "C":
                                    $matches[2] = " Coursework";
                                    break;
                                case "E":
                                    $matches[2] = " Examples-Classes";
                                    break;
                                case "W":
                                    $matches[2] = " Workshops";
                                    break;
                                case "X":
                                    $matches[2] = " Exams";
                                    break;
                            }
                        };

                        if ($matched)
                            echo $matches[1] . $matches[2];
                        else
                            echo $filter[4];
                        ?></option>
                <?php } ?>
            </select>
            <br/>
            <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..."
                    id="submit">Execute!
            </button>
        </div>

        <div id="result" class="col-md-9"></div>
        <div id="chart_div"></div>

    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    $(document).ready(function () {



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
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 3],
                ['Onions', 1],
                ['Olives', 1],
                ['Zucchini', 1],
                ['Pepperoni', 2]
            ]);

            // Set chart options
            var options = {'title':'How Much Pizza I Ate Last Night',
                'width':400,
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }





        // hide them all to start with
        $("#ModuleList option").hide();

        $("#DatabaseList").change(function () {
            $("#ModuleList option").hide();
            $("#ModuleList option[data-db=" + this.value + "]").show();
        });

//

        $(".dat-reset-filters").click(function () {
            $("#DatabaseList option:selected").removeAttr("selected");
        });

        $(".mod-reset-filters").click(function () {
            $("#ModuleList option:selected").removeAttr("selected");
        });


        $("#submit").click(function () {
            var $modules = $("#ModuleList").val();
            var $databases = [];
            $databases.push($("#DatabaseList").val());

            console.log($databases);
            console.log($modules);

            var $submitbutton = $('#submit').button('loading');

            var $resultDiv = $('#result');
            $resultDiv.fadeOut('slow');

            $.get("DisplayScripts/getMarksTables.php", {"databases": $databases, "modules": $modules})
                .done(function (result) {
                    $resultDiv.html(result);
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                })
                .error(function (xhr, status, error) {
                    $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com</p>");
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                });

        });
        // } document ready in template end

<?php include("template-end.php"); ?>