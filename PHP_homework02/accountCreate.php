<?php
session_start();
ob_start();
?>

<?php
if(isset($_POST['addbtn']))
{
    $password = $_POST['password'];
    $confirmed = $_POST['confirm'];
    if($password == $confirmed)
    {
        try
        {
            require('connect.php');
            $user_pass = $_POST['password'];
            $md5pass = md5($user_pass);

            $stmt = $db->prepare("INSERT INTO data(userName,password,securityQues,securityAns)VALUES(:Username,:Password,:SecurityQ,:SecurityA)");
            $stmt->execute(array("Username" => $_POST['username'],
                                "Password" => $md5pass,
                                "SecurityQ" => $_POST['security'],
                                "SecurityA" => $_POST['answer']
                                ));
            echo "Account Created!";
        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    else
    {
        echo 'Passwords do not match!';
    }
}
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
            <div class="navbar-header"> <a class="navbar-brand" href="index.php">PHP Homework 2</a> </div>
        </div>
    </nav>

	 <?php require('connect.php') ?>

	 <div class="container">
        <div class="info">
            <div class="col-md-6 col-md-offset-3">
            <h2>Create a New Account</h2>
			<hr>
            <form id="userInput" action="" method="post">
                <div class="input-group"> <span class="input-group-addon">Username</span>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Enter your username" required> </div>
					</br>
                <div class="input-group"> <span class="input-group-addon">Password</span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required> </div>
					</br>
                <div class="input-group"> <span class="input-group-addon">Confirm Password</span>
                    <input id="confirm" type="password" class="form-control" name="confirm" placeholder="Confirm Password" required> </div>
					</br>
                <div class="input-group"> <span class="input-group-addon">Security Question</span>
                <select class="form-control" id="security" name="security" onchange="showfield(this.options[this.selectedIndex].value)" required>
                    <option selected disabled>Select your Security Question</option>
                    <option value="Your place of birth?">Your place of birth?</option>
                    <option value="Your first school?">Your first school?</option>
                    <option value="Your best friend?">Your best friend?</option>
                    <option value="Your favorite movie?">Your favorite movie?</option>
                    <option value="Your favorite Author?">Your favorite author?</option>
                    <option value="Your favorite athlete?">Your favorite athlete?</option>
                    <option value="Write your own question.">Write your own question.</option>
                </select>
                </div>
				</br>
                <div id="ownQues" class="input-group"></div>
                <div class="input-group"> <span class="input-group-addon">Answer</span>
                    <input id="password" type="text" class="form-control" name="answer" placeholder="Answer security question" required> </div>
					<hr>
                <input type="submit" name="addbtn" class="btn btn-default" value="Create Account">
            </form>
                </br>
                <a href="index.php">Back to login page</a>
            </div>
        </div>
    </div>

	<script type="text/javascript">

		function showfield(name)
        {
          if(name=='Write your own question.')document.getElementById('ownQues').innerHTML='<span class="input-group-addon">Input Question</span><input id="security" type="text" class="form-control" name="security" placeholder="Write security question" required>';
          else document.getElementById('ownQues').innerHTML='';
        }
    </script>

	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


</body>
</html>
