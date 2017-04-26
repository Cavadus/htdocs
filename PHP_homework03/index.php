<?php

  session_start();
  ob_start();


    if(isset($_POST['yes'])) {
      header("location:login.php");
      exit;
    }

    if(isset($_POST['no'])) {
      header("location:accountCreate.php");
      exit;
    }

?>

<!DOCTYPE html>

<html lang="en">

  <head>
  	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PHP Homework 03</title>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse">
         <div class="container-fluid">
             <div class="navbar-header"> <a class="navbar-brand" href="index.php">ABC Stone Minnesota</a> </div>
         </div>
    </nav>

  	<div class="container">

  		<h2>Welcome to ABC Stone Minnesota's website!</h2>

  			<form id="userInfo" action="" method="post">
          <h2>Have you previously visited our website?</h2>
          <br><br><br><br>
  				<button  type="submit" class="btn btn-default" name="yes">Yes</button>
          <button  type="submit" class="btn btn-default" name="no">No</button>

  	</div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>


  </body>

</html>

<?php
  ob_end_flush();
 ?>
