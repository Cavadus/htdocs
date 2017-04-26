<?php

  session_start();
  ob_start();

?>  


<html>

  <head>
    <title>ABC Stone Minnesota: Product Form</title>
  </head>

  <body>
    <?php
       require('connect.php')
     ?>
  </body>

</html>

<?php
  ob_end_flush();
 ?>
