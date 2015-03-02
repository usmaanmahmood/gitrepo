<?php include "template-head.php" ?>
    <title>Feedback | ARCADE</title>
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
            <div class="col-md-12">



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
                    });
            })
                .error(function (xhr, status, error) {
                    $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com</p>");
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                });


        // } document ready in template end

<?php include("template-end.php"); ?>