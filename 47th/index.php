<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  #Start session
  session_start();
  ob_start();

  #Connect database
  require 'connect.php';

  $error = "";

  #Check submit button
  if(isset($_POST['login'])) {

      #Check username field
      if(isset($_POST['username'])) {
        $username = $_POST['username'];
      }

      #Check password and md5 encrypt
      if(isset($_POST['password'])) {
        $password = $_POST['password'];
        $md5_pass = md5($password);
      }

      #Check if username, password are in database and if user IS admin
      $querySQL = "SELECT * FROM pmp_users WHERE username=:username AND password=:password";
      $queryPHP = $db->prepare($querySQL);
      $queryPHP->execute(array(':username' => $username, ':password' => $md5_pass));

      #Fetch array results
      $row = $queryPHP->fetch(PDO::FETCH_ASSOC);

      #User, password are correct and account is admin
      if($queryPHP->rowCount() == 1 && $row['admin'] == 1) {
        $_SESSION['username'] = $username;
        header("location:manage.php");
        exit;
      }

      #User, password are correct and account is not admin
      if($queryPHP->rowCount() == 1 && $row['admin'] == 0) {
        $_SESSION['username'] = $username;
        header("location:almost.php");
        exit;
      }
      #User, password login details incorrect
      if($queryPHP->rowCount() == 0) {
        $error = "Invalid login.";
      }

      #Store some stuff to session for later
      else {
          $_SESSION['username'] = $username;
          $_SESSION['sess_user_id'] = $row['uid'];
          $_SESSION['sess_username'] = $row['userName'];
          $_SESSION['sess_avatar'] = $row['ava_url'];
      }
  }

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
        #Non-logged in navbar
        include ('navbar2.php');
       ?>

  	<div class="container">

      <h1>47th Legion Personnel Management Portal</h1>

  		<h2>Login</h2>

  			<form id="userInfo" action="" method="post">
  				<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  				<input id="username" type="text" class="form-control" name="username" placeholder="Username" required> </div>
  				</br>
  				<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  				<input id="password" type="password" class="form-control" name="password" placeholder="Password" required> </div>
  				</br>
  				<button  type="submit" class="btn btn-default" name="login">Login</button>
  			</br>

  			<?php
  				echo "<span style='color: red;'>".$error."</span>";
  			?>
  			</br>
  			</form>
  				<a href="create_account.php">Create a new Account</a>
  			</div>
  		</div>
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
