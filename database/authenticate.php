<?php

require 'databaseconfig.php'; //databaseconnection
session_start();  //start the session

if (isset($_POST['username']))
{
  $username = $_POST['username'];
}

if (isset($_POST['password']))
{
  $password = $_POST['password'];
}

//Check if the entered username/password pair exists in the db
$q = 'SELECT * FROM users WHERE username=:username AND password=:password';
$query = $dbh->prepare($q);
$query->execute(array(':username' => $username, ':password' => $password));

if ($query->rowCount() == 0)
{
  header('Location: index.php?err=1');
}

else {
  //fetch the result as associative ArrayAccess
  $row = $query->fetch(PDO::FETCH_ASSOC);

  //store the fetched details into $_SESSION
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['sess_username'] = $row['username'];
  $_SESSION['sess_userrole'] = $row['role'];

  if ($_SESSION['sees_userrole'] == "suadmin")
  {
    header('Location: suadminhome.php');
  }

  if ($_SESSION['sees_userrole'] == "admin")
  {
    header('Location: adminhome.php');
  }

  else
  {
    header('Location: userhome.php');
  }
}

 ?>
