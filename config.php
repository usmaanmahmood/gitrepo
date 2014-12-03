<?php

session_start();
if (empty($_SESSION['username']) || empty($_SESSION['arcadepassword']))
    header("location:Login.php");

include("ARCADEClient.php");

// ensure $arcadeProfile is initialised and loaded in the session
if (!isset($_SESSION['profileResult'])) {
    $arcadeClient = new ARCADEClient();
    $query = new Query("profile", 0);

    $arcadeProfile = $arcadeClient->execute($query);
    $_SESSION['profileResult'] = serialize($arcadeProfile); // save into session
    $arcadeProfile = unserialize($_SESSION['profileResult']);
}

?>