<!doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <title>PHP - GET Method</title>
  </head>

  <body>
    <form method="get" action="example1.php">
      1.<input type="text" name="name1"/><br>
      <?php $title=$_GET['name1'];?>
      <input type="submit" name="submit" />
    </form>

    <?php echo $title; ?>
  </body>

</html>
