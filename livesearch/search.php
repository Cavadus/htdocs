<?php

  $dbhost = "localhost";
  $dbname = "live_search";
  $dbuser = "root";
  $dbpass = "";

  global $db;

  $db = new msqli();
  $db->connect($dbhost, $dbname, $dbuser);
  $db->set_charset("utf8");

  if ($db->connect_errno) {
    print ("Connection failed: %s\n", $db->connect_error);
    exit();
  }

  $html = '';
  $html .= '<li class="results>';
  $html .= '<a target="_blank" href="urlString">';
  $html .= '<h3>nameString</h3>';
  $html .= '<h4>functionString</h4>';
  $html .= '</a>';
  $html .= '</li>';

  //Get search
  $search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
  $search_string = $db->real_escape_string($search_string);

  //Check length for more than one character
  if (strlen($search_string) >= 1 && $search_string !== ' ') {
    //Build query
    $query = 'SELECT * FROM search WHERE function LIKE "%'.$search_string.'%"';

    //Do search
    $result = $db->query($query);

    while ($results = $results->fetch_array()) {
      $result_array[] = $results;
    }

    //Check if we have results
    if (isset($result_array)) {
      foreach ($result_array as $result)
      {
        //Format output strings and highlight them matches
        //Highlight the searched query in the result
        $display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['function']);
        $display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['name']);
        $display_url = 'http://php.net/manual=lookup.php?pattern='.urlencode($result['function']).'&lang=en';

        //Insert formatted data to te $output
        //Insert name
        $output = str_replace('nameString', $display_name, $html);

        //Insert function
        $output = str_replace('functionString', $display_function, $output);

        //Insert url
        $output = str_replace('urlString', $display_url, $output);

        //output
        echo($output);
      }
    }

    else {
      //Format no results output
      $output = str_replace('urlString', 'javascript:void(0);', $html);
      $output = str_replace('nameString', '<b>No results found.</b>', $output);
      $output = str_replace('functionString', 'Sorry :(', $output);
    }
  }

?>
