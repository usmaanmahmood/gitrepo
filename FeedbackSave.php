<?php

require_once('config.inc.php');
session_start();
//print_R($_POST);


$database_host = 'dbhost.cs.man.ac.uk';
$database_user = 'mmapxum2';
$database_pass = 'manchester';
$database_name = 'mmapxum2';

$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$username = $mysqli->real_escape_string(stripslashes($_SESSION['username']));
$submissionTime = "now()"; // uses mysqls function
$year = $mysqli->real_escape_string(stripslashes($_POST['selectbasicYear']));
$websiteArea = $mysqli->real_escape_string(stripslashes($_POST['selectbasicGUI']));
$device = $mysqli->real_escape_string(stripslashes($_POST['selectbasicDevice']));
$intuitivenessJava = $mysqli->real_escape_string(stripslashes($_POST['radiosIntuitivenessJava']));
$intuitivenessWeb = $mysqli->real_escape_string(stripslashes($_POST['radiosIntuitivenessWeb']));
$intuitivenessComments = $mysqli->real_escape_string(stripslashes($_POST['textareaIntuitivenessComments']));
$presentationJava = $mysqli->real_escape_string(stripslashes($_POST['radiosPresentationJava']));
$presentationWeb = $mysqli->real_escape_string(stripslashes($_POST['radiosPresentationWeb']));
$presentationComments = $mysqli->real_escape_string(stripslashes($_POST['textareaPresentationComments']));
$otherComments = $mysqli->real_escape_string(stripslashes($_POST['textareaOtherComments']));


$sql = "INSERT INTO Feedback(username, submissionTime, year, websiteArea, device, intuitivenessJava, intuitivenessWeb, intuitivenessComments, presentationJava, presentationWeb, presentationComments, otherComments)";
$sql = $sql . " VALUES (\"" . $username . "\"," . $submissionTime . ",\"" . $year . "\",\"" . $websiteArea . "\",\"" . $device . "\"," . $intuitivenessJava . "," . $intuitivenessWeb . ",\"" . $intuitivenessComments;
$sql = $sql . "\"," . $presentationJava . "," . $presentationWeb . ",\"" . $presentationComments . "\",\"" . $otherComments . "\")";

//echo $sql;
if ($mysqli->query($sql) === true) {
    $mysqli->close();
    ?>
    <div class="alert alert-success" role="alert"><b>Thanks for your feedback!</b><br/>You can contact me at
        usmaanmahmood@hotmail.com
    </div>
<?php
} else {
    $mysqli->close();

    ?>
    <div class="alert alert-danger" role="alert"><b>Oh snap!</b> SQL insert failed.
    </div><?php
}
?>
