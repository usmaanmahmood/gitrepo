<?php

include("../config.php");

$arcadeClient = new ARCADEClient();
$query = new Query("irregularities", 0); // command, plainTextWanted

// if none selected then it is empty. if it is, send the array through
if (!empty($_GET["databases"])) $query->addDatabases($_GET["databases"]);
if (!empty($_GET["groups"])) $query->addGroups($_GET["groups"]);
if (!empty($_GET["students"])) $query->addStudents($_GET["students"]);
if (!empty($_GET["modules"])) $query->addModules($_GET["modules"]);

$result = $arcadeClient->execute($query);

?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php
    $databaseList = $result->getDatabaseList();
    // database title
    // new panel for each module

    foreach ($databaseList as $database) {
        ?>
        <h3><?= $database->getDatabaseParsedName() . " (" . $database->getDatabaseName() . ")"; ?></h3>
        <?php
        $itemModuleList = array_unique($database->getItemModuleList());
        foreach ($itemModuleList as $key => $module) {
            $key1 = $key + 1;
            $currentNumber = ucfirst(convert_number_to_words(($key1)));

            ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?= $currentNumber ?>">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapse<?= $currentNumber ?>"
                           aria-expanded="true"
                           aria-controls="collapse<?= $currentNumber ?>"><strong>
                                <?= $module; ?></strong>
                            - <?= $database->getItemCountForModule($module); ?> irregularities</a>
                    </h4>
                </div>
                <!-- panel-heading -->
                <div id="collapse<?= $currentNumber ?>"
                     class="panel-collapse collapse<?= $currentNumber == "One" ? " in" : "" ?>"
                     role="tabpanel"
                     aria-labelledby="heading<?= $currentNumber ?>">
                    <!--                                <div class="panel-body">-->
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Group:</th>
                            <th>Date (DD/MM):</th>
                            <th>Note:</th>
                        </tr>
                        <?php foreach ($database->getItemList() as $item) {
                            if ($item->getModule() == $module) {
                                ?>
                                <tr>
                                    <td><?= $item->getGroup(); ?></td>
                                    <td><?= $item->getDate(); ?></td>
                                    <td><?= $item->getNote(); ?></td>
                                </tr>
                            <?php
                            } // if $module
                        } // foreach $item in this module
                        ?>
                    </table>
                    <!--                                </div>-->
                </div>
            </div> <!-- panel panel-default -->
        <?php
        } // foreach $module
    } // foreach $database
    ?>
</div>
<!-- panel-group -->
