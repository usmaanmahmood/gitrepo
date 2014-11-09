<table id="target_table_id">
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

        $("#DatabaseList").click(function() {
            $databases = $("#DatabaseList option:selected").text();

            $.ajax ({
                url: 'selectDatabase.php',
                data: {"databases": $databases},
                type: 'get',
                success: function(result)
                {
                    $('#ModuleList').html(result);
                }
            });
        });

        <?php function object_to_array($data)
        {
            if(is_array($data) || is_object($data))
            {
                $result = array();

                foreach($data as $key => $value) {
                $result[$key] = object_to_array($value);
            }

                return $result;
            }

            return $data;
        }
        $filterlistout = object_to_array($arcadeProfile->getArrayOfFilters());
        ?>

        $filterListJSON = <?php echo json_encode($filterlistout); ?> ;

        var tbl_body = "";
        var odd_even = false;
        $.each($filterListJSON, function() {
            var tbl_row = "";
            $.each(this, function(k , v) {
                tbl_row += "<td>"+v+"</td>";
            })
            tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
            odd_even = !odd_even;
        })

        $("#target_table_id tbody").html(tbl_body);

        var obj = jQuery.parseJSON($filterListJSON);
    alert(obj.database);


</script>
  </body>
</html>

