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

    $arcadeClient = new ARCADEClient();
    $query = new Query("marks-table: all", 0); // command, plainTextWanted

    $query->addDatabases($arcadeProfile->getDatabaseList());
    $moduleList = array("162L");
    $query->addModules($moduleList);
    $result = $arcadeClient->execute($query);

//    $databaseList = $result->getDatabaseList();

    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Registration Details</h1>
                <pre><?=var_dump($result) ?></pre>
            </div>
        </div>
    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {


        }) // document ready

    </script>

    </body>
    </html>