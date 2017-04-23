<?php

  // define database related variable
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $database = 'users';

  // try to connect to DB
  $dbh = new PDO('mysql:host='.$host.'; dbname='.$database, $user, $pass);

  if(!$dbh)
  {echo "unable to connect to database";
  }
  //end config

?>
