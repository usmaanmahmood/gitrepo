<?php include "querytop.php" ?>
<p style="text-align:left;font-family:monospace,monospace;font-size:1em;">
<?php 
$query		= "profile";
$database	= "";
$group		= "";
$student	= "";
$module		= "";

$result = classicQuery($query, $database, $group, $student, $module);
$result2 = nl2br($result);
$result3 = preg_replace("/(?<=\s)\x20|\x20(?=\s)/", "&#160;", $result2);
//echo $result3;

echo "------------------------------------------------------------------------------<br />";

$startposition = strrpos($result, "++MODULESORTORDER"); // start of final ++MODULESTOORDER
$stringcleanedup = substr($result, $startposition); // trim down to start (2 garbage lines still need removing)
$lines = preg_split('/\r\n|\r|\n/', $stringcleanedup, 2); // remove first line
$lines = preg_split('/\r\n|\r|\n/', $lines[1], 2); // remove second line so just have required list
$lines = $lines[1];
echo nl2br($lines);

$rowbyrow = explode("\n", $lines);

$sql = array();
foreach( $rowbyrow as $row ) {
    $colsarray = explode(" ", $row);
    $sql[] = '("'.$colsarray[0].'", "'.$colsarray[1].'", "'.$colsarray[2].'", "'.$colsarray[3].'", "'.$colsarray[4].'")';
}
echo $sql[0];
//mysql_query('INSERT INTO ProfileCache (arcadeusername, databasename, groupname, studentusername, studentname, module) VALUES '.implode(',', $sql));
 ?></p>
<?php include "querybottom.php" ?>
