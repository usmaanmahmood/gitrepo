<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "ArcadeQuery.php";
$command="registration-details";

$arcadeQuery = new ArcadeQuery($command);

$arcadeQuery->addFilter(new Filter("12-13-2", "", "", "", ""));
echo var_dump($arcadeQuery) . $arcadeQuery->sendQuery();
?>