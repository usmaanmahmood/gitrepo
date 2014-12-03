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

//$arcadeClient = new ARCADEClient();
//$query = new Query("marks-table: all", 0); // command, plainTextWanted
//
//$query->addDatabases(array("11-12-1", "11-12-1X"));
//$query->addModules(array("162L"));
//$result = $arcadeClient->execute($query);
//
//
//function objectToArray($object)
//{
//    if (!is_object($object) && !is_array($object))
//        return $object;
//
//    return array_map('objectToArray', (array)$object);
//}

//    $result = objectToArray($result);
?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-6">
                <p>Modules &nbsp; | &nbsp;
                    <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button>
                </p>
                <select multiple class="form-control" size=10 id="ModuleList">
                    <?php foreach (array_unique($arcadeProfile->getModuleList()) as $option) { ?>
                        <option value="<?php echo $option ?>"><?php echo $option ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..."
                        id="submit">Execute Query
                </button>
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
            var $modules = $("#ModuleList").val();

            var $submitbutton = $('#submit').button('loading');

            var $resultsDiv = $('#results');
            $resultsDiv.fadeOut('slow');

            $.ajax({
                url: 'getMarksTables.php',
                data: {
                    "modules": $modules
                },
                type: 'get',
                success: function (result) {
                    $resultsDiv.html(result);
                    $resultsDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                }
            });
        });

    }) // document ready

</script>

</body>
</html>