<?php
  session_start();
  include('connect.php');

  if(isset($_POST['search']))
  {
    $q = $_POST["srch_query"];
    ?>

    <form method="post" action="">
      <input type="text" name="srch_query" value="<?php echo $q ?>" required>
      <input type="submit" name="search" value="Search">
    </form>

  }
