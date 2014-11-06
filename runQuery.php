<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 06/11/14
 * Time: 17:29
 */

include "ArcadeQuery.php";

$arcadeQuery = new ArcadeQuery($_GET["command"]);
$arcadeQuery->addFilter(new Filter("", "", "", "", ""));
return $arcadeQuery->sendQuery();
?>