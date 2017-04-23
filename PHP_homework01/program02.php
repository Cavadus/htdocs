<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Homework 01 - Program 02</title>
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
            <li id="q2" class="active"><a href="program02.php">Question 2</a></li>
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
        <div class="panel panel-primary col-xs-10 col-xs-offset-1" style="margin-top:30px;padding:0; ">
          <div class="panel-heading">Program 03</div>
          <div class="panel-body">

    <?php
      main();

      function main ()
      {
        //VARS
          $var = rand(55,65);
          $trueFalse = ($var <= 60) ? 'True' : 'False';
          $counter = 0;
        //ENDVARS

        print "Random variable x = ${var}<br>";

        echo "<br>[ Condition : ${var} <= 60 ${trueFalse} ]<br>=============================<br><br>";
        echo "++THIS IS THE DO-WHILE LOOP++<br><br>";
        do {
          $var++;
          $counter++;
          echo "Iteration ${counter}: Increment = ${var}<br>";
        } while ($var <= 60);
        echo "<br>";
        if ($trueFalse == 'True')
        {
          echo "Wow! Condition is ${trueFalse}!<br>I've been iterated ${counter} times!<br>";
        }

        if ($trueFalse == 'False')
        {
          echo "OOPS! Condition is ${trueFalse}!<br>I've only been iterated ${counter} time!<br>";
        }
      }
     ?>

     <?php
       main1();

       function main1 ()
       {
         //VARS
           $var = rand(55,65);
           $trueFalse1 = ($var <= 60) ? 'True' : 'False';
         //ENDVARS
         echo "<br><br><br>++THIS IS THE FOR-WHILE LOOP++<br><br>";

         print "Random variable x = ${var}<br>";

         echo "<br>[ Condition : ${var} <= 60 ${trueFalse1} ]<br>=============================<br><br>";

         for ($counter1 = 0; $var <= 60; $counter1++)
         {
           $var++;
           $counter1++;
           echo "Iteration ${counter}: Increment = ${var}<br>";
         }

         echo "<br>";
         if ($trueFalse1 == 'True')
         {
           echo "Wow! Condition is ${trueFalse1}!<br>I've been iterated ${counter1} times!<br>";
         }

         if ($trueFalse1 == 'False')
         {
           echo "OOPS! Condition is ${trueFalse1}!<br>I've only been iterated ${counter1} time!<br>";
         }
       }
      ?>
    </div>
  </div>
  </div>
</div>
  </body>
  </html>
