<?php

#Local database config
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'thinfo_final';

#Live databcase config
#$db_host        = '47th.info';
#$db_user        = 'thinfo_pmp';
#$db_pass        = 'L@m;vN/CSyt>43%c';
#$db_database    = 'thinfo_final';

$db = new PDO('mysql:host='.$db_host.';
              dbname='.$db_database,
              $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
