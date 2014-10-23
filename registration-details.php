<?php include "querytop.php" ?>
<p style="text-align:left;font-family:monospace,monospace;font-size:1em;">
<?php 
$query		= "registration-details";
$database	= "12-13-2X 12-13-2 11-12-1X 11-12-1";
$group		= "";
$student	= "";
$module		= "";

echo nl2br(str_replace(' ', '&nbsp;', classicQuery($query, $database, $group, $student, $module))); 



 ?></p>
<?php include "querybottom.php" ?>
