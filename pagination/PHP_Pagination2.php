<html>
  <body>
      <div id="content">
        <?php
          $host = "localhost";
          $database = "thinfo_final";
          $user = "root";
          $password = "";

          //Database Connection
          try {
            $db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
          }

          catch (PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
          }

          $start = 0;

          //Items to display per page (limit) is 10
          $limit = 10;

          //Set current page
          $current_page=1;

          //If the page number ($current_page) is set...
          if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
            $start = ($current_page-1) * $limit;
          }

          //Retrieve required number of rows from database
          $getData = $db->prepare("SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, members.last_visit, members.m_awards_display, members.m_awards FROM members INNER JOIN groups ON members.member_group_id = groups.g_id INNER JOIN pfields_content ON members.member_id = pfields_content.member_id WHERE groups.g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26) LIMIT :start, :limit;");
          $getData->bindParam(':start', $start, PDO::PARAM_INT);
          $getData->bindParam(':limit', $limit, PDO::PARAM_INT);
          $getData->execute();

          //Fetch data and display items
          while ($dispData = $getData->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr><td>".$dispData['member_id']."</td><td>".$dispData['g_title']."</td><td>".$dispData['members_display_name']."</td><td>".$dispData['title']."</td><td>".$dispData['field_17']."</td><td>".$dispData['field_18']."</td><td>".$dispData['email']."</td><td>".$dispData['last_visit']."</td><td>".$dispData['m_awards_display']."</td></tr>";
          }

          //Calculate total number of pages to display based on total number of records in database
          $data=$db->prepare('SELECT members.member_id, groups.g_title, members.members_display_name, members.title, pfields_content.field_17, pfields_content.field_18, members.email, members.last_visit, members.m_awards_display, members.m_awards FROM members INNER JOIN groups ON members.member_group_id = groups.g_id INNER JOIN pfields_content ON members.member_id = pfields_content.member_id WHERE groups.g_id IN (23, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 26);');
          $data->execute();
          $totalRecd = $data->rowCount();
          $num_of_pages = ceil($totalRecd/$limit);

          if ($current_page > 1) { ?>

            <button><a href="?page=<?php echo ($current_page+1); ?>">
              Next</a></button>

          <?php }

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
              echo "<li class='current'>".$i."</li>";
            }

            else {
              echo "<li><a href='?page=".$i."'>".$i."</a></li>";
            }
          }

          echo "</ul>";

        ?>
      </div>
  </body>
</html>
