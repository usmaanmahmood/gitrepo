<?php include "querytop.php" ?>
<p style="text-align:left;font-family:monospace,monospace;font-size:1em;">
<?php 
$query		= "marks-table: fails only";
$database	= "";
$group		= "";
$student	= "";
$module		= "";

echo nl2br(str_replace(' ', '&nbsp;', classicQuery($query, $database, $group, $student, $module))); 



 ?></p>
<?php include "querybottom.php" ?>
