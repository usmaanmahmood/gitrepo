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

    $query->addDatabases(array("11-12-1", "11-12-1X"));
    $query->addModules(array("162L"));
    $result = $arcadeClient->execute($query);


    function objectToArray ($object) {
        if(!is_object($object) && !is_array($object))
            return $object;

        return array_map('objectToArray', (array) $object);
    }
//    $result = objectToArray($result);
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Marks Table</h1>
                <?php foreach ($result->getDatabaseList() as $database)
                {
                    echo "<h1>Database: " . $database->getDatabaseParsedName() . "</h1>";
                    foreach ($database->getTableList() as $table)
                    {
                        echo "<h2>Table: " . $table->getName() . "</h2>";

                        ?>
                        <table class="table table-striped table-hover table-bordered table-condensed">
                            <tr>
                                <td><strong>Weightings</strong></td>
                                <?php foreach ($table->getWeightings() as $weighting)
                                {
                                    echo "<td>" . $weighting . "</td>";
                                            }?>
                            </tr>
                            <tr>
                                <td><strong>Denominators</strong></td>
                                <?php foreach ($table->getDenominators() as $weighting)
                                {
                                    echo "<td>" . $weighting . "</td>";
                                            }?>
                            </tr>
                            <tr>
                                <td><strong>Names</strong></td>
                                <?php foreach ($table->getEmailNames() as $weighting)
                                {
                                    echo "<td>" . $weighting . "</td>";
                                            }?>
                            </tr>
                            <tr>
                                <td><strong>Marks</strong></td>
                                <?php foreach ($table->getMarks() as $weighting)
                                {
                                    echo "<td>" . $weighting . "</td>";
                                            }?>
                            </tr>
                        </table>


                        <?php
                    }
                }?>
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