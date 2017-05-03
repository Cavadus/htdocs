<?php

#Local database config
#$db_host        = 'localhost';
#$db_user        = 'root';
#$db_pass        = '';
#$db_database    = 'homework02';

#Live databcase config
$db_host        = '47th.info';
$db_user        = 'thinfo_user';
$db_pass        = 'password01';
$db_database    = 'thinfo_school';

$db = new PDO('mysql:host='.$db_host.';
              dbname='.$db_database,
              $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
