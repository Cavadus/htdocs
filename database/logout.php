<?php session_start(); #starts the session
session_destroy(); #destroys started session
header("location:index.php");
exit;
?>
