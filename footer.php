<?php
	// The site's footer. Displayed at the bottom of all pages.
    //
    // Contains the following:
    // - A color selector slider.
    // - Footer text.
?>

	</div>

	<?php $magicColorManager = MagicColorManager::getInstance(); ?>

	<!-- Slider bar -->
	<div class="slider-bar m-back">
		<div class="container">
			<input id="slider-bar" type="range" data-slider-min="0" data-slider-max="<?php echo $magicColorManager->getCount()-1; ?>" data-slider-value="<?php echo $magicColorManager->getPosition(); ?>" data-slider-tooltip="hide">
		</div>
	</div>

	<!-- JavaScript for the slider -->
	<script type="text/javascript">

		// Array of colors
		var colors = [];

		// Add each color to the array
		<?php 
			$magicColors = $magicColorManager->getColors();
			foreach($magicColors as $magicColor) {
				echo 'colors.push({"name": "' . $magicColor->getName() . '", "color": "' . $magicColor->getColor() . '"}); ';
			} 
		?>

		// Create the slider bar
		jQuery('#slider-bar').slider();

		// Handle the slider bar
		jQuery('#slider-bar').on('slide', function() {

			// Change the color without sending an API call
			var col = colors[jQuery(this).val()];
			changeColors(col.name, col.color, '#ffffff');

		});

		jQuery('#slider-bar').on('slideStop', function() {

			// User released slider, send API call via AJAX
			var data = {
				id: jQuery(this).val(),
				action: 'savecolor'
			};

			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			jQuery.post(ajaxurl, data, function(response) {
				// Nothing happens
			});
			
		});

		/**
		 * Change the colors to those specified (accepts any valid CSS colors).
		 */
		function changeColors(name, color, dark)
		{
			// Set name
			jQuery('#currentColor').text(name);

			// Normal
			jQuery('.m-text').css('color', color);
			jQuery('.m-back').css('background-color', color);
			jQuery('.m-border').css('border-color', color);

			// Hover
			jQuery('.mh-text:hover').css('color', color);
			jQuery('.mh-text:focus').css('color', color);
			jQuery('.mh-back:hover').css('background-color', color);
			jQuery('.mh-back:focus').css('background-color', color);
			jQuery('.mh-border:hover').css('border-color', color);
			jQuery('.mh-border:focus').css('border-color', color);

			// Dark
			jQuery('.md-text').css('color', dark);
			jQuery('.md-back').css('background-color', dark);
			jQuery('.md-border').css('border-color', dark);

			// Hover
			jQuery('.mdh-text:hover').css('color', dark);
			jQuery('.mdh-text:focus').css('color', dark);
			jQuery('.mdh-back:hover').css('background-color', dark);
			jQuery('.mdh-back:focus').css('background-color', dark);
			jQuery('.mdh-border:hover').css('border-color', dark);
			jQuery('.mdh-border:focus').css('border-color', dark);
		}

	</script>

	<!-- Footer text -->
	<div class="container footer-text">
		<p>Current colour: <span class="m-text" id="currentColor"><?php echo $magicColorManager->getCurrent()->getName(); ?></span>.</br>Move the slider to change the colour for all users!</p>
	</div>

	<?php wp_footer(); ?>

	</body>
</html>