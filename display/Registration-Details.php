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
                    <h3>Database: <?= $database->getDatabaseName(); ?></h3>
                    <?php foreach ($database->getStudentList() as $student) {
                        ?>
                        <table class="table table-striped  table-hover">
                            <tr>
                                <th>Attribute</th>
                                <th>Value</th>
                            </tr>
                            <tr>
                                <td>Student ID</td>
                                <td><?= $student->getStudentID(); ?></td>
                            </tr>
                            <tr>
                                <td>Reg. Status</td>
                                <td><?= $student->getRegStatus(); ?></td>
                            </tr>
                            <tr>
                                <td>Reg number</td>
                                <td><?= $student->getRegNumber(); ?></td>
                            </tr>
                            <tr>
                                <td>Degree</td>
                                <td><?= $student->getDegree(); ?></td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td><?= $student->getYear(); ?></td>
                            </tr>
                            <tr>
                                <td>Owner</td>
                                <td><?= $student->getOwner(); ?></td>
                            </tr>
                            <tr>
                                <td>Lab Group</td>
                                <td><?= $student->getRegStatus(); ?></td>
                            </tr>
                            <tr>
                                <td>Tutorial Group</td>
                                <td><?= $student->getTutorialGroup(); ?></td>
                            </tr>
                            <tr>
                                <td>Tutor</td>
                                <td><?= $student->getTutor(); ?></td>
                            </tr>
                            <tr>
                                <td>Preferred Name</td>
                                <td><?= $student->getPreferredName(); ?></td>
                            </tr>
                            <tr>
                                <td>DB Surname</td>
                                <td><?= $student->getDbSurname(); ?></td>
                            </tr>
                            <tr>
                                <td>DB First names</td>
                                <td><?= $student->getDbFirstNames(); ?></td>
                            </tr>
                            <tr>
                                <td>Email name:</td>
                                <td><?= $student->getEmailName(); ?></td>
                            </tr>
                            <tr>
                                <td>Modules</td>
                                <td><?= implode(", ", $student->getModules()); ?></td>
                            </tr>

                        </table>
                    <?php
                    }
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