<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 09/11/14
 * Time: 16:55
 */


include "config.php";

$array = $arcadeProfile->getTwoDimensionalArray();
array_shift($array);
echo json_encode($array);

?>