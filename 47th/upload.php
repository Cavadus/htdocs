<?php

  session_start();
  ob_start();
  $info = '';
  $_SESSION['upload_info'] = $info;

  $username = $_SESSION['username'];
  $con = mysqli_connect("localhost","root","","thinfo_final");

  $target_dir = "upload/";
  $target_filename = basename($_FILES["fileToUpload"]["name"]);
  echo $target_filename;
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          mysqli_query($con, "UPDATE pmp_users SET ava_url = $target_filename WHERE username = '$username'");
          $info = "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      }

      else {
          $info = "File is not an image.";
          $uploadOk = 0;
      }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      $info = "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      $info = "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $info = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $info = "Sorry, your file was not uploaded.";

  // if everything is ok, try to upload file
  }

  else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          mysqli_query($con, "UPDATE pmp_users SET ava_url = '$target_filename' WHERE username = '$username'");
          $info = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          header("location:profile.php");
      }

      else {
          $info = "Sorry, there was an error uploading your file.";
      }
  }

  mysqli_close($con);
  ob_end_flush();
?>
