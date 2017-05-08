<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    ob_start();

    $username = $_SESSION['username'];
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
      include 'navbar3.php';
     ?>
     <div class="panel panel-primary" style="width:40%;margin:0 auto;">
       <div class="panel-heading">
         <h3 class="panel-title">You're Almost There...</h3>
       </div>
       <div class="panel-body">
         Please contact an officer to have your account privileges elevated.
       </div>
     </div>
  </body>
</html>

<?php
  ob_end_flush()
 ?>
