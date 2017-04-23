// JavaScript Document

// Start Ready
$(document).ready(function() 
{  
	$("input#search").live("keyup", function()
	{
	  /* Set the value of input search box 
	  					to the variable */
		var search_string = $(this).val();

		/* If search string is empty, 
				fade out (or hide) the result */
		if (search_string == '') 
		{
			$("ul#results").fadeOut();
			$('h4#results-text').fadeOut();
		}
		
		/* If search string is not empty, execute search 
		function and fade in (or show) the result */
		else
		{
			search_data();
			$("ul#results").fadeIn();
			$('h4#results-text').fadeIn();
		};
	}
	);
	
	
	function search_data() 
	{
		/* Get the value or input search box, 
		     and store it to the variable */
		var query_value = $('input#search').val();
		
		/* Set the text value of the variable to 
		    the search-string HTML element */
		$('b#search-string').text(query_value);
		
		if(query_value !== '')
		{
			$.ajax(
			{  
				type: "POST",
				url: "search.php",
				
			/* pass the data of variable query_value, 
			to search.php, with the name 'query'  */
				data: { query: query_value },
				
				success: function(data)
						{ 
						  $("ul#results").html(data);
						}
			});
		}
	}
});

