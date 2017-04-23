<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Homework 01 - Program 01</title>
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
            <li id="q1" class="active"><a href="program01.php">Question 1</a></li>
            <li id="q2"><a href="program02.php">Question 2</a></li>
            <li id="q3"><a href="program03.php">Question 3</a></li>
            <li id="q4"><a href="program04.php">Question 4</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

    	<div class="container-fluid">
          <div class="panel panel-danger col-xs-10 col-xs-offset-1" style="margin-top:30px;padding:0;">
            <div class="panel-heading">Program 01</div>
            <div class="panel-body">

    <?php
      main();
      function main ()
      {
        //VARS
          $hrs1 = rand(1,12);
          $mer = rand(1,2);
          $hrs2 = rand(0,23);
          $mins = rand(0,59);
        //ENDVARS
        convert12to24($hrs1, $mins, $mer);

        echo "<br>====================================<br>";

        convert24to12($hrs2, $mins);
    }

      //FUNCTIONS
      function convert12to24 ($hrs1, $mins, $mer)
      {
        if ($mer == 1)
        {
          $mer = "AM";
          echo "12 hours to 24 hours<br>";
          echo "${hrs1}:${mins} ${mer} = $hrs1:${mins} hours";
        }
        if ($mer == 2)
        {
          $mer = "PM";
          $hrs1Converted = $hrs1 + 12;
          echo "12 hours to 24 hours<br>";
          echo "${hrs1}:${mins} ${mer} = ${hrs1Converted}:${mins} hours";
        }
      }

      function convert24to12($hrs2, $mins)
      {
        echo "24 hours to 12 hours<br>";
        if ($hrs2 < 13)
        {
          echo "${hrs2}:${mins} hours = ${hrs2}:${mins} AM";

          if ($hrs2 = 12 && $mins = 0)
          {
            echo "${hrs2}:${mins} hours = ${hrs2}:${mins} NOON";
          }
        }

        if ($hrs2 > 13)
        {
          $hrs = $hrs2 - 12;
          echo "${hrs2}:${mins} hours = ${hrs}:${mins} PM";
        }
      }

     ?>
   </div>
 </div>
 </div>
</div>
 </body>
 </html>
