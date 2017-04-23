<html>
  <head>
  </head>
  <body>
    <div id="container">
      <div class="con2">
        <?php
        //Database connection
        $con = mysqli_connect("47th.info","thinfo_user","password01","thinfo_school");

        //Retrieve the data from the database table
        $query = mysqli_query($con, "SELECT * FROM t_image");

        //Mysqli_fetch_assoc() fetches a result row as an associative array
        //$get_pic = Mysqli_fetch_assoc($query);
        ?>
        <form action="zip_download.php" method="POST">
          <table align="center" cellspacing="0" width="450" border="0">

            <?php while ($get_pic=Mysqli_fetch_assoc($query)) { ?>

              <!-- Display image name entered by user while uploading -->
              <tr>
                <td colspan="2" align="center">
                  <br>
                  <br>
                  ----------------------------------------------
                  <h2><font face="Jokerman">
                    <?php echo strtoupper($get_pic['iname']); ?>
                  </font></h2>
                </td>
              </tr>

              <!-- Display image from directory by calling its name -->
              <tr bordercolor="#FFFFFF">
                <td colspan="2" align="center">
                  <?php echo '<img src="upload/'.$get_pic['filename'].'" width="200" height="175">'; ?>

                            <br><button><a href="edit_data.php?id=<?php echo $get_pic['id']; ?>"
                                      style="text-decoration:none">Edit</a></button>
                            |

                            <button><a href="delete_data.php?id=<?php echo $get_pic['id']; ?>"
                                      style="text-decoration:none">Delete</a></button>
                            |

                            <button><a href="download_file.php?filename=<?php echo $get_pic['filename']; ?>"
                                      style="text-decoration:none">Download</a></button>

                            |

                            <input type="checkbox" name="sel_files[]" value="<?php echo $get_pic['filename']; ?>" />
                            <?php echo "Add ", $get_pic['filename'], " to zip" ; ?>


                </td>
              </tr>

              <?php } ?>
              <!-- Download as ZIP button -->
              <tr>
                <td colspan="2" align="center">
                  <br><br><input type="submit" name="download_zip" value="Download ZIP" />
                  &nbsp;
                  <input type="reset" name="reset" value="Reset" />
                </td>
              </tr>


              <?php
                mysqli_close($con);
              ?>
          </table>
        </form>
        <center>
          <h2><a href="form_upload.php">Back to Data Entry</a></h2>
        </center>
      </div>
    </div>
  </body>
</html>
