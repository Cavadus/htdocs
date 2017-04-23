<html>

  <head>
  </head>

  <body>
    <form action="" method="post">
      <fieldset>

        <legend>Radio Button - test</legend>
        <label for="male">
          <input type="radio" value="male" name="gender" id="male" required><span>Male</span>
        </label>

        <label for="female">
          <input type="radio" value="female" name="gender" id="female" required><span>Female</span>
        </label>
        <br />
        <label for="Submit">
          <input align="middle" id="gobutton" type="submit" value="submit" name="Submit">
        </label>

      </fieldset>
    </form>
  </body>

</html>

<?php

  if (isset($_POST['submit']))
  {
    try
    {
      include('connect.php');
      $GENDER = $_POST['gender'];
      $stmt = $db->prepare("INSERT INTO t_radio(GEN)VALUES(:gen)");
      $stmt -> execute(array("gen" => $GENDER));
      echo "Process done successfully!";
    }

    catch (PDOException $e)
    {
      echo 'ERROR: ' . $e->getMessage();
    }

  }

 ?>
