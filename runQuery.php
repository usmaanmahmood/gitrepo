<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "ArcadeQuery.php";

$command = $_GET["command"];
$databases = $_GET["databases"];
$groups = $_GET["groups"];
$students = $_GET["students"];
$modules = $_GET["modules"];

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter($databases, $groups, $students, $students, $modules));
echo var_dump($databases) . var_dump($groups) . var_dump($students) . var_dump($modules) . $arcadeQuery->sendQuery();
?>