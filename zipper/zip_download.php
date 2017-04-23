<?php
//Initialize error holder
  $error = "";

  //Display HTML elements if required
  include ("index.php");

  if (isset($_POST['download_zip'])) {

    //Folder to load files from
    $file_folder = "files/";

    //Check if ZIP extension is available
    if (extension_loaded('zip')) {

      //Check if files are selected
      if (isset($_POST['sel_files']) and count($_POST['sel_files']) > 0) {

        //Initialize a new instance of ZipArchive by loading zip library
        $zip = new ZipArchive();

        //Setting the value of time() as zip name
        $zip_name = time().".zip";

        //Opening zip file to load files, create archive if it does not exist
        if ($zip->open($zip_name, ZIPARCHIVE::CREATE) !== TRUE) {
          $error .= "*Sorry, ZIP creation failed.<br/>";
        }

        foreach ($_POST['sel_files'] as $file) {
          //addFile - Adds a file to a ZIP archive from the given path
          $zip->addFile($file_folder.$file);
        }

        //Close the ZIP file
        $zip->close();

        if (file_exists($zip_name)) {

          //Push to download the ZIP
          header('Content-type: application/zip');

          //Current-Disposition - the name/value pair which defines attributes of file
          header('Content-Disposition: attachhment; filename="'.$zip_name.'"');

          //Reads a file and writes it to output buffer
          readfile($zip_name);

          //Remove zip file existing in temp path
          unlink($zip_name);
        }

      }

      else {
        $error .= "* Please select file to zip. <br/>";
      }

    }

    else {
      $error .= "* You don't have ZIP extension. <br/>";
    }

    if (!empty($error)) {
      ?>
      <br>
      <?php echo $error;
      ?>
    <?php } } ?>
