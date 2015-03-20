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

$result = $analyserParser->parse("12-13-2", array("21111E", "22712L"));

var_dump($result);




?>

    <!-- Page Content -->
    <div class="container">


    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {


        // } document ready in template end

<?php include("template-end.php"); ?>