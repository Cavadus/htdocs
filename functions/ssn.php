<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SSN Validation</title>
    </head>

    <body>

      <h1>SSN Validation</h1>

      <br>

      <form method="post" action="ssn.php">
        Enter your SSN:  <input name="ssn" type="text">
        <br>
        <input name = "button" type="submit" value="Submit">
      </form>

      <?php

      if (isset($_POST['ssn']))
      {
        $ssnVar = $_POST['ssn'];

        if (strlen($ssnVar) != 9)
        {
          echo "<BR><BR>Entered value: $ssnVar";
          echo "<BR><BR>This cannot be a formatted SSN.<BR>Please enter a lid 9-digit number below.";
        }

        else
        {
          echo "<BR><BR>Entered value: $ssnVar<BR><BR>";
          echo "Formatted SSN: ",substr($ssnVar, 0, 3)."-",substr($ssnVar, 3, 2)."-",substr($ssnVar, 5, 4);
          echo "<BR><BR>Thank you!  Your SSN has been successfully formatted.";
        }

      }

       ?>

    </body>
</html>
