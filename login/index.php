<?php session_start(); #starts session

  if(!isset($_SESSION['UserData']['Username']))
  {
    header("location:login.php");
    exit;
  }

?>

Congratulations!  You have loggd into password protected page.
<br>
<a href="logout.php">Logout</a>
