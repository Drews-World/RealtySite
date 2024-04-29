<?php
session_start();

$_SESSION = array();

session_destroy();

//i guess to home page? or myabe logout
header("Location: ../views/home.php");
exit;
?>
