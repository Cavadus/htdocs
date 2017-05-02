
// Start ready
$(document).ready(function() {
	$('div.icon').click(function(){
		$('input#search').focus();
	});
	
	//Live search
	//on search, submit and get results
	function search()
	{
		var query_value = $('input#search').val();
		$('b#search-string').text(query_value);
		if(query_value !== '')
		{
			$.ajax(
			{
				type: "POST",
				url: "search.php",
				data: { query: query_value },
				cache: false,
				success: function(data)
				{
					$("ul#results").html(data);
				}
			}
			);
		}
		return false;
	}
	
	$("input#search").live("keyup", function(e) {
		// Set timeout
		clearTimeout($.data(this, 'timer'));
		
		// set search string
		var search_string = $(this).val();
		
		// Do search
		if (search_string == '')
		{
			$("ul#results").fadeOut();
			$('h4#results-text').fadeOut();
		}
		else
		{
			$("ul#results").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
	});
});