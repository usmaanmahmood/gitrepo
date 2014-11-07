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

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter("", "", "", "", ""));
echo var_dump($databases) . $arcadeQuery->sendQuery();
?>