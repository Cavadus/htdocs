<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
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
      $conn = new mysqli("localhost","root","","thinfo_final");
      #$conn = mysqli_connect("47th.info","thinfo_pmp","L@m;vN/CSyt>43%c","thinfo_final");

      $query_members = "SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, members.last_visit, members.m_awards_display, members.m_awards FROM members INNER JOIN groups ON members.member_group_id = groups.g_id INNER JOIN pfields_content ON members.member_id = pfields_content.member_id WHERE groups.g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26);";

      $query_active = "SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, members.last_visit, members.m_awards_display, members.m_awards FROM members INNER JOIN groups ON members.member_group_id = groups.g_id INNER JOIN pfields_content ON members.member_id = pfields_content.member_id WHERE groups.g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21);";

      $query_inactive ="SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18 ,members.email, members.last_visit, members.m_awards_display, members.m_awards FROM members INNER JOIN groups ON members.member_group_id = groups.g_id INNER JOIN pfields_content ON members.member_id = pfields_content.member_id WHERE groups.g_id = 26;";

      #Create connection
      $result = $conn->query($query_active);

      #Check connection

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
    ?>
      <div style="width:100%;">

        <form class="form-horizontal" style="width:80%;margin: 0 auto;">
        <fieldset>

          <legend>Personnel Record Lookup</legend>

          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label for="inputEmail" class="col-md-2 control-label">Username</label>
                <br>
                <input type="text" class="form-control" id="inputEmail" placeholder="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="select" class="col-md-2 control-label">Rank</label>
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

            <div class="col-md-1">
              <div class="form-group">
                <label for="select" class="col-md-1 control-label">Vexillation</label>
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

            <div class="col-md-1">
              <div class="form-group">
                <label for="select" class="col-md-1 control-label">Section</label>
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

            <div class="col-md-4">
              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <br>
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
              </div>
            </div>

          </div>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>47ID</th>
                  <th>Rank/Grade</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Vexillation</th>
                  <th>Section</th>
                  <th>Email</th>
                  <th>Last Visit</th>
                  <th>Awards</th>
                </tr>
              </thead>

              <tbody>
                <?php

                  if ($result->num_rows > 0) {
                    print_r($result->fetch_assoc());
                    #Output data of each row
                    while($row = $result->fetch_assoc()) {

                        if ($row['field_17'] == "e") {
                          $row['field_17'] = "Reserve";
                        }
                        
                        echo "<tr><td>".$row['member_id']."</td><td>".$row['g_title']."</td><td>".$row['members_display_name']."</td><td>".$row['title']."</td><td>".$row['field_17']."</td><td>".$row['field_18']."</td><td>".$row['email']."</td><td>".$row['last_visit']."</td><td>".$row['m_awards_display']."</td></tr>";
                    }
                  }

                  else {
                    echo "<tr><td>0 results</td></tr>";
                  }

                  $conn->close();
                 ?>
              </tbody>
            </table>
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
