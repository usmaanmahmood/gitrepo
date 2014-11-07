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

if (empty($databases)) $databases = " ";
if (empty($groups)) $groups = " ";
if (empty($students)) $students = " ";
if (empty($modules)) $modules = " ";

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter($databases, $groups, $students, $students, $modules));
echo var_dump($databases) . var_dump($groups) . var_dump($students) . var_dump($modules) . $arcadeQuery->sendQuery();
?>