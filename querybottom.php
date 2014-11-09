
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

        $('#DatabaseList').empty();
        $('#GroupList').empty();
        $('#StudentList').empty();
        $('#ModuleList').empty();

        for (var i = 0; i < $json.length; i++)
        {
            if ($json[i].visible)
            {
                $('#DatabaseList').append("<option>" + $json[i].database + "</option>");
                $('#GroupList').append("<option>" + $json[i].group + "</option>");
                $('#StudentList').append("<option>" + $json[i].studentUsername + "</option>");
                $('#ModuleList').append("<option>" + $json[i].module + "</option>");
            }
        }
    });




</script>
  </body>
</html>

