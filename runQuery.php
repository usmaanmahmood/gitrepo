<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "ArcadeQuery.php";

$command = $_GET["command"];
$databases = implode(" ", $_GET["databases"]);
$groups = implode(" ", $_GET["groups"]);
$students = implode(" ", $_GET["students"]);
$modules = implode(" ", $_GET["modules"]);

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter("", "", "", "", ""));
echo var_dump($databases) . var_dump($groups) . $arcadeQuery->sendQuery();
?>