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

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                               aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

            </div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php
                foreach ($databaseList as $database) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true"
                                   aria-controls="collapseOne">
                                    <?= $database->getDatabaseParsedName() . " (" . $database->getDatabaseName() . ")"; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
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
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
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