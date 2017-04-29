<?php
  #Retrive username from session
  $username = $_SESSION['username'];

  #Create connection to database
  $con = mysqli_connect("localhost","root","","thinfo_final");

  //Query database for avatar filename
  $avatar = mysqli_query($con, "SELECT ava_url FROM pmp_users WHERE username = '$username'");
  $get_pic=Mysqli_fetch_assoc($avatar);
 ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="http://47th.info">47th.info</a> </div>
    <div class="navbar-header"> <a class="navbar-brand" href="manage.php">Manage</a> </div>
    <div class="navbar-header" style="float:right;"> <a class="navbar-brand" href="profile.php"><?php echo $username ?></a><img src="upload/<?php echo $get_pic['ava_url'] ?>" style="width:50px;height:50px;"></div>
  </div>
</nav>
