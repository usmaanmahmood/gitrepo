<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include("config.php");

$arcadeClient = new ARCADEClient();
$query = new Query($_GET["command"], 1); // command, plainTextWanted

// if none selected then it is empty. if it is, send the array through
if (!empty($_GET["databases"])) $query->addDatabases($_GET["databases"]);
if (!empty($_GET["groups"]))    $query->addGroups($_GET["groups"]);
if (!empty($_GET["students"]))  $query->addStudents($_GET["students"]);
if (!empty($_GET["modules"]))   $query->addModules($_GET["modules"]);

$result = $arcadeClient->execute($query);

echo $result;

?>