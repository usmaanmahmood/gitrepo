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
            <div class="col-md-3">
                <div class="col-md-12">
                    <span class="text-center" style="font-size:30px;">Modules
                        <button type="button" class="btn btn-default btn-xs reset-filters btn-block">Reset</button>
                    </span>
                    <select multiple class="form-control" size=20 id="ModuleList">
                        <?php $moduleList = array_unique($arcadeProfile->getModuleList());
                        asort($moduleList);

                        foreach ($moduleList as $option) {
                            ?>
                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..."
                            id="submit">Execute Query
                    </button>
                </div>
            </div>
            <div id="result" class="col-md-9">
            </div>
            <!-- result -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <?php $databaseList = $arcadeProfile->getDatabaseList();
            foreach ($databaseList as $database) {

                ?>
                <div class="checkbox"><label><input type="checkbox" id="<?= $database ?>">
                        <?php
                        preg_match("/(\d+)-(\d+)-(\d)(.*)/", $database, $matches);
                        $databaseParsedName = ("Year " . $matches[3] . " - " . ($matches[4] == "X" ? ("Overall") : "Coursework Only"));
                        echo $databaseParsedName;
                        ?>
                    </label></div>
            <?php } ?>
        </div>
        <div class="col-md-6">

            </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="..."
                    id="submit">GO!
            </button>
        </div>
    </div>
</div>
<!-- /.container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        $(".checkbox").change(function() {
            if(this.checked) {
                //Do stuff
            }
        });


        $("#submit").click(function () {
            var $modules = $("#ModuleList").val();

            var $submitbutton = $('#submit').button('loading');

            var $resultDiv = $('#result');
            $resultDiv.fadeOut('slow');

            $.get("DisplayScripts/getMarksTables.php", {"modules": $modules})
                .done(function (result) {
                    $resultDiv.html(result);
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                })
                .error(function (xhr, status, error) {
                    $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com.</p>");
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                });

        });

    }) // document ready

</script>

</body>
</html>