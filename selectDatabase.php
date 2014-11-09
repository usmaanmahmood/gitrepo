<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 09/11/14
 * Time: 14:42
 */

include "ArcadeQuery.php";


$databases = rtrim($_GET["databases"]);

// create the current arcade profile if it doesnt exist
if (!isset($_SESSION['currentarcadeprofile']))
    $_SESSION['currentarcadeprofile'] = $_SESSION['arcadeprofile'];

$currentArcadeProfile = unserialize($_SESSION['currentarcadeprofile']); // put into variable to make life easier
echo "." . $databases . ".";

echo $currentArcadeProfile->getCommandList();
$currentArcadeProfile->selectDatabase($databases);


$_SESSION['currentarcadeprofile'] = serialize($currentArcadeProfile); // save it after changing it


foreach($currentArcadeProfile->filterList->getList("module") as $option) { ?>
    <option><?php echo $option . " " ?></option>
<?php }

?>