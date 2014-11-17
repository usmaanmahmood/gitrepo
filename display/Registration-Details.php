<?php include "../template-head.php" ?>
<title>Registration Details | ARCADE</title>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
</style>
</head>

<body>

<?php include("../template-nav.php");

$arcadeClient = new ARCADEClient();
$query = new Query("registration-details", 0); // command, plainTextWanted

$query->addDatabases($arcadeProfile->getDatabaseList());
$result = $arcadeClient->execute($query);

$databaseList = $result->getDatabaseList();

/*
    for each database
        display db name
        display number of matching students
        for each student
            display details
    */

?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1>Registration Details</h1>


            <div class="table-responsive">
                <?php
                foreach ($databaseList as $database) {
                    ?>
                    <h3>Database: <?php echo $database->getDatabaseName(); ?></h3>
                <?php
                }
                ?>
            </div>


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