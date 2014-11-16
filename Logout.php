<?php
session_start();
session_destroy();
header("location:Login.php?message=2");
?>
