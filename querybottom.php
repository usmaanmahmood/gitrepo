
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

    $.getJSON ('getFilterLists.php', function (json) {
        $json = json;
        var $fullDatabaseList = [];
        var $fullGroupList = [];
        var $fullStudentUsernameList = [];
        var $fullStudentFullnameList = [];
        var $fullModuleList = [];

        $.each( $json, function( key, value ) {
            $fullDatabaseList.push($json[key][0]);
            $fullGroupList.push($json[key][1]);
            $fullStudentUsernameList.push($json[key][2]);
            $fullStudentFullnameList.push($json[key][3]);
            $fullModuleList.push($json[key][4]);
        });
    });

    $("#DatabaseList").click(function() {
        reloadModuleList();
        /*
        var $databaseList = $("#DatabaseList");
        var $selectedDatabases = $databaseList.val();

        var $groupList = $("#GroupList");
        var $studentList = $("#StudentList");
        var $moduleList = $("#ModuleList");

        $groupList.empty();
        $studentList.empty();
        $moduleList.empty();

        var $stringGroupsList = [];
        var $stringGroupsAdded = [];

        var $stringStudentsList = [];
        var $stringStudentsAdded = [];

        var $stringModulesList = [];
        var $stringModulesAdded = [];


        for (var i = 0; i < $json.length; i++) {   // if nothing is selected, show all the modules. if the one that is selected = current filter, then that filter is visible.
            if (($selectedDatabases == null) || ($.inArray($json[i].database, $selectedDatabases) > -1)) {
                $json[i].visible = true;
                $stringGroupsList.push($json[i].group);
                $stringStudentsList.push($json[i].studentUsername);
                $stringModulesList.push($json[i].module);
            }
        }

        $.each($stringGroupsList, function(key, value) {
            if ($.inArray(value, $stringGroupsAdded) == -1) {
                $groupList.append("<option value=\"" + value + "\">" + value + "</option>");
                $stringGroupsAdded.push(value);
            }
        });

        $.each($stringStudentsList, function(key, value) {
            if ($.inArray(value, $stringStudentsAdded) == -1) {
                $studentList.append("<option value=\"" + value + "\">" + value + "</option>");
                $stringStudentsAdded.push(value);
            }
        });

        $.each($stringModulesList, function(key, value) {
            if ($.inArray(value, $stringModulesAdded) == -1) {
                $moduleList.append("<option value=\"" + value + "\">" + value + "</option>");
                $stringModulesAdded.push(value);
            }
        });
        */
    });

    // load each list with unique_array(databases) where show = true
    function reloadModuleList() {
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


    }




</script>
  </body>
</html>

