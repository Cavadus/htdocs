<?php
  #Retrive username from session
  $username = $_SESSION['username'];

  #Create connection to database
  $con = mysqli_connect("localhost","root","","thinfo_final");
  #$con = mysqli_connect("47th.info","thinfo_pmp","L@m;vN/CSyt>43%c","thinfo_final");

  //Query database for avatar filename
  $avatar = mysqli_query($con, "SELECT ava_url FROM pmp_users WHERE username = '$username'");
  $get_pic=Mysqli_fetch_assoc($avatar);

  mysqli_close($con);
 ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="http://47th.info"><span class="glyphicon glyphicon-share"> 47th.info</a> </div>
    <div class="navbar-header"><a class="navbar-brand" href="manage.php"><span class="glyphicon glyphicon-pencil"> Manage</a> </div>
    <div class="navbar-header" style="float:right;"><a class="navbar-brand" href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username ?> </a> <img src="upload/<?php echo $get_pic['ava_url'] ?>" style="width:50px;height:50px;"></div>
    <div class="navbar-header" style="float:right;"><a class="navbar-brand" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li></div>
  </div>
</nav>
