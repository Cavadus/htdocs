<?php
if (isset($_POST['addbtn']))
{
  try {
    include('connect.php');
    $stmt = $db->prepare("INSERT INTO members(fname, lname, age)
                                      VALUES(:Fname,:Lname,;Age)");
    $stmt->execute(array("Fname" => $_POST['f_name'],
                        "Lname" => $_POST['l_name'],
                        "Age" => $_POST['e_age'],
                        ));
    echo "Registration Successful!";
  }

  catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
  }
}
?>


<form method="post" action="">
  <h3>Add an Item</h3>
  <table>
    <tr>
      <td>First Name</td>
      <td><input type="text" name="f_name"></td>
    </tr>

    <tr>
      <td>Last Name</td>
      <td><input type="text" name="l_name"></td>
    </tr>

    <tr>
      <td>Age</td>
      <td><input type="text" name="e_age"></td>
    </tr>

    <tr>
      <td></td>
      <td><input type="submit" name="addbtn" value="Add Item"></td>
    </tr>
  </table>
</form>
<a href="index.php">View</a><br />
