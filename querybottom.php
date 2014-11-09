<table id="table">
    <tbody></tbody>
</table>
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
            json[i].visible = true
        }

        $json = json;
    });

    $("#DatabaseList").click(function() {
        $databases = $("#DatabaseList option:selected").text();

        for (var i = 0; i < $json.length; i++)
        {
            if ($json[i].database != $databases)
            {
                json[i].visible = false;
            }
        }
    });




</script>
  </body>
</html>

