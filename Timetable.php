<?php include "template-head.php" ?>
<title>Timetable | ARCADE</title>
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
            <button type="button" class="btn btn-default btn-block" data-loading-text="Searching..."
                    id="submitButton1" data-search="remaining"><span class="glyphicon glyphicon-search"></span> Remaining Timetable
            </button>
            <button type="button" class="btn btn-default btn-block" data-loading-text="Searching..."
                    id="submitButton2" data-search="full"><span class="glyphicon glyphicon-search"></span> Full Timetable
            </button>
            <button type="button" class="btn btn-default btn-block" data-loading-text="Searching..."
                    id="submitButton3" data-search="with extensions"><span class="glyphicon glyphicon-search"></span> Full Timetable plus Extensions
            </button>
        </div>

        <div class="col-md-9">
            <h1>Timetable</h1>
            <div id="result"></div>
        </div>
    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    $(document).ready(function () {

        // hide them all to start with
        $("#ModuleList option").hide();

        $("#DatabaseList").change(function () {
            $("#ModuleList option").hide();
            $("#ModuleList option[data-db=" + this.value + "]").show();
        });

        $(".dat-reset-filters").click(function () {
            $("#DatabaseList option:selected").removeAttr("selected");
        });

        $(".mod-reset-filters").click(function () {
            $("#ModuleList option:selected").removeAttr("selected");
        });

        $("#submit").hide(); // hide original button

        // for this page
        $("#modulessearchsection").hide() // hide module search for this
        $("#listitemthree").hide() // hide module search for this
        $("#listitemtwo").html("2. Choose your search!"); // hide module search for this

        $("#submitButton1").click(function () {
            var $modules = $("#ModuleList").val();
            var $databases = [];
            $databases.push($("#DatabaseList").val());

            console.log($databases);
            console.log($modules);

            var $submitbutton = $(this).button('loading');

            var $resultDiv = $('#result');
            $resultDiv.fadeOut('slow');

            var $search = $(this).data("search");

            $.get("DisplayScripts/getTimetable.php", {"databases": $databases, "modules": $modules, "search": $search})
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

        $("#submitButton2").click(function () {
            var $modules = $("#ModuleList").val();
            var $databases = [];
            $databases.push($("#DatabaseList").val());

            console.log($databases);
            console.log($modules);

            var $submitbutton = $(this).button('loading');

            var $resultDiv = $('#result');
            $resultDiv.fadeOut('slow');

            var $search = $(this).data("search");

            $.get("DisplayScripts/getTimetable.php", {"databases": $databases, "modules": $modules, "search": $search})
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

        $("#submitButton3").click(function () {
            var $modules = $("#ModuleList").val();
            var $databases = [];
            $databases.push($("#DatabaseList").val());

            console.log($databases);
            console.log($modules);

            var $submitbutton = $(this).button('loading');

            var $resultDiv = $('#result');
            $resultDiv.fadeOut('slow');

            var $search = $(this).data("search");

            $.get("DisplayScripts/getTimetable.php", {"databases": $databases, "modules": $modules, "search": $search})
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