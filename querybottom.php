
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

    $.getJSON ('getFilterLists.php', function (json) {
        for (var i = 0; i < json.length; i++) { json[i].visible = false; }
        $json = json;
    });

    $("#DatabaseList").click(function() {
        var $databaseList = $("#DatabaseList");
        var $moduleList = $("#ModuleList");
        var $selectedDatabases = $databaseList.val();

        for (var i = 0; i < $json.length; i++) {   // if nothing is selected, show all the modules. if the one that is selected = current filter, then that filter is visible.
            if (($selectedDatabases == null) || ($.inArray($json[i].database, $selectedDatabases) > -1)) {
                $json[i].visible = true;
                $moduleList.append("<option value=\"" + $json[i].module + "\">" + $json[i].module + "</option>");
            }
        };

    });





</script>
  </body>
</html>

