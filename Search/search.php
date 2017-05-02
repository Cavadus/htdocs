

<?php
	$dbhost	= 'localhost';
	$dbuser	= 'root';
	$dbpass	= '';
	$dbname	= 'live_search';
	
	global $db;
	
	$db = new mysqli();
	$db->connect($dbhost, $dbuser, $dbpass, $dbname);
	$db->set_charset("utf8");
	
	// Check connection
	if ($db->connect_errno)
	{
		printf("Connect failed: %s\n", $db->connect_error);
		exit();
	}
	
	//Define Output HTML Formating
	$html = '';
	$html .= '<li class="result">';
	$html .= '<a target="_blank" href="urlString">';
	$html .= '<h3>nameString</h3>';
	$html .= '<h4>functionString</h4>';
	$html .= '</a>';
	$html .= '</li>';
	
	// Get Search
	$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
	$search_string = $db->real_escape_string($search_string);
	
	// Check Length more than one character
	if (strlen($search_string) >= 1 && $search_string !== ' ')
	{
		// Build query
		$query = 'SELECT * FROM search WHERE function LIKE "%' . $search_string . '%" OR name LIKE "%' . $search_string . '%"';
		
		// Do search
		$result = $db->query($query);
		while($results = $result->fetch_array())
		{
			$result_array[] = $results;
		}
		
		// Check if we have results
		if (isset($result_array))
		{
			foreach ($result_array as $result)
			{
				// format output strings and highlight matches
				
				// highlight the searched query in the result
				$display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>" . $search_string . "</b>", $result['function']);
				
				$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>" . $search_string . "</b>", $result['name']);
				
				$display_url = 'http://php.net/manual-lookup.php?pattern=' . urlencode($result['function']) . '&lang=en';
				
				// insert formatted data to the $output
				
				// insert name
				$output = str_replace('nameString', $display_name, $html);
				
				// Insert function
				$output = str_replace('functionString', $display_function, $output);
				
				// insert url
				$output = str_replace('urlString', $display_url, $output);
				
				//output
				echo ($output);
			}
		}
		else
		{
			// format no results output
			$output = str_replace('urlString', 'javascript:void(0);', $html);
			$output = str_replace('nameString', '<b>No Results Found.</b>', $output);
			$output = str_replace('functionString', 'Sorry :(', $output);
			
			echo ($output);
		}
		
	}
	
	