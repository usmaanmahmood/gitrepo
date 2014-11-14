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

// if empty, send empty array through instead of null
echo var_dump($_GET["databases"]);
echo var_dump($_GET["modules"]);

echo (empty($_GET["modules"]) ? "yes" : "no");
//
//if (!empty($_GET["databases"])) $query->addDatabases(implode(" ", $_GET["databases"]));
//
//if (!empty($_GET["groups"]))    $query->addGroups(implode(" ", $_GET["groups"]));
//
//if (!empty($_GET["students"]))  $query->addStudents(implode(" ", $_GET["students"]));
//
//if (!empty($_GET["modules"]))   $query->addModules(implode(" ", $_GET["modules"]));

//$plainResult = $arcadeClient->execute($query);

//echo $plainResult;

?>