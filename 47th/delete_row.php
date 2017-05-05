<?php
 print_r($_POST);
  if(isset($_POST['delete']))
  {
    try
    {
      include 'connect.php';
      $member_id = $_POST['delete'];
      $delete_row = $db->prepare("DELETE FROM members
                                  WHERE member_id = :member
                                  LIMIT 1;");

      $delete_row->execute(array("member" => $member_id));
      header("Location:manage.php");
    }
    catch(PDOException $e)
    {
        echo 'ERROR: ' . $e->getMessage();
    }
  }

  else
  {
      echo 'This user does not exist.';
      print_r($_POST);
  }

 ?>
