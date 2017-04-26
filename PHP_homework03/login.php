<?php

  session_start();
  ob_start();

  $error = "";

  if(isset($_POST['login'])) {

      require 'connect.php';

      if(isset($_POST['lname'])) {
        $lname = $_POST['lname'];
      }

      if(isset($_POST['phone'])) {
        $phone = $_POST['phone'];
      }

      // Check if lname and phone are in database
      $querySQL = 'SELECT * FROM homework03 WHERE lname=:lname AND phone=:phone';
      $queryPHP = $db->prepare($querySQL);
      $queryPHP->execute(array(':lname' => $lname, ':phone' => $phone));

      if($queryPHP->rowCount() == 1) {
        $_SESSION['lname'] = $lname;
        header("location:form.php");
        exit;
      }

      if($queryPHP->rowCount() == 0) {
        $error = "Invalid login.";
      }

      else {
          $_SESSION['lname'] = $lname;

          //Fetch array results
          $row = $queryPHP->fetch(PDO::FETCH_ASSOC);

          //Store fetched details into $_SESSION
          $_SESSION['sess_user_id'] = $row['id'];
          $_SESSION['sess_fname'] = $row['fname'];
          $_SESSION['sess_lname'] = $row['lname'];
      }
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

  	 <?php
        require('connect.php')
      ?>

      <nav class="navbar navbar-inverse">
           <div class="container-fluid">
               <div class="navbar-header"> <a class="navbar-brand" href="index.php">ABC Stone Minnesota</a> </div>
           </div>
       </nav>

  	<div class="container">

  		<h2>ABC Stone Minnesota</h2>

  			<form id="userInfo" action="" method="post">
  				<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  				<input id="lname" type="text" class="form-control" name="lname" placeholder="Last Name" required> </div>
  				</br>
  				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  				<input id="phone" type="text" class="form-control" name="phone" placeholder="Phone Number" required> </div>
  				</br>
  				<button  type="submit" class="btn btn-default" name="login">Login</button>
  			</br>

  			<?php
  				echo "<span style='color: red;'>".$error."</span>";
  			?>
  			</br>
  			</form>
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
