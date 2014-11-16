<?php include "querytop.php" ?>

<div class="row">
    <div class="col-lg-12 text-center">
        <h1>Classic ARCADE</h1>
        <p class="lead">A complete replica of the JAVA ARCADE Client!</p>
        <div class="row">
            <div class="col-md-4">
                <p>Command</p>
                <select class="form-control" size=10 id="CommandList">
                    <?php foreach($arcadeProfile->getCommandList() as $command) { ?>
                        <option><?php echo $command ?></option>
                    <?php }?>
                </select>
                <div class="col-md-12">
                    <div class=\"alert alert-danger\" role=\"alert\" id="queryWarning"></div>
            </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-3">
                    <p>Databases &nbsp; | &nbsp; <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button></p>
                    <select multiple class="form-control" size=10 id="DatabaseList">
                    <?php foreach(array_unique($arcadeProfile->getDatabaseList()) as $option) { ?>
                        <option value="<?php echo $option ?>"><?php echo $option ?></option>
                    <?php }?>
                    </select>
                </div>
                <div class="col-md-3">
                    <p>Groups &nbsp; | &nbsp; <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button></p>
                    <select multiple class="form-control" size=10 id="GroupList">
                        <?php foreach(array_unique($arcadeProfile->getGroupList()) as $option) { ?>
                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-3">
                    <p>Students &nbsp; | &nbsp; <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button></p>
                    <select multiple class="form-control" size=10 id="StudentList">
                        <?php foreach(array_unique($arcadeProfile->getStudentUsernameList()) as $option) { ?>
                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-3">
                    <p>Modules &nbsp; | &nbsp; <button type="button" class="btn btn-default btn-xs reset-filters">Reset</button></p>
                    <select multiple class="form-control" size=10 id="ModuleList">
                        <?php foreach(array_unique($arcadeProfile->getModuleList()) as $option) { ?>
                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..." id="submit">Execute Query</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <pre id="resultspane"></pre>
        </div>
    </div>
</div>
<?php include "querybottom.php" ?>

