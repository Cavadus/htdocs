<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Homework 01 - Program 03</title>
      	<!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
    	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id="home"><a id="h" href="index.php">Home</a></li>
            <li id="q1"><a href="program01.php">Question 1</a></li>
            <li id="q2"><a href="program02.php">Question 2</a></li>
            <li id="q3" class="active"><a href="program03.php">Question 3</a></li>
            <li id="q4"><a href="program04.php">Question 4</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

    	<div class="container-fluid">
          <h1></h1>
          <p></p>
          <div class="jumbotron">
          <div class="container text-center">
    <?php
      main();

      function main ()
      {
        //VARS
          $var = rand(4,40);
        //ENDVARS

        echo "Generated value = ${var}<br>";
        do {
          if ($var %4 == 0){
            echo "$var + 6 = ", $var = $var + 6, " (There are ", floor($var / 4) , " fours in $var)<br>";
          }
          else{
            echo "$var + 6 = ", $var = $var + 6, "<br>";
          }
        } while ($var <= 30);
        echo "Done!";
      }
     ?>
   </div>
 </div>
 </div>
 </body>
 </html>
