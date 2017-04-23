<html>
  <body>
    <h3>Welcome Admin!</h3><br/>

    <table border="1" cellspacing="0" cellpadding="4"><thead>
      <tr><th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Action</th></tr></thead>
          <tbody>

        <?php include('connect.php');
          $result = $db->prepare("SELECT * FROM members ORDER BY id DESC");
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++)
          { ?>
            <tr class="record">
              <td><?php echo $row['fname']; ?></td>
              <td><?php echo $row['lname']; ?></td>
              <td><?php echo $row['age']; ?></td>
              <td><a href="editform.php?id=<?php echo $row['id']; ?>"> edit </a>&nbsp;
                | &nbsp; <a href="delete.php?id=<?php echo $row['id']; ?>"> delete </a></td>
            </tr>
        <?php  } ?>

      </tbody>
    </table><br/><a href="add.php">Add new member</a><br/>

  </body>
  
</html>
