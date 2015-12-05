$(function() {

	// Handle clicks of dropdown toggle
	$('.dropdown-toggle').click(function() {
		$(this).next('.dropdown').toggle();
	});

	// Handle all other clicks
	$(document).click(function(e) {
		var target = e.target;
		if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('dropdown-toggle')) {
			$('.dropdown').hide();
		}
	})
})