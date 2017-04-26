<html>

  <head>
    <title> Student Learning Collection</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>

    <?php
      #Localhost
      $con = mysqli_connect("localhost","root","","slc");
      #Production
      #$con = mysqli_connect("47th.info","thinfo_user","password01","thinfo_slc");

      $query = mysqli_query($con, "SELECT * FROM data");
     ?>

  <div class="topnav" id="myTopnav">
      <a href="#top">Top</a>
      <a href="#web_sol">Create Web Solutions</a>
      <a href="#org_bus">Evaluation Structure</a>
      <a href="#ill_net">Illustrate Networks</a>
      <a href="#dev_sol">Articulate Solutions</a>
      <a href="#dat_str">Database Structure</a>
      <a href="#tayne">Tayne</a>

  </div>
  <a name="web_sol" />
  <div class="bgimg-1">
    <div class="caption">
      <span class="border">Student Learning Collection by Levi Kavadas</span>
      <br><br><br><br><br><br>
      <span class="border1">Create web solutions using a variety of programming languages.</span>
    </div>
  </div>

  <div style="color: #777;background-color:#1d2120;text-align:center;padding:50px 80px;text-align: justify;">
    <?php
      $count = 1;
      while ($count < 3 && $get=Mysqli_fetch_assoc($query)) {
    ?>


    <h3 style="text-align:center;"><span class="alt"><?php echo $get['title']; ?></span></h3>
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
  <a name="org_bus" />
  <div class="bgimg-2">
    <div class="caption">
      <span class="border1">Evaluate the organizational structure of a business in order to facilitate data management.</span>
    </div>
  </div>

  <div style="position:relative;">
    <div style="color:white;background-color:#5a5c51;text-align:center;padding:50px 80px;text-align: justify;">
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
  <a name="ill_net" />
  <div class="bgimg-3">
    <div class="caption">
      <span class="border1">Illustrate networks used for the internet.</span>
    </div>
  </div>

  <div style="color: #777;background-color:#1d2120;text-align:center;padding:50px 80px;text-align: justify;">
    <?php
      $count = 5;
      while ($count < 7 && $get=Mysqli_fetch_assoc($query)) {
    ?>


    <h3 style="text-align:center;"><span class="alt"><?php echo $get['title']; ?></span></h3>
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
  <a name="dev_sol" />
  <div class="bgimg-4">
    <div class="caption">
      <span class="border1">Articulate development solutions to peers and supervisors.</span>
    </div>
  </div>

  <div style="position:relative;">
    <div style="color:white;background-color:#5a5c51;text-align:center;padding:50px 80px;text-align: justify;">
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
  <a name="dat_str" />
  <div class="bgimg-5">
    <div class="caption">
      <span class="border1">Determine that a database is properly structured.</span>
    </div>
  </div>

  <div style="color: #777;background-color:#1d2120;text-align:center;padding:50px 80px;text-align: justify;">
    <?php
      $count = 9;
      while ($count < 11 && $get=Mysqli_fetch_assoc($query)) {
    ?>


    <h3 style="text-align:center;"><span class="alt"><?php echo $get['title']; ?></span></h3>
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
  <a name="tayne" />
  <div class="bgimg-6">
    <div class="caption">
      <span class="border">Now Tayne I can get into.</span>
    </div>
  </div>

  <?php
    mysqli_close($con);
  ?>

  </body>
</html>
