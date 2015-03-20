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

        $.get("DisplayScripts/getAnalysis.php", {"databases": $databases, "modules": $modules})
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