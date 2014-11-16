
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
    });

    $("#DatabaseList").click(function() {
        hideShowFilters();
    });

    $("#GroupList").click(function() {
        hideShowFilters();
    });

    $("#StudentList").click(function() {
        hideShowFilters();
    });

    $("#ModuleList").click(function() {
        hideShowFilters();
    });

    // load each list with unique_array(databases) where show = true
    function reloadModuleList() {
        /*
        var $moduleList = $("#ModuleList");
        var $databaseList = $("#DatabaseList");
        var $selectedDatabases = $databaseList.val();
        var $outputModulesList = [];

        // if at least one db has been selected
        if ($selectedDatabases)
        {
            $.each($json, function( key, value ) {
                if ($.inArray($json[key][0], $selectedDatabases) != -1) // if the current db is part of the selected list
                {
                    $outputModulesList.push($json[key][4]); // add the module
                }
            });
        }
        else
        {
            $outputModulesList = $fullModuleList;
        }

        $moduleList.empty(); // clear select list

        // refill the module list
        $.each($outputModulesList, function(key, value) {
            $moduleList.append("<option value=\"" + value + "\">" + value + "</option>");
        });
        */
    }

    function hideShowFilters() {
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

        reloadLists();
    }

    // reload the lists with data in the arrays
    function reloadLists() {
        var $databaseList = $("#DatabaseList");
        var $groupList = $("#GroupList");
        var $studentList = $("#StudentList");
        var $moduleList = $("#ModuleList");

        $databaseList.empty();
        $groupList.empty();
        $studentList.empty();
        $moduleList.empty();

        // refill the lists
        $.each($json, function(key, value) {
            if ($json[key][5] == true)
            {
                $databaseList.append("<option value=\"" + $json[key][0] + "\">" + $json[key][0] + "</option>");
                $groupList.append("<option value=\"" + $json[key][1] + "\">" + $json[key][1] + "</option>");
                $studentList.append("<option value=\"" + $json[key][2] + "\">" + $json[key][2] + "</option>");
                $moduleList.append("<option value=\"" + $json[key][4] + "\">" + $json[key][4] + "</option>");
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
            if($.inArray(this.value, found) != -1) $(this).remove();
            found.push(this.value);
        });
        found = [];




    }




</script>
  </body>
</html>

