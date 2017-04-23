<html>
  <head>
  </head>
  <body>
    <?php
      //Database connection
      $con = mysqli_connect("47th.info","thinfo_user","password01","thinfo_school");

      //Get the id of the row to be edited
      $id = $_GET['id'];

      //Retrieve
      $query = mysqli_query($con, "SELECT * FROM t_image WHERE id = $id");

      for ($i=0; $get_data=Mysqli_fetch_assoc($query); $i++)
      {
        ?>

        <div id="container">
          <div id="content">
            <form action="update_submit.php?id=<?php echo $get_data['id']; ?>" method="post" enctype="multipart/form-data">
              <fieldset>
                <table width="350" border="0" align="center">
                  <legend>Update Data
                    <tr>
                      <td>Current Image Name</td>
                      <td width="229"><input type="text" name="iname" value="<?php echo $get_data['iname']; ?>"> </br></td>
                    </tr>

                    <tr>
                      <td colspan="2"><br><br>Current Image</label></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><img src="upload/<?php echo $get_data['filename']; ?>" width="150" height="150"></td>
                    </tr>

                    <tr>
                      <td align="right"><br><input type="file" name="file" id="file"><br></td>
                    </tr>

                    <tr>
                      <td>
                        &nbsp;
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2" align="center">
                        <button name="submit">Submit</button>
                        <?php } mysqli_close($con) ; ?>
                        <br>
                        <br>
                        <a href="index.php?">View Data</a><br>
                        <a href="form_upload.php?">Add New Data</a>
                      </td>
                    </tr>

                  </legend>
                </table>
              </fieldset>
            </form>
          </div>
        </div>

  </body>
</html>
