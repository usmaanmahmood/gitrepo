
      </div>

    </div><!-- /.container -->


    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script>
    $( "#submit" ).click(function(){
        var $command = $("#CommandList option:selected").text();
        var $databases = $("#DatabaseList").val();
        var $groups = $("#GroupList").val();
        var $students = $("#StudentList").val();
        var $modules = $("#ModuleList").val();

        // validation
        if ($command == null || $command == "")
        {
            $('#resultspane').fadeOut('fast');
            $('#resultspane').html("Please select a command.");
            $('#resultspane').fadeIn('fast');
            return;
        }

        // send through list of databases if none provided
        // TODO: replace by having Query->getDatabases get list from the profile object
        if ($databases == null || $databases == "")
        {
            $databases = [];
            var $DatabaseList =  $("#DatabaseList");
            var i;
            for (i = 0; i < $DatabaseList.get(0).length; i++) {
                $databases.push($DatabaseList.get(0).options[i].text);
            }
        }

        var $submitbutton = $('#submit').button('loading');

        $('#resultspane').fadeOut('slow');

        $.ajax ({
            url: 'runQuery.php',
            data: { "command": $command,
                    "databases": $databases,
                    "groups": $groups,
                    "students": $students,
                    "modules": $modules
            },
            type: 'get',
            success: function(result)
            {
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

    $.getJSON ('getFilterLists.php', function (json) {
        $json = json;

        $.each( $json, function( key, value ) {
            $fullDatabaseList.push($json[key][0]);
            $fullGroupList.push($json[key][1]);
            $fullStudentUsernameList.push($json[key][2]);
            $fullStudentFullnameList.push($json[key][3]);
            $fullModuleList.push($json[key][4]);

            $json[key][5] = false;
        });
    });

    $(".reset-filters").click(function() {
        $.each( $json, function( key, value ) {
            $json[key][5] = true;
        });
        reloadLists();
        $.each( $json, function( key, value ) {
            $json[key][5] = false;
        });
    });

    $("#DatabaseList").click(function() {
        hideShowFilters("databases");
    });

    $("#GroupList").click(function() {
        hideShowFilters("groups");
    });

    $("#StudentList").click(function() {
        hideShowFilters("students");
    });

    $("#ModuleList").click(function() {
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
        $.each($json, function( key, value ) {
            if (    ($.inArray($json[key][0], $selectedDatabases) != -1) // if the current filter DB is in the selected DB list then ok
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

        // dont empty it, if it is the list we clicked
        if ($selectedList != "databases") $databaseList.empty();
        if ($selectedList != "groups") $groupList.empty();
        if ($selectedList != "students") $studentList.empty();
//        if ($selectedList != "modules") $moduleList.empty();

        $wantedModules = [];

        // refill the lists
        $.each($json, function(key, value) {
            if ($json[key][5] == true)
            {
                if ($selectedList != "databases")  $databaseList.append("<option value=\"" + $json[key][0] + "\">" + $json[key][0] + "</option>");
                if ($selectedList != "groups") $groupList.append("<option value=\"" + $json[key][1] + "\">" + $json[key][1] + "</option>");
                if ($selectedList != "students") $studentList.append("<option value=\"" + $json[key][2] + "\">" + $json[key][2] + "</option>");
//                if ($selectedList != "modules") $moduleList.append("<option value=\"" + $json[key][4] + "\">" + $json[key][4] + "</option>");

                $wantedModules.push($json[key][4]);
            }
        });

        // clean up the duplicates in the lists
        var found = [];
        $("#DatabaseList option").each(function() {
            if($.inArray(this.value, found) != -1) $(this).remove();
            found.push(this.value);
        });
        found = [];
        $("#GroupList option").each(function() {
            if($.inArray(this.value, found) != -1) $(this).remove();
            found.push(this.value);
        });
        found = [];
        $("#StudentList option").each(function() {
            if($.inArray(this.value, found) != -1) $(this).remove();
            found.push(this.value);
        });
        found = [];

        $("#ModuleList option").each(function() {
            $positionOfOptionInWantedArray = $.inArray(this.value, $wantedModules);

            if($positionOfOptionInWantedArray == -1) // this current option isnt in desired list, so delete it
                $(this).remove();
            else    // this current option is in the  desired list, so leave it ALONE OK.
            {
//                if($.inArray($wantedModules[$positionOfOptionInWantedArray], $("#ModuleList option")) == -1) // if it isnt in there, we gotta add it
//                    $moduleList.append("<option value=\"" + $wantedModules[$positionOfOptionInWantedArray] + "\">" + $wantedModules[$positionOfOptionInWantedArray] + "</option>");

//                console.log($wantedModules[$positionOfOptionInWantedArray], $("#ModuleList option"), $.inArray($wantedModules[$positionOfOptionInWantedArray], $("#ModuleList option")))
            }

        });
        found = [];




    }




</script>
  </body>
</html>

