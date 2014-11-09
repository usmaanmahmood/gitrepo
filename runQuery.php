<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "ArcadeQuery.php";

$command = $_GET["command"];
$databases = rtrim($_GET["databases"]);
$groups = rtrim($_GET["groups"]);
$students = rtrim($_GET["students"]);
$modules = rtrim($_GET["modules"]);

$arcadeQuery = new ArcadeQuery($command, $_SESSION['arcadeprofile']);

$arcadeQuery->addFilter(new Filter($databases, $groups, $students, "", $modules));
$arcadeQuery->sendQuery();

echo $arcadeQuery->getResult();
?>