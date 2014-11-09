<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "config.php";

include "ArcadeQuery.php";

$command = $_GET["command"];
$databases = rtrim($_GET["databases"]);
$groups = rtrim($_GET["groups"]);
$students = rtrim($_GET["students"]);
$modules = rtrim($_GET["modules"]);

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter($databases, $groups, $students, "", $modules));
echo $arcadeQuery->sendQuery();
?>