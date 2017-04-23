<?php

  $user_pass = "user1";
  $USER = md5($user_pass);

  $admin_pass = "user2";
  $ADMIN = md5($admin_pass);

  $su_admin_pass = "user3";
  $SU_ADMIN = md5($su_admin_pass);

  echo "USER<br/>Actual password: ",$user_pass,"<br/>MD5 Password: ",$USER,"<br/><br/>";
  echo "ADMIN<br/>Actual password: ",$admin_pass,"<br/>MD5 Password: ",$ADMIN,"<br/><br/>";
  echo "SUPERADMIN<br/>Actual password: ",$su_admin_pass,"<br/>MD5 Password: ",$SU_ADMIN,"<br/><br/>";
  
?>
