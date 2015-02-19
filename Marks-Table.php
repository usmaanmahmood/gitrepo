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
        <div id="containerT" class="col-md-9"></div>

    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.highcharts.com/highcharts.js"></script>
    <script src="//code.highcharts.com/modules/exporting.js"></script>
<script>
    $(function () {
        $('#containerT').highcharts({
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2]
            }]
        });
    });
</script>
<script>
    $(document).ready(function () {

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