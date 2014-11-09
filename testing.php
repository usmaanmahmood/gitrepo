<?php include "querytop.php" ?>

<?php


/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 30/10/14
 * Time: 14:50
 */



//$profileQuery = new ArcadeQuery("profile");
//$arcadeProfileString = $profileQuery->sendQuery();
//$arcadeProfile = new ArcadeProfile($arcadeProfileString);

?>

<div class="row">
    <div class="col-md-4">
        <p>Command</p>
        <select class="form-control" size=10 id="CommandList">
            <?php foreach($arcadeProfile->getCommandList() as $command) { ?>
                <option><?php echo $command ?></option>
            <?php }?>
        </select>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-3">
                <p>Databases</p>
                <select multiple class="form-control" size=10 id="DatabaseList">
                <?php foreach($arcadeProfile->filterList->getList("database") as $option) { ?>
                    <option><?php echo $option . " " ?></option>
                <?php }?>
                </select>
            </div>
            <div class="col-md-3">
                <p>Groups</p>
                <select multiple class="form-control" size=10 id="GroupList">
                    <?php foreach($arcadeProfile->filterList->getList("group") as $option) { ?>
                        <option><?php echo $option . " " ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-3">
                <p>Students</p>
                <select multiple class="form-control" size=10 id="StudentList">
                    <?php foreach($arcadeProfile->filterList->getList("studentUsername") as $option) { ?>
                        <option><?php echo $option . " " ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-3">
                <p>Modules</p>
                <select multiple class="form-control" size=10 id="ModuleList">
                    <?php foreach($arcadeProfile->filterList->getList("module") as $option) { ?>
                        <option><?php echo $option . " " ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..." id="submit">Execute Query</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <pre id="resultspane"><h1>Results Pane</h1></pre>
</div>

<?php include "querybottom.php" ?>

