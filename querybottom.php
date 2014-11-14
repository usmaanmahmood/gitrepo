
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
        $json = json.shift(); // HACK: IN ORDER TO REMOVE FIRST EMPTY ITEM FROM ARRAY BC BUG IN ProfileResult.php
    });

    $("#DatabaseList").click(function() {
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
    });




</script>
  </body>
</html>

