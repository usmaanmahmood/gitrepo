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


$arcadeClient = new ARCADEClient();
$query = new Query($_GET["command"], 1);

// if empty, ssend an empty string instead of null
$query->addDatabases(($_GET["databases"] == null) ? "" : implode(" ", $_GET["groups"]));
$query->addGroups(($_GET["groups"] == null) ? "" : implode(" ", $_GET["groups"]));
$query->addStudents(($_GET["students"] == null) ? "" : implode(" ", $_GET["students"]));
$query->addModules(($_GET["modules"] == null) ? "" : implode(" ", $_GET["modules"]));

$plainResult = $arcadeClient->execute($query);

?>