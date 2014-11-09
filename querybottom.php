
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
       var  $selectedDatabases = $("#DatabaseList option:selected").val();

        for (var i = 0; i < $json.length; i++)
        {
            if ($.inArray($json[i].database, $selectedDatabases) == -1) {
                $json[i].visible = false;
            }
            else
                $json[i].visible = true;
        }

        $('#ModuleList').empty();

        for (var i = 0; i < $json.length; i++)
        {
            if ($json[i].visible)
            {
                $('#ModuleList').append("<option>" + $json[i].module + "</option>");
            }
        }
    });




</script>
  </body>
</html>

