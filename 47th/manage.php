<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    ob_start();

    if(empty($_SESSION['logged_in']))
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/personnel/index.php');
        exit;
    }

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
      include 'navbar.php';
      include 'connect.php';

      $start = 0;

      //Items to display per page (limit) is 20
      $limit = 20;

      //Set current page
      $current_page=1;

      //Search Group Variables
      $active_members = '23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21';
      $inactive_members = '26';
      $running_ranks = '';
      $search_group = $active_members;

      //If the page number ($current_page) is set...
      if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
        $start = ($current_page-1) * $limit;
      }

      //Retrieve required number of rows from database
      $getData = $db->prepare("SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, from_unixtime(members.last_visit), members.m_awards_display, members.m_awards
                              FROM members
                                INNER JOIN groups ON members.member_group_id = groups.g_id
                                INNER JOIN pfields_content ON members.member_id = pfields_content.member_id
                                WHERE groups.g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26)
                                ORDER BY members.members_display_name
                                LIMIT :start, :limit;");
      $getData->bindParam(':start', $start, PDO::PARAM_INT);
      $getData->bindParam(':limit', $limit, PDO::PARAM_INT);
      $getData->execute();


    ?>
      <div style="width:80%;margin:0 auto;">

        <form class="form-horizontal" style="width:80%;margin:0 auto;">
          <fieldset>

          <legend>Personnel Record Lookup</legend>

          <div class="row">

            <div class="col-md-2">
              <label for="group_select" class="col-md-2 control-label">Status</label>
              <br>
              <select multiple="" class="form-control" id="select">
                <option value="23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21">Active</option>
                <option value="26">Inactive</option>
              </select>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="username" class="col-md-2 control-label">Username</label>
                <br>
                <input type="text" class="form-control" id="username" placeholder="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="select" class="col-md-2 control-label">Rank</label>
                <br>
                  <select multiple="" class="form-control" id="rank" name="rank">
                    <option value="23">Tiro [E1]</option>
                    <option value="8">Miles [E2]</option>
                    <option value="9">Miles Gregarius [E3]</option>
                    <option value="10">Decanus [E4]</option>
                    <option value="11">Carian [E5]</option>
                    <option value="12">Duplicarian [E6]</option>
                    <option value="13">Triplicarian [E7]</option>
                    <option value="14">Signifer [E8]</option>
                    <option value="15">Vexillarian [O1]</option>
                    <option value="16">Tesserarian [O2]</option>
                    <option value="17">Optio [O3]</option>
                    <option value="18">Centurion [O4]</option>
                    <option value="7">Prefect [O5]</option>
                    <option value="19">Tribune [O6]</option>
                    <option value="20">Legate [O7]</option>
                    <option value="21">Praetor [O8]</option>
                    <option value="26">Veterans</option>
                  </select>
                </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <label for="select" class="col-md-1 control-label">Vexillation</label>
                <br>
                  <select multiple="" class="form-control" id="vexillation" name="vexillation">
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="r">Reception</option>
                    <option value="c">Century</option>
                    <option value="l">Legion</option>
                    <option value="e">Reserve</option>
                    <option value="a">Alliance</option>
                    <option value="v">Civilian</option>
                  </select>
                </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <label for="select" class="col-md-1 control-label">Section</label>
                <br>
                  <select multiple="" class="form-control" id="vexillation" name="vexillation">
                    <option value="h">HQ</option>
                    <option value="a">Alpha</option>
                    <option value="b">Brava</option>
                    <option value="c">Charlie</option>
                    <option value="d">Delta</option>
                    <option value="n">N/A</option>
                  </select>
              </div>
            </div>

            <div class="col-md-1 col-sm-offset-1">
              <div class="form-group">
                  <br><br>
                  <button type="submit" class="btn btn-primary">Go</button>
              </div>
            </div>

          </div>
        </fieldset>
      </form>

          <div class="table-responsive">
            <table class="table" id="table">
              <thead>
                <tr>
                  <th onclick="sortTable(0)">47ID <span class="glyphicon glyphicon-sort-by-alphabet"></span></th>
                  <th onclick="sortTable(1)">Rank/Grade <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th onclick="sortTable(2)">Name <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th onclick="sortTable(3)">Title <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th onclick="sortTable(4)">Vexillation <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th onclick="sortTable(5)">Section <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th onclick="sortTable(6)">Email <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th onclick="sortTable(7)">Last Visit <span class="glyphicon glyphicon-sort-by-alphabet"></th>
                  <th>Modify <span class="glyphicon glyphicon-edit"></th>
                </tr>
              </thead>

              <tbody>
                <?php
                    #Print array for debugging purposes
                    #print_r($dispData = $getData->fetch(PDO::FETCH_ASSOC));

                    //Fetch data and display items
                    while ($dispData = $getData->fetch(PDO::FETCH_ASSOC)) {

                      #Replace keys with human readable
                      if ($dispData['field_17'] == "c") {
                        $dispData['field_17'] = "Century";
                      }
                      if ($dispData['field_17'] == "v") {
                        $dispData['field_17'] = "Civilian";
                      }
                      if ($dispData['field_17'] == "a") {
                        $dispData['field_17'] = "Alliance";
                      }
                      if ($dispData['field_17'] == "r") {
                        $dispData['field_17'] = "Reception";
                      }
                      if ($dispData['field_17'] == "1") {
                        $dispData['field_17'] = "1st";
                      }
                      if ($dispData['field_17'] == "2") {
                        $dispData['field_17'] = "2nd";
                      }
                      if ($dispData['field_17'] == "3") {
                        $dispData['field_17'] = "3rd";
                      }
                      if ($dispData['field_17'] == "4") {
                        $dispData['field_17'] = "4th";
                      }
                      if ($dispData['field_17'] == "e") {
                        $dispData['field_17'] = "Reserve";
                      }
                      if ($dispData['field_17'] == "l") {
                        $dispData['field_17'] = "Legion";
                      }
                      if ($dispData['field_18'] == "n") {
                        $dispData['field_18'] = "N/A";
                      }
                      if ($dispData['field_18'] == "a") {
                        $dispData['field_18'] = "Alpha";
                      }
                      if ($dispData['field_18'] == "b") {
                        $dispData['field_18'] = "Bravo";
                      }
                      if ($dispData['field_18'] == "c") {
                        $dispData['field_18'] = "Charlie";
                      }
                      if ($dispData['field_18'] == "d") {
                        $dispData['field_18'] = "Delta";
                      }
                      if ($dispData['field_18'] == "h") {
                        $dispData['field_18'] = "HQ";
                      }

                    echo "<tr><td>"
                    .$dispData['member_id']."</td><td>"
                    .$dispData['g_title']."</td><td>"
                    .$dispData['members_display_name']."</td><td>"
                    .$dispData['title']."</td><td>"
                    .$dispData['field_17']."</td><td>"
                    .$dispData['field_18']."</td><td>"
                    .$dispData['email']."</td><td>"
                    .$dispData['from_unixtime(members.last_visit)']."</td><td>

                      <form action='edit_row.php' method='GET' style='display:inline-block;'>
                        <button type='submit' class='btn btn-primary' name='edit' value='".$dispData['member_id']."'>Edit</button>
                      </form>

                      <form action='delete_row.php' method='POST' style='display:inline-block;'>
                        <button type='submit' class='btn btn-danger' name='delete' value='".$dispData['member_id']."' onclick='return confirm_delete()'>Delete</button>
                      </form></td></tr>";
                    }

                    //Calculate total number of pages to display based on total number of records in database
                    $data=$db->prepare('SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, from_unixtime(members.last_visit), members.m_awards_display, members.m_awards
                                        FROM members
                                          INNER JOIN groups ON members.member_group_id = groups.g_id
                                          INNER JOIN pfields_content ON members.member_id = pfields_content.member_id
                                        WHERE groups.g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26)
                                        ORDER BY members.members_display_name;');
                    $data->execute();
                    $totalRecd = $data->rowCount();
                    $num_of_pages = ceil($totalRecd/$limit);

                  ?>
              </tbody>
            </table>

            <?php

              //If current page is less than number of pages, add next button
              if ($current_page < $num_of_pages) { ?>
                <button><a href="?page=<?php echo ($current_page+1); ?>">
                  Next</a></button>

              <?php }

              //Display all page numbers at bottom for navigation
              echo "<ul class='page'>";
              for ($i=1; $i <= $num_of_pages; $i++) {
                //Page number of currently viewed page
                if ($i == $current_page) {
                  echo "<li class='current' style='display: inline-block;padding-right:2px;'>".$i.",</li>";
                }

                else {
                  echo "<li style='display: inline-block;padding-right:2px;'><a href='?page=".$i."'>".$i."</a>,</li>";
                }
              }

              echo "</ul>";
            ?>


        </fieldset>
      </form>

        </div>




  </body>
</html>

<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("table");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.getElementsByTagName("TR");
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /*check if the two rows should switch place,
        based on the direction, asc or desc:*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        }

        else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        //Each time a switch is done, increase this count by 1:
        switchcount ++;
      }

      else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

  function confirm_delete() {
    return confirm('Are you sureyou want to delete this user?');
};
</script>

<?php
  ob_end_flush()
 ?>
