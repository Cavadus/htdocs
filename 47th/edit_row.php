<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  session_start();

  include 'connect.php';

  $username = $_SESSION['username'];

?>

<html lang="en">

  <head>
  	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>47th Personnel Management Portal</title>
      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </head>

  <body>

    <?php
      #Include navigation
      include 'navbar.php';

      #Verify edit button's GET value was set
      if(isset($_GET['edit']))
      {
        try
        {
          #Assign variable to edit button's GET value which is members.member_ID
          $member_id = $_GET['edit'];
          #Prepare query
          $getData = $db->prepare("SELECT members.member_id, members.member_group_id, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, from_unixtime(members.last_visit), members.m_awards_display, members.m_awards
                                    FROM members
                                      INNER JOIN groups ON members.member_group_id = groups.g_id
                                      INNER JOIN pfields_content ON members.member_id = pfields_content.member_id
                                    WHERE members.member_id = :member;");
          #Sanitize data by binding SQL variable to PHP variable
          $getData->bindParam(':member', $member_id, PDO::PARAM_INT);
          $getData->execute();

          $getRanks = $db->prepare("SELECT g_id, g_title
                                    FROM groups
                                    WHERE g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26)
                                    ORDER BY FIELD(g_id, 23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26);");
          $getRanks->execute();

        }

        catch(PDOException $e)
        {
            echo 'ERROR: ' . $e->getMessage();
        }
      }

      else
      {
          echo 'This user does not exist.';
          print_r($_GET);
      }
     ?>

      <div class="container" style='width:100%;margin:0 auto;'>
        <div class="jumbotron" style='width:80%;margin:0 auto;'>
            <div class="table-responsive">

              <table class="table" id="table">

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
                    <th>Action</th>
                  </tr>
                </thead>

              <tbody>

                <?php
                    #Print array for debugging purposes
                    #print_r($dispData = $getData->fetch(PDO::FETCH_ASSOC));

                    #Initialize arrays for Vexillation and Section dropdowns
                    $vex_array = array("v"=>"Civilian", "a"=>"Alliance", "r"=>"Reception", "1"=>"1st", "2"=>"2nd", "3"=>"3rd", "4"=>"4th", "e"=>"Reserve", "c"=>"Century", "l"=>"Legion");
                    $sec_array = array("n"=>"N/A", "a"=>"Alpha",  "b"=>"Bravo",  "c"=>"Charlie",  "d"=>"Delta",  "h"=>"HQ");

                    #Fetch data and display items
                    while ($dispData = $getData->fetch(PDO::FETCH_ASSOC)) {

                      echo "<form action='update_row.php' method='POST' style='display:inline-block;'><tr><td>"
                      .$dispData['member_id']."</td>
                      <td>
                      <select class='form-control' id='rank' name='rank'>";
                        while ($rankData = $getRanks->fetch(PDO::FETCH_ASSOC)) {

                          if($dispData['member_group_id'] == $rankData['g_id']) {
                            echo "<option value='".$rankData['g_id']."' selected>".$rankData['g_title']."</option>";
                          }

                          else {
                            echo "<option value='".$rankData['g_id']."'>".$rankData['g_title']."</option>";
                          }

                        }

                      echo "</td>

                      <td><input type='text' class='form-control' id='member_name' value='".$dispData['members_display_name']."'></td>
                      <td><input type='text' class='form-control' id='title' value='".$dispData['title']."'></td>

                      <td>
                        <select class='form-control' id='vexillation' name='vexillation'>";

                        foreach($vex_array as $x => $x_value) {

                          if($dispData['field_17'] == $x) {
                            echo "<option value='".$x."' selected>".$x_value."</option>";
                          }

                          else {
                            echo "<option value='".$x."'>".$x_value."</option>";
                          }

                        }

                      echo "</select>
                      </td>

                      <td>
                        <select class='form-control' id='section' name='section'>";

                        foreach($sec_array as $x => $x_value) {

                          if($dispData['field_18'] == $x) {
                            echo "<option value='".$x."' selected>".$x_value."</option>";
                          }

                          else {
                            echo "<option value='".$x."'>".$x_value."</option>";
                          }

                        }

                      echo "</select>
                      </td>

                      <td><input type='text' class='form-control' id='email' value='".$dispData['email']."' /></td><td>"

                      .$dispData['from_unixtime(members.last_visit)']."</td>

                      <td><button type='button' class='btn btn-success' name='award' id='award'>Awards</button></td>

                      <td><button type='submit' class='btn btn-primary' id='update' name='update' value='".$dispData['member_id']."' onclick='return confirm_update()'>Update</button>
                      </form></td></tr>";
                  }
                ?>

          </tbody>
        </table>

        </div>
      </div>
    </div>



  </body>

</html>

<!-- Modal -->
<div id="awards" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Modal Header</h4>
  </div>
  <div class="modal-body">
    <p>Some text in the modal.</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>

<script>
  function confirm_update() {
    return confirm('Are you sure you want to update this user?');
  }

  $(document).ready(function(){
    $("#award").click(function(){
        $("#awards").modal();
    });
});
</script>
