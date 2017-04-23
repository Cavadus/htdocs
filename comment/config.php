<?php

  $host = "localhost";
  $database = "simple_comment";
  $user = "root";
  $password = "";

  $db = new PDO('mysql:host='.$host.';
                dbname='.$database, $user, $password);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
