<?php
  #Configuration
  include('connect.php');

  #New data
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $age = $_POST['age'];
  $id = $_POST['memids'];

  #Query
  $sql =  "UPDATE members
          SET fname=?, lname=?, age=?
          WHERE id=?";

  $q = $db->prepare($sql);
  $q->execute(array($fname, $lname, $age, $id));

  header("location: index.php");
?>
