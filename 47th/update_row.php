<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  if(isset($_POST['update']))
  {
    try
    {
      include 'connect.php';

      $member_id = $_POST['update'];
      $grade = $_POST['rank'];
      $name = $_POST['member_name'];
      $title = $_POST['title'];
      $vex = $_POST['vexillation'];
      $sec = $_POST['section'];
      $email = $_POST['email'];

      $edit_row = $db->prepare("UPDATE members, pfields_content
                                  INNER JOIN pfields_content ON members.member_id = pfields_content.member_id
                                SET members.member_group_id = :grade, members.members_display_name = :name, members.title = :title, pfields_content.field_17 = :vex, pfields_content.field_18 =:sec, members.email = :email
                                WHERE members.member_id = :member");

      $edit_row->execute(array("grade" => $grade,"name" => $name, "title" => $title, "vex" => $vex, "sec" => $sec, "email"=> $email, "member" => $member_id));
      header("Location:edit_row.php");
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
