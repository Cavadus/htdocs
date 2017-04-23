<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    </head>

    <body>

      <h1>Sign up</h1>

      <br>

      <form method="post" action="signup.php">
        Username:  <input name="username" type="text">
        <br>
        <br>
        Password:  <input name="password" type="text">
        <br>
        <br>
        Email:  <input name="email" type="text">
        <br>
        <br>
        Phone #:  <input name="phone" type="text">
        <br>
        <br>
        <input name = "button" type="submit" value="Submit" />      <input type="reset" name="reset" value="Clear">
      </form>

      <?php

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $userRegex = '/^(?=.[a-zA-Z])([0-9]?[_]?.+){5,20}$/';
          $passRegex = '/^(?=.[a-zA-Z])([0-9]?[_]?.+){8,12}$/';
          $emailRegex = '/^[^@]+@[^@]+\.[^@]+$/';
          $phoneRegex = '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';
          $error = 0;


          if (!preg_match($userRegex, $username)) {
            echo "<BR><BR>Invalid username.";
            $error = $error + 1;
          }

          if (!preg_match($passRegex, $password)) {
            echo "<BR>Invalid password.";
            $error = $error + 1;
          }

          if (!preg_match($emailRegex, $email)) {
            echo "<BR>Invalid e-mail address.";
            $error = $error + 1;
          }

          if (!preg_match($phoneRegex, $phone)) {
            echo "<BR>Invalid phone number.";
            $error = $error + 1;
          }

          echo "<BR><BR>$error error(s) found.<BR>";

          if ($error == 0) {
            echo "<BR>Registration successful.<BR>Thank you.<BR>Please check your e-mail $email for confirmaton.";
          }

          if ($error != 0) {
            echo "<BR>Please fill the form out correctly and try again.";
          }
        }

       ?>

    </body>
</html>
