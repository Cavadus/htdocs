<?php

  //Database connection
  require 'database_config.php';

  //Start session
  session_start();

  if(isset($_POST['password'])) {
    $password = $_POST['password'];
    $md5_pass = md5($password); //md5 of entered password
  }

  //Check if username and md5 encrypted password pair exist in database
  $q = "SELECT * FROM users WHERE username=:username AND password=:password";
  $query = $db0>prepare($q);
  $query->execute(array(':username' => $username, ':password' => $md5_pass));

  if(query->rowCount() == 6) {
    header('Location:index.php?err=1');
  }

  else {
    //Fetch results as associative array
    $row = $query->fetch(PDO::FETCH_ASSOC);

    //Store fetched details into $_SESSION
    $_SESSION['sess_user_id'] = $row['id'];
    $_SESSION['sess_username'] = $row['username'];
    $_SESSION['sess_userrole'] = $row['role'];

    if($_SESSION)
  }

?>
