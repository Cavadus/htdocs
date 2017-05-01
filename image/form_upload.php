<html>
    <head>
    </head>

    <body>

      <div id="container">
        <div id="content">
          <form action="form_upload.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <table width="350" border="0" align="center">
                <legend>Data Entry
                  <tr>
                    <td><label>Image Name <span class="required">*</span></label></td>
                    <td align="center"><input type="text" name="iname" placeholder="Image Name"> </br></td>
                  </tr>

                  <tr>
                    <td><label for="file">Upload Picture:</label></td>
                    <td align="right"><input type="file" name="file" id="file"></br></td>
                  </tr>

                  <tr>
                    <td>&nbsp;</td>
                  </tr>

                  <tr>
                    <td colspan="2" align="center"><button type="submit" name="submit">Submit</button><a href="index.php?">View Data</a></td>
                  </tr>

                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>

                  <tr>
                    <td colspan="2" align="center">
                      <?php
                        if (isset($_REQUEST['submit']))
                        {
                          $con = mysqli_connect("47th.info","thinfo_user","password01","thinfo_school");

                          if (mysqli_connect_errno())
                          {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                          $iname=$_POST["iname"];
                          $file=$_FILES["file"]["name"];
                          $size = $_FILES["file"]["size"];

                          if (empty($iname) || empty($file))
                          {
                            echo "<label class='err'>All fields are required.</label>";
                          }

                          elseif ($size > 500000)
                          {
                            echo "<label class='err'>Image size must not exceed 500kB</label>";
                          }

                          $allowedExts = array("gif","jpeg","jpg","png");

                          $temp = explode(".", $_FILES["file"]["name"]);

                          $extension = end($temp);

                          //Check file extension
                          if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/txt")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] <= 500000)
                            && in_array($extension, $allowedExts))
                            {
                              if ($_FILES["file"]["error"] > 0)
                              {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                              }

                              //Checks if the specific file already exists in the directory
                              elseif (file_exists("upload/" . $_FILES["file"]["name"]))
                              {
                                echo $_FILES["file"]["name"] . "Image upload already exists.";
                              }

                              //On passing all validations, the file is moved from temproary location to the directory
                              else {
                                //The move_uploaded_file() function moves an uploaded file to a new location
                                move_uploaded_file ($_FILES["file"]["tmp_name"],
                                                    "upload/" . $_FILES["file"]["name"]);
                                //Insert the image name and file name to the database
                                mysqli_query($con, "INSERT INTO t_image (iname, filename)
                                                                  VALUES ('$iname', '$file')");

                                echo "Data entered successfully saved.";
                              }
                            }
                            //Close the DB connection
                            mysqli_close($con);
                        }
                      ?>

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
