<?php include "template-head.php" ?>
<title>Attendance Summary | ARCADE</title>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    .green {
        width: 1em;
        height: 1em;
        background: lawngreen;
        border-right: 1px solid rgba(255, 255, 255, .5);
        margin-top: 2px;
    }
    .red {
        width: 1em;
        height: 1em;
        background: darkred;
        border-right: 1px solid rgba(255, 255, 255, .5);
        margin-top: 2px;
    }

    .orange {
        width: 1em;
        height: 1em;
        background: darkorange;
        border-right: 1px solid rgba(255, 255, 255, .5);
        margin-top: 2px;
    }
    .white {
        width: 1em;
        height: 1em;
        background: lightgrey;
        border-right: 1px solid rgba(255, 255, 255, .5);
        margin-top: 2px;
    }
</style>
</head>

<body>

<?php include("template-nav.php");?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php include("SearchBarDatabaseModule.php"); ?>
        </div>

        <div class="col-md-9">
            <h1>Attendance Summary</h1>
            <p class="lead">A pattern of attendance. A merge of course components selected.</p>
        <div id="result"></div>
        </div>


    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!--    <script src="//code.highcharts.com/highcharts.js"></script>-->
<!--    <script src="//code.highcharts.com/modules/exporting.js"></script>-->
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

            $.get("DisplayScripts/getAttendanceSummary.php", {"databases": $databases, "modules": $modules})
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