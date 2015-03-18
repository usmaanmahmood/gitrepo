<?php include "template-head.php" ?>
    <title>Home | ARCADE</title>
    <style>
        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    </head>

<body>

<?php include("template-nav.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Classic ARCADE <small>A complete replica of the JAVA ARCADE Client!</small></h1>

                <div class="row">
                    <div class="col-md-4">
                        <p class="text-center">Command</p>
                        <select class="form-control" size=10 id="CommandList">
                            <?php foreach ($arcadeProfile->getCommandList() as $command) { ?>
                                <option><?php echo $command ?></option>
                            <?php } ?>
                        </select>

                        <div class="col-md-12">
                            <br />
                            <div class=\"alert alert-danger\ role=\"alert\" id="queryWarning"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-3">
                            <p class="text-center">Databases
                                <button type="button" class="btn btn-default btn-xs reset-filters pull-right">Reset</button>
                            </p>
                            <select multiple class="form-control" size=10 id="DatabaseList">
                                <?php foreach (array_unique($arcadeProfile->getDatabaseList()) as $option) { ?>
                                    <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <p class="text-center">Groups
                                <button type="button" class="btn btn-default btn-xs reset-filters pull-right">Reset</button>
                            </p>
                            <select multiple class="form-control" size=10 id="GroupList">
                                <?php foreach (array_unique($arcadeProfile->getGroupList()) as $option) { ?>
                                    <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <p class="text-center">Students
                                <button type="button" class="btn btn-default btn-xs reset-filters pull-right">Reset</button>
                            </p>
                            <select multiple class="form-control" size=10 id="StudentList">
                                <?php foreach (array_unique($arcadeProfile->getStudentUsernameList()) as $option) { ?>
                                    <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <p class="text-center">Modules
                                <button type="button" class="btn btn-default btn-xs reset-filters pull-right">Reset</button>
                            </p>
                            <select multiple class="form-control" size=10 id="ModuleList">
                                <?php foreach (array_unique($arcadeProfile->getModuleList()) as $option) { ?>
                                    <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <br />
                            <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Searching..."
                                    id="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <pre id="resultspane"></pre>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {


<?php include("template-end.php"); ?>