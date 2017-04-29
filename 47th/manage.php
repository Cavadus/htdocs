<?php
    session_start();
    ob_start();

    $username = $_SESSION['username'];
?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>47th Personnel Management Portal</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <?php
    include 'navbar.php';
   ?>

    <div class="container">
        <div class="jumbotron">
            <h1>Welcome <?php echo $username ?>!</h1>
            <br>
            <img src="upload/<?php echo $get_pic['ava_url'] ?>">
            <br>
            <a href="logout.php">Log out</a>
        </div>
    </div>
</body>
</html>

<?php
  ob_end_flush()
 ?>
