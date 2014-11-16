
      </div>

    </div><!-- /.container -->


    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script>
$( document ).ready(function() {
    $("#submit").click(function () {
        var $command = $("#CommandList option:selected").text();
        var $databases = $("#DatabaseList").val();
        var $groups = $("#GroupList").val();
        var $students = $("#StudentList").val();
        var $modules = $("#ModuleList").val();

        // validation
        if ($command == null || $command == "") {
            $('#resultspane').fadeOut('fast');
            $('#resultspane').html("Please select a command.");
            $('#resultspane').fadeIn('fast');
            return;
        }

        // send through list of databases if none provided
        // TODO: replace by having Query->getDatabases get list from the profile object
        if ($databases == null || $databases == "") {
            $databases = [];
            var $DatabaseList = $("#DatabaseList");
            var i;
            for (i = 0; i < $DatabaseList.get(0).length; i++) {
                $databases.push($DatabaseList.get(0).options[i].text);
            }
        }

        var $submitbutton = $('#submit').button('loading');

        $('#resultspane').fadeOut('slow');

        $.ajax({
            url: 'runQuery.php',
            data: {
                "command": $command,
                "databases": $databases,
                "groups": $groups,
                "students": $students,
                "modules": $modules
            },
            type: 'get',
            success: function (result) {
                $('#resultspane').html(result);
                $('#resultspane').fadeIn('slow');
                $submitbutton.button('reset');
            }
        });
    });


    var $json;
    var $fullDatabaseList = [];
    var $fullGroupList = [];
    var $fullStudentUsernameList = [];
    var $fullStudentFullnameList = [];
    var $fullModuleList = [];

    $.getJSON('getFilterLists.php', function (json) {
        $json = json;

        $.each($json, function (key, value) {

            console.log($json[key][0]);
            $dbFound = ($.inArray($json[key][0]), $fullDatabaseList);
            console.log($dbFound);
            if ($dbFound < 0) // ie not found
            {
                $fullDatabaseList.push($json[key][0]);
//                console.log($dbFound, $json[key][0], $fullDatabaseList);
            }

            if (($.inArray($json[key][1]), $fullGroupList) == -1) $fullGroupList.push($json[key][1]);
            if (($.inArray($json[key][2]), $fullStudentUsernameList) == -1) $fullStudentUsernameList.push($json[key][2]);
            if (($.inArray($json[key][4]), $fullModuleList) == -1) $fullModuleList.push($json[key][4]);

            $json[key][5] = false; // set visibility to false
        });

//        console.dir($fullDatabaseList);

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
                if (($.inArray($json[key][0]), $wantedDatabases) == -1)
                    $wantedDatabases.push($json[key][0]);

                if (($.inArray($json[key][1]), $wantedGroups) == -1)
                    $wantedGroups.push($json[key][1]);

                if (($.inArray($json[key][2]), $wantedStudents) == -1)
                    $wantedStudents.push($json[key][2]);

                if (($.inArray($json[key][4]), $wantedModules) == -1)
                    $wantedModules.push($json[key][4]);


//                console.log($json[key][0], $wantedDatabases, $.inArray($json[key][0], $wantedDatabases));
//                console.log($json[key][1], $wantedGroups, $.inArray($json[key][1], $wantedGroups));
//                console.log($json[key][2], $wantedStudents, $.inArray($json[key][2], $wantedStudents));
//                console.log($json[key][4], $wantedModules, $.inArray($json[key][4], $wantedModules));

            }
        });
//        console.log($wantedDatabases);
//        console.log($wantedGroups);
//        console.log($wantedStudents);
//        console.log($wantedModules);
        // clean up the duplicates in the lists

        if ($selectedList != "databases")
            $("#DatabaseList option").each(function () {
                $positionOfOptionInWantedArray = $.inArray(this.value, $wantedDatabases);
                if ($positionOfOptionInWantedArray == -1) $(this).remove(); // this current option isnt in desired list, so delete it
            });

        if ($selectedList != "groups")
            $("#GroupList option").each(function () {
                $positionOfOptionInWantedArray = $.inArray(this.value, $wantedGroups);
                if ($positionOfOptionInWantedArray == -1) $(this).remove(); // this current option isnt in desired list, so delete it
            });

        if ($selectedList != "students")
            $("#StudentList option").each(function () {
                $positionOfOptionInWantedArray = $.inArray(this.value, $wantedStudents);
                if ($positionOfOptionInWantedArray == -1) $(this).remove(); // this current option isnt in desired list, so delete it
            });

        if ($selectedList != "modules") {
            // go through each option that is on the page, removed any that arent in the WANTED list
            $("#ModuleList option").each(function () {
                $positionOfOptionInWantedArray = $.inArray(this.value, $wantedModules);
                if ($positionOfOptionInWantedArray == -1) $(this).remove();
            });

            var $onScreenModuleList = [];


            // go through the WANTED list, add any that arent in in the select list already

            // first build list of whats on the screen
            $("#ModuleList option").each(function () {
                $onScreenModuleList.push($(this).val());
            });

            // now any wanted modules that arent on there, add em in
            $.each($wantedModules, function (key, value) {
                if ($.inArray(value, $onScreenModuleList) == -1)
                    $("#ModuleList").append($("<option></option>")
                        .attr("value", value)
                        .text(value));
            });
        }


    }


} // document ready

</script>
  </body>
</html>

