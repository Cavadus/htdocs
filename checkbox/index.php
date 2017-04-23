<html>

  <head>
    <meta charset=utf-8 />
    <title>Check Box</title>
    <link rel="stylesheet" type="text/css" href="">
  </head>

  <?php
  	if(isset($_POST['submit']))
  	{
  		try
  		{
  			include('connect.php');
  			$checkbox1=$_POST['cb'];

  			//Concatenate all the checked values nto a single string using implode()

  			$chk = implode(", ", $checkbox1);

  			$stmt1 = $db -> prepare('INSERT INTO t_check(flowers) VALUES(:flower)');
  			$stmt1 -> execute(array('flower' => $chk));
  			echo'<script>alert("Inserted Successfully")</script>';
  		}

  		catch(PDOException $e)
  		{
  			echo 'ERROR: '. $e->getMessage();
  		}
  	}
  ?>

  <body>

    <form action="" method="post">
      <div class="content" align="">
        <div class="box">
          <h1 class="header">Check Box - test</h1>

          <p>
            <input type="checkbox" id="c1" name="cb[]" value="Lotus">
            <label for="c1">Lotus</label>
          </p>

          <p>
            <input type="checkbox" id="c2" name="cb[]" value="Lily">
            <label for="c1">Lily</label>
          </p>

          <p>
            <input type="checkbox" id="c3" name="cb[]" value="Dalia">
            <label for="c1">Dalia</label>
          </p>
          <input type="submit" name="submit" value="SUBMIT" />
        </div>
      </div>
    </form>

  </body>

</html>
