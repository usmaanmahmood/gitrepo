<?php include "template-head.php" ?>
    <title>Home | ARCADE</title>
    <style>
        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
        h2, p {
            text-align: center;
        }
    </style>
    </head>

<body>

<?php include("template-nav.php"); ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-heart"></span> Classic ARCADE</h2>
                <p>A web replica of the existing JAVA GUI.</p>
                <p><a class="btn btn-default btn-block" href="Classic.php" role="button">Go &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-stats"></span> Attendance Summary</h2>
                <p>A rough pattern of your attendance summary.</p>
                <p><a class="btn btn-default btn-block" href="Attendance-Summary.php" role="button">Go &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-calendar"></span> Timetable</h2>
                <p>Check your University timetable online.</p>
                <p><a class="btn btn-default btn-block" href="Timetable.php" role="button">Go &raquo;</a></p>
            </div>
        </div>
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-th-list"></span> Marks Tables</h2>
                <p>View/print your marks across modules. Includes tables and graphs!</p>
                <p><a class="btn btn-default btn-block" href="Marks-Table.php" role="button">Go &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-list-alt"></span> Full Story</h2>
                <p>Includes specific attendance details, deadlines, marks. The whole lot.</p>
                <p><a class="btn btn-default btn-block" href="FullStory.php" role="button">Go &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-education"></span> Registration Details</h2>
                <p>All of the data ARCADE stores about you,<br />in one place.</p>
                <p><a class="btn btn-default btn-block" href="Registration-Details.php" role="button">Go &raquo;</a></p>
            </div>
        </div>
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-question-sign"></span> Expected</h2>
                <p>A list of what is expected from you.</p>
                <p><a class="btn btn-default btn-block" href="Expected.php" role="button">Go &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-info-sign"></span> Excuses</h2>
                <p>A list of your excuses.</p>
                <p><a class="btn btn-default btn-block" href="Excuses.php" role="button">Go &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><span class="glyphicon glyphicon-flag"></span> Irregularities</h2>
                <p>A list of your irregularities.</p>
                <p><a class="btn btn-default btn-block" href="Irregularities.php" role="button">Go &raquo;</a></p>
            </div>
        </div>
    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {


<?php include("template-end.php"); ?>