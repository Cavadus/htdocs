<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Homework 01 - Program 04</title>
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
            <li id="q3"><a href="program03.php">Question 3</a></li>
            <li id="q4" class="active"><a href="program04.php">Question 4</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

    	<div class="container-fluid">


        <table class="table col-xs-10" style="padding:20;margin-top:30px;">
              		<div style="text-align:center;">
                    	<h3>Foreach Loop</h3>
                    </div>
          <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Edit/Delete</th>
              </tr>
            </thead>

            <tbody>

              <?php
              //initialize arrays
              $firstNameArray = array("VVVV", "iiii", "bbbbb", "gggg", "yyyy", "ooooo", "rrrrr");
              $lastNameArray = array("Violet", "Indigo", "Blue", "Green", "Yellow", "Orange", "Red");
              $phoneNumberArray = array("612-352-0598","612-342-1598","612-352-0998","612-388-0598","612-344-0598","612-352-0566","612-352-0522");
              $emailArray = array("Violet@gmain.com","Indigo@gmain.com","Blue@gmain.com","Green@gmain.com","Yellow@gmain.com","Orange@gmain.com","Red@gmain.com");
              $index = 0;
              $counter = 0;
              $counter = sprintf("%03d", $counter);
              //end arrays
              foreach ($firstNameArray as $index => $obj)
              {
                echo "<tr><td>USA", $counter++, "</td><td>", $obj, "</td><td>", $lastNameArray[$index], "</td><td>", $phoneNumberArray[$index], "</td><td>", $emailArray[$index],"</td><td><button type='button' class='btn btn-primary'>Edit</button><button type='button' class='btn btn-danger'>Delete</button></tr>";
              }
              ?>

            </tbody>

          </table>

          <br>
          <br>
          <br>

          <table class="table col-xs-10" style="padding:20;margin-top:30px;">
                		<div style="text-align:center;">
                      	<h3>For Loop</h3>
                      </div>
            <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Edit/Delete</th>
                </tr>
              </thead>

              <tbody>

                <?php
                //initialize arrays
                $firstNameArray = array("VVVV", "iiii", "bbbbb", "gggg", "yyyy", "ooooo", "rrrrr");
                $lastNameArray = array("Violet", "Indigo", "Blue", "Green", "Yellow", "Orange", "Red");
                $phoneNumberArray = array("612-352-0598","612-342-1598","612-352-0998","612-388-0598","612-344-0598","612-352-0566","612-352-0522");
                $emailArray = array("Violet@gmain.com","Indigo@gmain.com","Blue@gmain.com","Green@gmain.com","Yellow@gmain.com","Orange@gmain.com","Red@gmain.com");
                $index = 0;
                $counter = 0;
                $index = sprintf("%03d", $counter);
                //end arrays
                for ($counter = 0; $counter < sizeof($firstNameArray); $counter++)
                {
                  echo "<tr><td>USA", $index++, "</td><td>", $firstNameArray[$counter], "</td><td>", $lastNameArray[$counter], "</td><td>", $phoneNumberArray[$counter], "</td><td>", $emailArray[$counter],"</td><td><button type='button' class='btn btn-primary'>Edit</button><button type='button' class='btn btn-danger'>Delete</button></tr>";
                }
                ?>

              </tbody>

            </table>

            <br>
            <br>
            <br>

            <table class="table col-xs-10" style="padding:20;margin-top:30px;">
                  		<div style="text-align:center;">
                        	<h3>Do... While Loop</h3>
                        </div>
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Edit/Delete</th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                  //initialize arrays
                  $firstNameArray = array("VVVV", "iiii", "bbbbb", "gggg", "yyyy", "ooooo", "rrrrr");
                  $lastNameArray = array("Violet", "Indigo", "Blue", "Green", "Yellow", "Orange", "Red");
                  $phoneNumberArray = array("612-352-0598","612-342-1598","612-352-0998","612-388-0598","612-344-0598","612-352-0566","612-352-0522");
                  $emailArray = array("Violet@gmain.com","Indigo@gmain.com","Blue@gmain.com","Green@gmain.com","Yellow@gmain.com","Orange@gmain.com","Red@gmain.com");
                  $index = 0;
                  $counter = 0;
                  $index = sprintf("%03d", $counter);
                  //end arrays

                  do {
                    echo "<tr><td>USA", $index++, "</td><td>", $firstNameArray[$counter], "</td><td>", $lastNameArray[$counter], "</td><td>", $phoneNumberArray[$counter], "</td><td>", $emailArray[$counter],"</td><td><button type='button' class='btn btn-primary'>Edit</button><button type='button' class='btn btn-danger'>Delete</button></tr>";
                    $counter++;
                  } while ($counter < sizeof($firstNameArray));
                  ?>

                </tbody>

              </table>

              <br>
              <br>
              <br>

              <table class="table col-xs-10" style="padding:20;margin-top:30px;">
                    		<div style="text-align:center;">
                          	<h3>While Loop</h3>
                          </div>
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Edit/Delete</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    //initialize arrays
                    $firstNameArray = array("VVVV", "iiii", "bbbbb", "gggg", "yyyy", "ooooo", "rrrrr");
                    $lastNameArray = array("Violet", "Indigo", "Blue", "Green", "Yellow", "Orange", "Red");
                    $phoneNumberArray = array("612-352-0598","612-342-1598","612-352-0998","612-388-0598","612-344-0598","612-352-0566","612-352-0522");
                    $emailArray = array("Violet@gmain.com","Indigo@gmain.com","Blue@gmain.com","Green@gmain.com","Yellow@gmain.com","Orange@gmain.com","Red@gmain.com");
                    $index = 0;
                    $counter = 0;
                    $index = sprintf("%03d", $counter);
                    //end arrays

                    while ($counter < sizeof($firstNameArray)) {
                      echo "<tr><td>USA", $index++, "</td><td>", $firstNameArray[$counter], "</td><td>", $lastNameArray[$counter], "</td><td>", $phoneNumberArray[$counter], "</td><td>", $emailArray[$counter],"</td><td><button type='button' class='btn btn-primary'>Edit</button><button type='button' class='btn btn-danger'>Delete</button></tr>";
                      $counter++;
                    }
                    ?>

                  </tbody>

                </table>


    </div>

  </body>
  </html>
