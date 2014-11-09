
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
        var $databases = $("#DatabaseList option:selected").text();
        var $groups = $("#GroupList option:selected").text();
        var $students = $("#StudentList option:selected").text();
        var $modules = $("#ModuleList option:selected").text();


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

    $.getJSON ('getFilterLists.php', function (json)
    {
        for (var i = 0; i < json.length; i++) { json[i].visible = true; }
        $json = json;
    });

    $("#DatabaseList").click(function() {
        var $selectedDatabases = $("#DatabaseList").val();
        var $selectedGroups = $("#GroupList").val();
        var $selectedUsernames = $("#StudentList").val();
        var $selectedModules = $("#ModuleList").val();

        for (var i = 0; i < $json.length; i++)
        {
            $json[i].visible =  ($.inArray($json[i].database, $selectedDatabases) > -1) ||
                                ($selectedDatabases == null) ||

                                ($.inArray($json[i].group, $selectedGroups) > -1) ||
                                ($selectedGroups == null) ||

                                ($.inArray($json[i].studentUsername, $selectedUsernames) > -1) ||
                                ($selectedUsernames == null) ||

                                ($.inArray($json[i].module, $selectedModules) > -1) ||
                                ($selectedModules == null)
                                ;

        }

//        $('#DatabaseList').empty();
        $('#GroupList').empty();
        $('#StudentList').empty();
        $('#ModuleList').empty();

//        var $uniqueDatabases = [];
        var $uniqueGroups = [];
        var $uniqueStudentUsernames = [];
        var $uniqueModules = [];

        for (var i = 0; i < $json.length; i++)
        {
            if ($json[i].visible)
            {
//                if ($.inArray($json[i].database, $uniqueDatabases) == -1) { $uniqueDatabases.push($json[i].database); }
                if ($.inArray($json[i].group, $uniqueGroups) == -1) { $uniqueGroups.push($json[i].group); }
                if ($.inArray($json[i].studentUsername, $uniqueStudentUsernames) == -1) { $uniqueStudentUsernames.push($json[i].studentUsername); }
                if ($.inArray($json[i].module, $uniqueModules) == -1) { $uniqueModules.push($json[i].module); }
            }
        }



        $.each($uniqueModules, function(key, value) {
            $('#mySelect').append($("<option></option>")
            $('#mySelect').attr("value",key)
            $('#mySelect').text(value));
        });


    });




</script>
  </body>
</html>

