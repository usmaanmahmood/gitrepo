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
                <?php include("SearchBarDatabaseModule.php"); ?>
            </div>

            <div class="col-md-9">
                <h1>Marks Table</h1>

                <div>Key:
                    <span class="label label-default">0% - 49.9%</span>
                    <span class="label label-danger">50% - 59.9%</span>
                    <span class="label label-warning">60% - 69.9%</span>
                    <span class="label label-success">70% - 79.9%</span>
                    <span class="label label-success">80% - 100% <span class="glyphicon glyphicon-star"></span></span></span>
                </div>


                <div id="result"></div>


            </div>
        </div>
    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
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

                        $('#highcharts').highcharts({
                            data: {
                                csv: document.getElementById('csv').innerHTML
                            },
                            title: {
                                text: 'Graph of Results',
                                x: -20 //center
                            },
                            yAxis: {
                                title: {
                                    text: 'Percentage (%)'
                                },
                                min: 0,
                                max: 100
                            },
                            xAxis: {
                                title: {
                                    text: 'Deadlines'
                                }
                            },
                            tooltip: {
                                valueSuffix: '%',
                                crosshairs: true
                            },
                            plotOptions: {
                                series: {
                                    marker: {
                                        radius: 8
                                    },
                                    threshold: 60
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            legend: {
                                enabled: false
                            }
                        });

                    });
            })
                .error(function (xhr, status, error) {
                    $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com</p>");
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                });


        // } document ready in template end

<?php include("template-end.php"); ?>