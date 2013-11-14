(function($) {
	$(window).load(function() {		
		$( "#da-thumbs > li" ).each(
			function() { $(this).hoverdir(); } 
		);
	});
})(jQuery)