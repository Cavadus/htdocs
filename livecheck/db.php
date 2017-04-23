<?php

  $conn = mysql_connect("localhost", "root", "")
          or die("Database not connected.");

  $db = mysql_select_db("input_types", $conn)
        or die("Database not connected.");

 ?>
