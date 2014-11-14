<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

//include "ArcadeQuery.php";
//
//$command =
//$databases = (($_GET["databases"] == null) ? " " : rtrim(implode(" ", $_GET["databases"])));
//$groups = (($_GET["groups"] == null) ? " " : rtrim(implode(" ", $_GET["groups"])));
//$students = (($_GET["students"] == null) ? " " : rtrim(implode(" ", $_GET["students"])));
//$modules = (($_GET["modules"] == null) ? " " : rtrim(implode(" ", $_GET["modules"])));
//
//$arcadeQuery = new ArcadeQuery($command);
//
//$arcadeQuery->addFilter(new Filter($databases, $groups, $students, "", $modules));
//
//$arcadeQuery->sendQuery();
//
//echo $arcadeQuery->getResult();
 include("config.php");

$arcadeClient = new ARCADEClient();
$query = new Query($_GET["command"], 1); // command, plainTextWanted

// if empty, ssend an empty string instead of null
$query->addDatabases($_GET["databases"] == null ? array() : $_GET["databases"]);
$query->addGroups($_GET["groups"] == null? array() : $_GET["groups"]);
$query->addStudents($_GET["students"] == null? array() : $_GET["students"]);
$query->addModules($_GET["modules"] == null? array() : $_GET["modules"]);

$plainResult = $arcadeClient->execute($query);

?>