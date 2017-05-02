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
      <div style="width:100%;">

        <form class="form-horizontal" style="width:80%;margin: 0 auto;">
        <fieldset>

          <legend>Personnel Record Lookup</legend>

          <div class="row">

            <div class="col-lg-3">
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                <br>
                <input type="text" class="form-control" id="inputEmail" placeholder="">
              </div>
            </div>

            <div class="col-lg-2">
              <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Rank</label>
                <br>
                  <select multiple="" class="form-control" id="rank" name="rank">
                    <option>Tiro [E1]</option>
                    <option>Miles [E2]</option>
                    <option>Miles Gregarius [E3]</option>
                    <option>Decanus [E4]</option>
                    <option>Carian [E5]</option>
                    <option>Duplicarian [E6]</option>
                    <option>Triplicarian [E7]</option>
                    <option>Signifer [E8]</option>
                    <option>Vexillarian [O1]</option>
                    <option>Tesserarian [O2]</option>
                    <option>Optio [O3]</option>
                    <option>Centurion [O4]</option>
                  </select>
                </div>
            </div>

            <div class="col-lg-1">
              <div class="form-group">
                <label for="select" class="col-lg-1 control-label">Vexillation</label>
                <br>
                  <select multiple="" class="form-control" id="vexillation" name="vexillation">
                    <option>HQ</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
            </div>

            <div class="col-lg-1">
              <div class="form-group">
                <label for="select" class="col-lg-1 control-label">Section</label>
                <br>
                  <select multiple="" class="form-control" id="vexillation" name="vexillation">
                    <option>HQ</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                  </select>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
              </div>
            </div>
          </div>


        </div>


      </fieldset>
    </form>

  </div>
  </body>
</html>

<?php
  ob_end_flush()
 ?>
