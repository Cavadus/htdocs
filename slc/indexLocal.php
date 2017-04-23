<html>

  <head>
    <title> Student Learning Collection</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>

    <?php
      $con = mysqli_connect("localhost","root","","slc");
      $query = mysqli_query($con, "SELECT * FROM data");
     ?>

  <div class="bgimg-1">
    <div class="caption">
      <span class="border">Student Learning Collection by Levi Kavadas</span>
      <br><br><br><br><br><br>
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">Creating Web Solutions Using a Variety of Languages</span>
    </div>
  </div>

  <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
    <?php
      $count = 1;
      while ($count < 3 && $get=Mysqli_fetch_assoc($query)) {
    ?>


    <h3 style="text-align:center;"><?php echo $get['title']; ?></h3>
  </br>
    <?php echo '<center><img src="img/'.$get['filename'].'" width="400" height="350"></center>'; ?>
    <p><?php echo $get['reflection']; ?></h2></p>
  </br>
  </br>
    <?php
      $count++;
      }
    ?>
  </div>

  <div class="bgimg-2">
    <div class="caption">
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">Evaluate Organizational Structure of a Business</span>
    </div>
  </div>

  <div style="position:relative;">
    <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
      <?php
        $count = 3;
        while ($count < 5 && $get=Mysqli_fetch_assoc($query)) {
      ?>

      <h3 style="text-align:center;"><?php echo $get['title']; ?></h3>
    </br>
      <?php echo '<center><img src="img/'.$get['filename'].'" width="400" height="350"></center>'; ?>
      <p><?php echo $get['reflection']; ?></h2></p>
    </br>
    </br>
      <?php
        $count++;
        }
      ?>
    </div>
  </div>

  <div class="bgimg-3">
    <div class="caption">
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">Illustrate Networks</span>
    </div>
  </div>

  <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
    <?php
      $count = 5;
      while ($count < 7 && $get=Mysqli_fetch_assoc($query)) {
    ?>


    <h3 style="text-align:center;"><?php echo $get['title']; ?></h3>
  </br>
    <?php echo '<center><img src="img/'.$get['filename'].'" width="400" height="350"></center>'; ?>
    <p><?php echo $get['reflection']; ?></h2></p>
  </br>
  </br>
    <?php
      $count++;
      }
    ?>
  </div>

  <div class="bgimg-2">
    <div class="caption">
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">Articulate Development Solutions</span>
    </div>
  </div>

  <div style="position:relative;">
    <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
      <?php
        $count = 7;
        while ($count < 9 && $get=Mysqli_fetch_assoc($query)) {
      ?>


      <h3 style="text-align:center;"><?php echo $get['title']; ?></h3>
    </br>
      <?php echo '<center><img src="img/'.$get['filename'].'" width="400" height="350"></center>'; ?>
      <p><?php echo $get['reflection']; ?></h2></p>
    </br>
    </br>
      <?php
        $count++;
        }
      ?>
    </div>
  </div>

  <div class="bgimg-3">
    <div class="caption">
      <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">Determine if a Database is Properly Structured</span>
    </div>
  </div>

  <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
    <?php
      $count = 9;
      while ($count < 11 && $get=Mysqli_fetch_assoc($query)) {
    ?>


    <h3 style="text-align:center;"><?php echo $get['title']; ?></h3>
  </br>
    <?php echo '<center><img src="img/'.$get['filename'].'" width="400" height="350"></center>'; ?>
    <p><?php echo $get['reflection']; ?></h2></p>
  </br>
  </br>
    <?php
      $count++;
      }
    ?>
  </div>

  <div class="bgimg-1">
    <div class="caption">
      <span class="border">COOL!</span>
    </div>
  </div>

  <?php
    mysqli_close($con);
  ?>

  </body>
</html>
