<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  session_start();
  ob_start();

  $username = $_SESSION['username'];

  #Create connection to database
  require 'connect.php';

  $query = "SELECT ava_url FROM pmp_users WHERE username = :username";
  $statement = $db->prepare($query);
  $statement->execute(array('username' => $username));
  $avatar = $statement->fetchColumn();

?>

<html lang="en">

  <head>
  	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>47th Personnel Management Portal</title>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <?php
      include 'navbar.php';
     ?>

      <div class="container">
        <div class="jumbotron">
            <h1>Welcome <?php echo $username ?>!</h1>
            <br>
            <img src="upload/<?php echo $avatar ?>">
            <br>
            <br>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              Select image to upload:
              <br>
              <input type="file" name="fileToUpload" id="fileToUpload">
              <br>
              <input type="submit" value="Upload Image" name="submit">
          </form>
        </div>
      </div>

  </body>

</html>

<?php
  ob_end_flush();
?>
