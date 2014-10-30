<?php include "querytop.php" ?>
<p style="text-align:left;font-family:monospace,monospace;font-size:1em;">
<?php 
$query		= "profile";
$database	= "";
$group		= "";
$student	= "";
$module		= "";

$result = classicQuery($query, $database, $group, $student, $module);
$result = nl2br($result);
$result = preg_replace("/(?<=\s)\x20|\x20(?=\s)/", "&#160;", $result);
echo $result;


 ?></p>
<?php include "querybottom.php" ?>
