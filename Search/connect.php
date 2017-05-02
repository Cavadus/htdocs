<?php
	/* Database config */
	$db_host	= 'localhost';
	$db_user	= 'root';
	$db_pass	= '';
	$db_database= 'live_search';
	
	/* End config */
	$db = new PDO('mysql:host='.$db_host.';
					dbname='.$db_database,
					$db_user, $db_pass);
					
	if (!$db)
	{
		echo "Unable to connect to database";
	}
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>