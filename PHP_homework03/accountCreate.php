<?php
  session_start();
  ob_start();

  if(isset($_POST['addbtn'])) {

    try {
        require('connect.php');

        $stmt = $db->prepare("INSERT INTO homework03(fname,lname,phone,email,ref_comp,ref_emp,ref_cus,on_job,on_det,oth_det)VALUES(:fname,:lname,:phone,:email,:ref_comp,:ref_emp,:ref_cus,:on_job,:on_det,:oth_det)");
        $stmt->execute(array("fname" => $_POST['fname'],
                            "lname" => $_POST['lname'],
                            "phone" => $_POST['phone'],
                            "email" => $_POST['email'],
                            "ref_comp" => $_POST['ref_comp'],
                            "ref_emp" => $_POST['ref_emp'],
                            "ref_cus" => $_POST['ref_cus'],
                            "on_job" => $_POST['on_job'],
                            "on_det" => $_POST['on_det'],
                            "oth_det" => $_POST['oth_det']
                            ));
        echo "Account Created!";
    }

    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Homework 03</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"> <a class="navbar-brand" href="index.php">ABC Stone Minnesota</a> </div>
        </div>
    </nav>

	 <?php require('connect.php') ?>

	 <div class="container">
        <div class="info">
            <div class="col-md-6 col-md-offset-3">
            <h2>Create a New Account</h2>
			<hr>
            <form id="userInput" action="" method="post">
                <div class="input-group"> <span class="input-group-addon">First Name</span>
                    <input id="fname" type="text" class="form-control" name="fname" placeholder="Enter your first name" class="glyphicon glyphicon-user" required> </div>
					</br>
                <div class="input-group"> <span class="input-group-addon">Last Name</span>
                    <input id="lname" type="text" class="form-control" name="lname" placeholder="Enter your last name" class="glyphicon glyphicon-user" required> </div>
					</br>
                <div class="input-group"> <span class="input-group-addon">Phone Number</span>
                    <input id="phone" type="text" class="form-control" name="phone" placeholder="Enter your phone number" class="glyphicon glyphicon-phone" required> </div>
					</br>
                <div class="input-group"> <span class="input-group-addon">E-mail</span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Enter your e-mail address" class="glyphicon glyphicon-email" required> </div>
          </br>
                <div class="input-group"> <span class="input-group-addon">How did you hear about us?</span>
                <select class="form-control" id="find" name="find" onchange="showfield1(this.options[this.selectedIndex].value)" required>
                    <option selected disabled>Please Select an Option</option>
                    <option value="Referral">Referral</option>
                    <option value="Online Search">Online Search</option>
                    <option value="Other">Other</option>
                </select>
                </div>
				</br>
                <div id="expand" class="input-group"></div>
        </br>
                <div id="option" class="input-group"></div>
					<hr>
                <input type="submit" name="addbtn" class="btn btn-default" value="Create Account">
            </form>
                </br>
                <a href="index.php">Back to Homepage</a>
            </div>
        </div>
    </div>

	<script type="text/javascript">

		function showfield1(name)
    {
      document.getElementById('option').innerHTML='';
      if(name=='Referral')document.getElementById('expand').innerHTML='<span class="input-group-addon">Select referral type:</span><select class="form-control" id="find" name="find" onchange="showfield2(this.options[this.selectedIndex].value)" required><option selected disabled>Please Select an Option</option><option value="Company">Company</option><option value="Employee">Employee</option><option value="Customer">Customer</option></select>';
      else if(name=='Online Search')document.getElementById('expand').innerHTML='<span class="input-group-addon">Are you a fabricator, installer, interior designer, or work in a kitchen/bath store?</span><select class="form-control" id="on_job" name="on_job" onchange="showfield3(this.options[this.selectedIndex].value)" required><option selected disabled>Please Select an Option</option><option value="Yes">Yes</option><option value="No">No</option></select>';
      else if(name=='Other')document.getElementById('expand').innerHTML='<span class="input-group-addon">Additional Info</span><input id="oth_det" type="text" class="form-control" name="oth_det" placeholder="Additional details">';
      else document.getElementById('expand').innerHTML='';
    }

    function showfield2(name)
    {
      document.getElementById('option').innerHTML='';
      if(name=='Company')document.getElementById('option').innerHTML='<span class="input-group-addon">Additional Info</span><input id="ref_comp" type="text" class="form-control" name="ref_comp" placeholder="Enter company name">';
      else if(name=='Employee')document.getElementById('option').innerHTML='<span class="input-group-addon">Additional Info</span><input id="ref_emp" type="text" class="form-control" name="ref_emp" placeholder="Enter employee name">';
      else if(name=='Customer')document.getElementById('option').innerHTML='<span class="input-group-addon">Additional Info</span><input id="ref_cus" type="text" class="form-control" name="ref_cus" placeholder="Enter customer name">';
      else document.getElementById('option').innerHTML='';
    }

    function showfield3(name)
    {
      document.getElementById('option').innerHTML='';
      if(name=='Yes')document.getElementById('option').innerHTML='<span class="input-group-addon">Additional Info</span><input id="on_det" type="text" class="form-control" name="on_det" placeholder="Additional details">';
      else document.getElementById('option').innerHTML='';
    }

    </script>

	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


</body>
</html>
