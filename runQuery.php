<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "ArcadeQuery.php";

$command = $_GET["command"];
$databases = rtrim(implode(" ", $_GET["databases"]));
$groups = rtrim(implode(" ", $_GET["groups"]));
$students = rtrim(implode(" ", $_GET["students"]));
$modules = rtrim(implode(" ", $_GET["modules"]));

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter($databases, $groups, $students, "", $modules));

$arcadeQuery->sendQuery();

echo $arcadeQuery->getResult();
?>