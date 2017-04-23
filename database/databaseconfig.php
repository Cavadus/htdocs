<?php
//define database related variables
  $host = 'localhost';
  $user = 'thinfo_kavlevz';
  $pass = 'vFwP9=5M';
$database = 'thinfo_log_levi';

//try to connect to database
$dbh = new PDO('mysql:host='.$host.';
                    dbname='.$database, $user, $pass);

if(!$dbh)
{
  echo "unable to connect to database";
}

//end config

?>
