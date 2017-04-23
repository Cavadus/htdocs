<?php

  $file_name=$_REQUEST['filename'];

  $file_path='upload/'.$file_name;

  output_file($file_path, $file_name);

  function output_file($file, $name, $mime_type='') {
    if(!is_readable($file)) {
      die('File not found or accessible.');
    }

    $size = filesize($file);
    $name = rawurldecode($name);

    $known_mime_types = array(
      "gif" => "image/gif",
      "jpeg" => "image/jpeg",
      "jpg" => "image/jpg",
      "pjpeg" => "image/pjpeg",
      "x-png" => "image/x-png",
      "txt" => "image/txt",
      "png" => "image/png"
    );

    $file_extension = strtolower(substr(strrchr($file, "."),1));

    if(array_key_exists($file_extension, $known_mime_types)) {
      $mime_type = $known_mime_types[$file_extension];
    }

    else {
      $mime_type="application/force-download";
    }

    header('Content-Type: ' . $mime_type);
    header('Content-Disposition: attachment; filename="'.$name.'"');
    header("Content-Length: ".$size);
    readfile($file);
  }

?>
