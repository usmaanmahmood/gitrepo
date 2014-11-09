<?php include "querytop.php" ?>

<?php


/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 30/10/14
 * Time: 14:50
 */
$string = '
++WORKING
++WORKING
++WORKING
++COMMAND
Welcome and help
++COMMAND
If the data is wrong
++COMMAND
registration-details
++COMMAND
registration-details: with lab groups
++COMMAND
display-picture
++COMMAND
time-table: remaining
++COMMAND
time-table: full
++COMMAND
time-table: with extensions
++COMMAND
attendance-summary
++COMMAND
marks-table: all
++COMMAND
marks-table: fails only
++COMMAND
marks-table: ignore empty columns
++COMMAND
expected
++COMMAND
excuses
++COMMAND
irregularities
++COMMAND
failure-predictions
++COMMAND
full-story: with notes
++COMMAND
full-story: without notes
++COMMAND
full-story: chronological
++MODULESORTORDER
Sem1_EXAMS_SH
++MODULESORTORDER
Sem1_EXAMS_CM
++MODULESORTORDER
Sem1_EXAMS_CSwBM
++MODULESORTORDER
Overall
++MODULESORTORDER
OverallFeb
++MODULESORTORDER
OverallExamFeb
++MODULESORTORDER
Sem1Summary
++MODULESORTORDER
Sem2Summary
++MODULESORTORDER
10021
++MODULESORTORDER
10020F
++MODULESORTORDER
10031
++MODULESORTORDER
10081
++MODULESORTORDER
10211
++MODULESORTORDER
10580F
++MODULESORTORDER
10900F
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 21111 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 21111X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 22712 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23111 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23111X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23420 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23421X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23421Xa 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23421Xb 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 23422X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25111 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25111X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25212 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 25212X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 26120 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 26121X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 26122X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112Xa 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112Xb 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 27112Xc 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28112 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28112X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28411 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali 28411X 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali Overall 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali OverallCOMP 
12-13-2X X6 mahmoou1 Mahmood,Usmaan_Ali OverallExam 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 21111C 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 21111E 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 22712L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23111E 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23111L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23421L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23421W 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 23422L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 25111L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 25212L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 26121L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 26122L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 27112C 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 27112L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 28112L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 28411L 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali 28411W 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali Careers 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali GSkills 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali GSkills1 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali GSkills2 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali Tut1 
12-13-2 X6 mahmoou1 Mahmood,Usmaan_Ali Tut2 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 101 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 111 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 111s1X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 111s2X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 112 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 112X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 121 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 121X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 141 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 141X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 151 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 151X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161L 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 161v162 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 162 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 162L 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 162X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 181 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali 181X 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali Overall 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallExam 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallSH 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallSem1 
11-12-1X X6 mahmoou1 Mahmood,Usmaan_Ali OverallSem2 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101CL 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s1C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s1P 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s1S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s2C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s2P 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 101s2S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111T 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s1C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s1E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s1S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s2C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s2E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 111s2S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 112C 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 112E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 112S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 121L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 121S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 141E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 141L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 141S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 151E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 151L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 151S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 161L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 161S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 162L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 162S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 181E 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 181L 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali 181S 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Intro1 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Intro23 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali IntroW 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali PASS1 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali PASS2 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Tut1 
11-12-1 X6 mahmoou1 Mahmood,Usmaan_Ali Tut2 ';

include "ArcadeQuery.php";

include "ArcadeProfile.php";

//$arcadeProfile = new ProfileQuery($string);

$profileQuery = new ArcadeQuery("profile");
$arcadeProfileString = $profileQuery->sendQuery();
$arcadeProfile = new ArcadeProfile($arcadeProfileString);

echo $_SESSION['username'] . $_SESSION['arcadepassword'] . '<br/>';
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

