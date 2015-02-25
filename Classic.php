<?php include "template-head.php" ?>
<title>Classic | ARCADE</title>
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
            <h1>Classic ARCADE</h1>

            <p class="lead">A complete replica of the JAVA ARCADE Client!</p>

            <div class="row">
                <div class="col-md-4">
                    <p>Command</p>
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
                        <p>Databases &nbsp; | &nbsp;
                            <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button>
                        </p>
                        <select multiple class="form-control" size=10 id="DatabaseList">
                            <?php foreach (array_unique($arcadeProfile->getDatabaseList()) as $option) { ?>
                                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Groups &nbsp; | &nbsp;
                            <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button>
                        </p>
                        <select multiple class="form-control" size=10 id="GroupList">
                            <?php foreach (array_unique($arcadeProfile->getGroupList()) as $option) { ?>
                                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Students &nbsp; | &nbsp;
                            <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button>
                        </p>
                        <select multiple class="form-control" size=10 id="StudentList">
                            <?php foreach (array_unique($arcadeProfile->getStudentUsernameList()) as $option) { ?>
                                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Modules &nbsp; | &nbsp;
                            <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button>
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
                                id="submit"><span class="glyphicon glyphicon-search"></span> Search
                        </button>
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
    $('#resultspane').hide();


    $("#submit").click(function () {
        var $command = $("#CommandList option:selected").text();
        var $databases = $("#DatabaseList").val();
        if ($databases == null)
        {
            $("#DatabaseList option").prop("selected", true);
        }

        var $groups = $("#GroupList").val();
        var $students = $("#StudentList").val();
        var $modules = $("#ModuleList").val();

        // validation
        if ($command == null || $command == "") {

            if ($('#queryWarning').html() != "") {
                $('#queryWarning').fadeOut('slow');
                $('#queryWarning').fadeIn('slow');
            }
            else
                $('#queryWarning').html("<div class=\"alert alert-danger\" role=\"alert\">Please select a command.</div>");
            return;
        }
        else
            $('#queryWarning').hide();

        var $submitbutton = $('#submit').button('loading');

        $('#resultspane').fadeOut('slow');

        $.ajax({
            url: 'runQuery.php',
            data: {
                "command": $command,
                "databases": $databases,
                "groups": $groups,
                "students": $students,
                "modules": $modules,
                "plainResult": 1
            },
            type: 'get',
            success: function (result) {
                $('#resultspane').html(result);
                $('#resultspane').fadeIn('slow');
                $submitbutton.button('reset');
            }
        });
    });

    ///////////////////////////////////////////////////////////////////////////

    var $json;
    var $fullDatabaseList = [];
    var $fullGroupList = [];
    var $fullStudentUsernameList = [];
    var $fullModuleList = [];

    $.getJSON('DisplayScripts/getFilterLists.php', function (json) {
        $json = json;

        $.each($json, function (key, value) {
            // unique lists
            if ($.inArray($json[key][0], $fullDatabaseList) == -1) $fullDatabaseList.push($json[key][0]);
            if ($.inArray($json[key][1], $fullGroupList) == -1) $fullGroupList.push($json[key][1]);
            if ($.inArray($json[key][2], $fullStudentUsernameList) == -1) $fullStudentUsernameList.push($json[key][2]);
            if ($.inArray($json[key][4], $fullModuleList) == -1) $fullModuleList.push($json[key][4]);

            $json[key][5] = false; // set visibility to false
        });
    });

    $(".reset-filters").click(function () {
        $.each($json, function (key, value) {
            $json[key][5] = true;
        });
        reloadLists();
        $.each($json, function (key, value) {
            $json[key][5] = false;
        });
    });

    $("#DatabaseList").click(function () {
        hideShowFilters("databases");
    });
    $("#GroupList").click(function () {
        hideShowFilters("groups");
    });
    $("#StudentList").click(function () {
        hideShowFilters("students");
    });
    $("#ModuleList").click(function () {
        hideShowFilters("modules");
    });


    function hideShowFilters($selectedList) {
        var $databaseList = $("#DatabaseList");
        var $groupList = $("#GroupList");
        var $studentList = $("#StudentList");
        var $moduleList = $("#ModuleList");

        // if nothing is selected, deem them all to be selected
        var $selectedDatabases = ($databaseList.val() == null ? $fullDatabaseList : $databaseList.val());
        var $selectedGroups = ($groupList.val() == null ? $fullGroupList : $groupList.val());
        var $selectedStudents = ($studentList.val() == null ? $fullStudentUsernameList : $studentList.val());
        var $selectedModules = ($moduleList.val() == null ? $fullModuleList : $moduleList.val());

        // add them if satisfy needs
        $.each($json, function (key, value) {
            if (($.inArray($json[key][0], $selectedDatabases) != -1) // if the current filter DB is in the selected DB list then ok
                && ($.inArray($json[key][1], $selectedGroups) != -1) // if the current filter group is in the selected DB list then ok
                && ($.inArray($json[key][2], $selectedStudents) != -1) // if the current filter studentusername is in the selected DB list then ok
                && ($.inArray($json[key][4], $selectedModules) != -1)) // if the current filter module is in the selected DB list then ok)
            {
                $json[key][5] = true; // display this one
            }
            else
                $json[key][5] = false; // if they dont, make em false
        });

        reloadLists($selectedList);
    }

    // reload the lists with data in the arrays
    function reloadLists($selectedList) {
        var $databaseList = $("#DatabaseList");
        var $groupList = $("#GroupList");
        var $studentList = $("#StudentList");
        var $moduleList = $("#ModuleList");


        var $wantedDatabases = [];
        var $wantedGroups = [];
        var $wantedStudents = [];
        var $wantedModules = [];

        // refill the lists
        $.each($json, function (key, value) {
            if ($json[key][5] == true) {
                // add every desired display item to their lists
                if ($.inArray($json[key][0], $wantedDatabases) == -1) $wantedDatabases.push($json[key][0]);
                if ($.inArray($json[key][1], $wantedGroups) == -1) $wantedGroups.push($json[key][1]);
                if ($.inArray($json[key][2], $wantedStudents) == -1) $wantedStudents.push($json[key][2]);
                if ($.inArray($json[key][4], $wantedModules) == -1) $wantedModules.push($json[key][4]);
            }
        });


        // clear and repopulate the list boxes

        if ($selectedList != "databases") {
            $databaseList.empty();
            // add everything from wanted list
            $.each($wantedDatabases, function (key, value) {
                $databaseList.append($("<option></option>")
                    .attr("value", value)
                    .text(value));
            });
            $databaseList.scrollTop(0);
        }

        if ($selectedList != "groups") {
            $groupList.empty();
            // add everything from wanted list
            $.each($wantedGroups, function (key, value) {
                $groupList.append($("<option></option>")
                    .attr("value", value)
                    .text(value));
            });
            $groupList.scrollTop(0);
        }

        if ($selectedList != "students") {
            $studentList.empty();
            // add everything from wanted list
            $.each($wantedStudents, function (key, value) {
                $studentList.append($("<option></option>")
                    .attr("value", value)
                    .text(value));
            });
            $studentList.scrollTop(0);
        }

        if ($selectedList != "modules") {
            $moduleList.empty();
            // add everything from wanted list
            $.each($wantedModules, function (key, value) {
                $("#ModuleList").append($("<option></option>")
                    .attr("value", value)
                    .text(value));
            });
            $moduleList.scrollTop(0);
        }

    }

// } document ready in template end

<?php include("template-end.php"); ?>