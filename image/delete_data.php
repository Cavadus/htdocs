<?php

  //Database Connection
  $con = mysqli_connect("47th.info","thinfo_user","password01","thinfo_school");

  //Retrieve ID
  $id = $_GET['id'];

  //Retrieve data from database table
  $query = mysqli_query($con, "SELECT * FROM t_image WHERE id = '$id'");
  $imageFile = mysqli_fetch_assoc($query);

  //Delete the image from directory
  unlink("upload/" . $imageFile['filename']);

  //Delete data from database
  mysqli_query($con, "DELETE FROM t_image WHERE id = '$id'");
  mysqli_close($con);

  header("Location:index.php");

?>
