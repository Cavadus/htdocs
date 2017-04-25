<?php
    session_start();
    $username = $_SESSION['userName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Homework 2</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"> <a class="navbar-brand" href="index.php">PHP Homework 02</a> </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1>Welcome <?php echo $username ?>!</h1>
            <a href="logout.php">Log out</a>
        </div>
    </div>
</body>
</html>
