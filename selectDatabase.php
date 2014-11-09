<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 09/11/14
 * Time: 14:42
 */

include "ArcadeQuery.php";

$databases = rtrim($_GET["databases"]);

if (!isset($_SESSION["currentprofilestring"])) {
    $_SESSION["currentprofilestring"] = $_SESSION["arcadeprofilestring"];
}


$arcadeProfileString = $_SESSION["currentprofilestring"];
$arcadeProfile = new ArcadeProfile($arcadeProfileString);

$arcadeProfile->selectDatabase($databases);

$arcadeProfileString = $arcadeProfile->getFilterList();








foreach($arcadeProfile->filterList->getList("module") as $option) { ?>
    <option><?php echo $option . " " ?></option>
<?php }