<?php include "../template-head.php" ?>
<title>ARCADE</title>
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

$result = implode(" ", $arcadeProfile->getDatabaseList());
//$query->addDatabases(implode(" ", $arcadeProfile->getDatabaseList()));
//$result = $arcadeClient->execute($query);

//$result = json_encode($result);

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
                <table class="table">
                    <?php echo var_dump($result); ?>
                </table>
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