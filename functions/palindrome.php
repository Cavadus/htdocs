<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palindrome Check</title>
    </head>

    <body>

      <h1>Palindrome Check</h1>

      <br>

      <form method="post" action="palindrome.php">
        Enter a word:  <input name="word" type="text">
        <br>
        <input name = "button" type="submit" value="Submit">
      </form>

      <?php

      if (isset($_POST['word'])) {
        $word = $_POST['word'];
        $pal = strrev($word);
        $number = '/^\D+$/';

        if (preg_match($number, $word)) {
          if ($word == $pal) {
            echo "<BR><BR>Entered text = $word";
            echo "<BR>Reverse = $pal";
            echo "<BR>This string is a palindrome.<BR>Thank you!";
          }

          else {
            echo "<BR><BR>Entered text = $word";
            echo "<BR>Reverse = $pal";
            echo "<BR>This is not a palindrome.<BR>Try another word.";
          }
          
        }

        else {
          echo "<BR><BR>Entered text = $word";
          echo "<BR>Reverse = $pal";
          echo "<BR>This is not a palindrome.  You entered numbers.<BR>Try another word.";
        }

      }

       ?>

    </body>
</html>
