<?php session_start();   #starts the session

#check login form submitted

  if(isset($_POST['Submit']))
  {
    #define username and associated password array
    $user = array('levi' => '12345','amalan' => '123456','levi2' => '1234567');
    $admin = array('Admin' => 'Admin1');

    #check and assign submitted username and password to new variable
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    #check username and password existence in defined ArrayAccess
    if (isset($user[$Username]) && $user[$Username] == $Password)
    {
      #success: set session variables and redirect to protected password_get_info
      $_SESSION['UserData']['Username']=$user[$Username];
      header("location:index.php");
      exit;
    }

    #check username and password existence in defined array
    if (isset($admin[$Username]) && $admin[$Username] == $Password)
    {
      #success: set session variables and redirect to protected page
      $_SESSION['UserData']['Username']=$admin[$Username];
      header("location:index1.php");
      exit;
    }

    else
    {
      #unsuccessful attempt: set error message
      $msg="<span style='color:red'>Invalid login details</span>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Without Using Database</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div id="Frame0">
      <h1 align="center">PHP Login Without Using Database</h1>
    </div>

  <br>
  <form action="" method="post" name="Login_Form">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
      <?php if(isset($msg)){?>
        <tr>
          <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
        </tr>
      <?php } ?>

      <tr>
        <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
      </tr>

      <tr>
        <td align="right" valign="top">Username</td>
        <td><input name="Username" type="text" class="Input" placeholder="Enter your username" required></td>
      </tr>

      <tr>
        <td align="right">Password</td>
        <td><input name="Password" type="password" class="Input"></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
      </tr>
    </table>
  </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
