<?php include "template-head.php" ?>
<title>Marks Table | ARCADE</title>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
</style>
</head>

<body>

<?php include("template-nav.php");

$arcadeClient = new ARCADEClient();
$query = new Query("marks-table: all", 0); // command, plainTextWanted

$query->addDatabases(array("11-12-1", "11-12-1X"));
$query->addModules(array("162L"));
$result = $arcadeClient->execute($query);


function objectToArray($object)
{
    if (!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array)$object);
}

//    $result = objectToArray($result);
?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-3">
                <p>Modules &nbsp; | &nbsp;
                    <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button>
                </p>
                <select multiple class="form-control" size=10 id="ModuleList">
                    <?php foreach (array_unique($arcadeProfile->getModuleList()) as $option) { ?>
                        <option value="<?php echo $option ?>"><?php echo $option ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="result">

            </div><!-- result -->
        </div>
    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#submit").click(function () {
//                var $command = $("#CommandList option:selected").text();
//                var $databases = $("#DatabaseList").val();
//                var $groups = $("#GroupList").val();
//                var $students = $("#StudentList").val();
            var $modules = $("#ModuleList").val();

            // validation
//                if ($command == null || $command == "") {
//
//                    if ($('#queryWarning').html() != "") {
//                        $('#queryWarning').fadeOut('slow');
//                        $('#queryWarning').fadeIn('slow');
//                    }
//                    else
//                        $('#queryWarning').html("<div class=\"alert alert-danger\" role=\"alert\">Please select a command.</div>");
//                    return;
//                }
//                else
//                    $('#queryWarning').hide();

            // send through list of databases in the list if none provided
            if ($databases == null || $databases == "") {
                $databases = [];
                var $DatabaseList = $("#DatabaseList");
                var i;
                for (i = 0; i < $DatabaseList.get(0).length; i++) {
                    $databases.push($DatabaseList.get(0).options[i].text);
                }
            }

            var $submitbutton = $('#submit').button('loading');

            $('#resultspane').fadeOut('slow');

            $.ajax({
                url: 'runQuery.php',
                data: {
                    "command": $command,
                    "databases": $databases,
                    "groups": $groups,
                    "students": $students,
                    "modules": $modules
                },
                type: 'get',
                success: function (result) {
                    $('#resultspane').html(result);
                    $('#resultspane').fadeIn('slow');
                    $submitbutton.button('reset');
                }
            });
        });

    }) // document ready

</script>

</body>
</html>