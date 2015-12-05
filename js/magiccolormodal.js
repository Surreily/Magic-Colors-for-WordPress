// Handles the magic colors modal, including AJAX.

/**
 * Array of colors to use
 */
var colors = [
	{
		"name": "Error Message Red",
		"color": "#FF4747"
	},
	{
		"name": "Old Bricks",
		"color": "#F7523F"
	},
	{
		"name": "Balance",
		"color": "#F05D37"
	},
	{
		"name": "Canyon",
		"color": "#E8682E"
	},
	{
		"name": "Not Quite Orange",
		"color": "#E07326"
	},
	{
		"name": "Earth Brown",
		"color": "#D57F2C"
	},
	{
		"name": "Wooden Surface",
		"color": "#CB8B32"
	},
	{
		"name": "Short Circuit",
		"color": "#C09737"
	},
	{
		"name": "Damp Sand",
		"color": "#B5A33D"
	},
	{
		"name": "Disgust",
		"color": "#95A73A"
	},
	{
		"name": "Sunny Day",
		"color": "#76AB37"
	},
	{
		"name": "The Other Side",
		"color": "#56AE33"
	},
	{
		"name": "Calming Green",
		"color": "#36B230"
	},
	{
		"name": "Misty Forest",
		"color": "#39B153"
	},
	{
		"name": "I Suck At Naming Colours",
		"color": "#3BAF76"
	},
	{
		"name": "Imagination",
		"color": "#3EAE99"
	},
	{
		"name": "Holiday Brochure Water",
		"color": "#40ACBC"
	},
	{
		"name": "Out After Dark",
		"color": "#559AC0"
	}
];

/**
 * Change the colors to those specified (formatted like #rrggbb).
 */
function changeColors(color, dark)
{
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