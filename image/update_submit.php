<?php

if(isset($_REQUEST['submit']))
{
  //Requires edit_data,php, display edit_data.php elements

  //Open a new connection to MySQL server
  $con = mysqli_connect("47th.info","thinfo_user","password01","thinfo_school");

  $id = $_GET['id'];

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if (empty($_REQUEST['iname'])) {
    echo "Image name required.";
  }

  else {
    $iname = $_REQUEST['iname'];
    mysqli_query($con, "UPDATE t_image SET iname='$iname' WHERE id='$id'");
    header("Location:index.php");
  }

  #File Part
  if ($_FILES) {
    $file = $_FILES["file"]["name"];
    $size = $_FILES["file"]["size"];
  }

  #File Validation
  if ($size > 500000) {
    echo "Image size must not exceed 500kB.";
  }

  #Preparations for checking the file type
  #Store allowed extensions in array
  $allowedExts = array("gif", "jpeg", "jpg", "png");

  #Using explode function, separate the file name and its extension into idnividual elements of array $temp
  $temp = explode(".", $_FILES["file"]["name"]);

  #The end() function returns the last element of an array.  As per array $temp, First Element: File name
                                                                                #Last Element: Extension
  $extension = end($temp);

  #Check file type extension
  //Check file extension
  if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/txt")
    || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] <= 500000)
    && in_array($extension, $allowedExts)) {
      #Searches for extension value in $allowedExts array
      if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
      }

      //Checks if the specific file already exists in the directory
      elseif (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . "Image upload already exists.";
      }

      else {
        /*In passing all validations:
          1. Delete old image file;
          2. Move new image file from temporary location to directory; and
          3. Update database. */

          #To delete existing image first retrieve the file name from the database using id
          $query = mysqli_query($con, "SELECT filename FROM t_image WHERE id = '$id'");

          #Fetch result row as an associative array
          $imageFile = mysqli_fetch_assoc($query);

          #The unlink functions deletes the file
          unlink("upload/" . $imageFile['filename']);

          #Move new file to directory
          move_uploaded_file ($_FILES["file"]["tmp_name"],
                              "upload/" . $_FILES["file"]["name"]);

          #Update filename in DB
          mysqli_query($con, "UPDATE t_image SET filename = '$file' WHERE id = '$id'");
          header("Location:index.php");
      }
    }

    #Close connection to DB
    mysqli_close($con);

}
?>
