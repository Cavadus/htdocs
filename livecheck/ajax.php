<?php

  include('db.php');

  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $sql = mysql_query("SELECT id FROM usernames WHERE username='$username'");

    if (mysql_num_rows($sql)) {
      echo '<STRONG>'.$username.'</STRONG> is already in use.';
    }

    else {
      echo 'OK';
    }
  }

?>
