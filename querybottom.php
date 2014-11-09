
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
        $command = $("#CommandList option:selected").text();
        $databases = $("#DatabaseList option:selected").text();
        $groups = $("#GroupList option:selected").text();
        $students = $("#StudentList option:selected").text();
        $modules = $("#ModuleList option:selected").text();


        $submitbutton = $('#submit').button('loading');

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
        for (var i = 0; i < json.length; i++)
        {
            json[i].database = $.trim(json[i].database);
            json[i].group = $.trim(json[i].group);
            json[i].studentUsername = $.trim(json[i].studentUsername);
            json[i].module = $.trim(json[i].module);
            json[i].visible = true
        }

        $json = json;
    });

    $("#DatabaseList").click(function() {
        $databases = $.trim($("#DatabaseList option:selected").text());

        for (var i = 0; i < $json.length; i++)
        {
            if ($json[i].database != $databases)
            {
                $json[i].visible = false;
                console.log($json[i].database, $databases, $json[i].visible);
            }
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

