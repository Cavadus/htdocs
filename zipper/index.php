<?php
include ("connect.php");
$query = $db->prepare("SELECT * FROM upload");
$query->execute();
?>

<html>
  <body>
    <form action="zip_download.php" method="POST">
    <table>

    <?php
      while ($row1=$query->fetch(PDO::FETCH_ASSOC)) {
        $name = $row1['name']; ?>

        <tr>
          <td align="center"><input type="checkbox" name="sel_files[]" value="<?php echo $name ; ?>" /></td>
          <td><?php echo $name ; ?></td>
        </tr>

      <?php } ?>

      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="download_zip" value="Download as ZIP" />
          &nbsp;
          <input type="reset" name="reset" value="Reset" />
        </td>
      </tr>

    </table>
  </form>
  </body>
</html>
