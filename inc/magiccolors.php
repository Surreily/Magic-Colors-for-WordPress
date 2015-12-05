<?php

	/**
	 * Manages magic colors by retrieving them, and providing a list to other 
	 * PHP functions. Uses the singleton pattern.
	 */
	class MagicColorManager {

		// Singleton instance
		private static $instance;

		/**
		 * Returns the singleton instance.
		 */
		public static function getInstance()
		{
			if (null === static::$instance)
			{
				static::$instance = new static();
			}
			return static::$instance;
		}

		/**
		 * Methods for preventing the singleton from being created/cloned.
		 */
		protected function __clone(){}
		protected function __wakeup(){}



		// Available colors
		private $colors;

		// The current color
		private $current;

		// The current position
		private $position;

		/**
		 * Constructor
		 */
		private function __construct()
		{
			// Initialize the array
			$this->colors = array();

			// Add the list of colors
			$this->colors[0] = new MagicColor("Error Message", "#FF4747", "#ffffff");
			$this->colors[1] = new MagicColor("Old Bricks", "#F7523F", "#ffffff");
			$this->colors[2] = new MagicColor("Balance", "#F05D37", "#ffffff");
			$this->colors[3] = new MagicColor("Sunset", "#E8682E", "#ffffff");
			$this->colors[4] = new MagicColor("Not Quite Orange", "#E07326", "#ffffff");
			$this->colors[5] = new MagicColor("Earth Brown", "#D57F2C", "#ffffff");
			$this->colors[6] = new MagicColor("Wooden Surface", "#CB8B32", "#ffffff");
			$this->colors[7] = new MagicColor("Short Circuit", "#C09737", "#ffffff");
			$this->colors[8] = new MagicColor("Damp Sand", "#B5A33D", "#ffffff");
			$this->colors[9] = new MagicColor("Disgust", "#95A73A", "#ffffff");
			$this->colors[10] = new MagicColor("Sunny Day", "#76AB37", "#ffffff");
			$this->colors[11] = new MagicColor("The Other Side", "#56AE33", "#ffffff");
			$this->colors[12] = new MagicColor("Calming Green", "#36B230", "#ffffff");
			$this->colors[13] = new MagicColor("Misty Forest", "#39B153", "#ffffff");
			$this->colors[14] = new MagicColor("I Suck At Naming Colours", "#3BAF76", "#ffffff");
			$this->colors[15] = new MagicColor("Imagination", "#3EAE99", "#ffffff");
			$this->colors[16] = new MagicColor("Silverado", "#40ACBC", "#ffffff");
			$this->colors[17] = new MagicColor("Out After Dark", "#559AC0", "#ffffff");
			$this->colors[18] = new MagicColor("Shadows", "#6988C4", "#ffffff");
			$this->colors[19] = new MagicColor("Dusty Terminal", "#7E75C8", "#ffffff");
			$this->colors[20] = new MagicColor("Game Boy Advance", "#9263CC", "#ffffff");
			$this->colors[21] = new MagicColor("Violence", "#AD5CAB", "#ffffff");
			$this->colors[22] = new MagicColor("Barbie Girl", "#C9558A", "#ffffff");
			$this->colors[23] = new MagicColor("Hot Pink", "#E44E68", "#ffffff");

			// Load the current color
			$this->current = $this->loadColor();

			// Set the current position
			$this->position = get_option('magic_color_id', 0);
			//foreach ($color in $this->colors)
			//{
				// Later
			//}
		}

		/**
		 * Load the current color from the database.
		 */
		public function loadColor() 
		{
			$newName = get_option('magic_color_name', $this->colors[0]->getName());
			$newColor = get_option('magic_color_color', $this->colors[0]->getColor());
			$newDark = get_option('magic_color_dark', $this->colors[0]->getDark());

			return new MagicColor($newName, $newColor, $newDark);
		}

		/**
		 * Save the given coloe to the database.
		 */
		public function saveColor($id, $color)
		{
			update_option('magic_color_id', $id);
			update_option('magic_color_name', $color->getName(), true);
			update_option('magic_color_color', $color->getColor(), true);
			update_option('magic_color_dark', $color->getDark(), true);
		}

		/**
		 * Getters for the colors and length.
		 */
		public function getColors() { return $this->colors; }
		public function getCount() { return count($this->colors); }
		public function getCurrent() { return $this->current; }
		public function getPosition() { return $this->position; }

	}

	/**
	 * A class that contains attributes required for coloring the website. The
	 * ID attribute is included to allow for quick lookup to check that a given
	 * color is valid.
	 */
	class MagicColor {

		private $name;
		private $color;
		private $dark;

		/**
		 * Constructor
		 */
		function __construct($n, $c, $d)
		{
			$this->name = $n;
			$this->color = $c;
			$this->dark = $d;
		}

		/**
		 * Getter methods
		 */
		function getName() { return $this->name; }
		function getColor() { return $this->color; }
		function getDark() { return $this->dark; }
	}

	/**
	 * AJAX function to save a color.
	 */
	function saveMagicColor() 
	{
		header('Content-Type: application/json');

		$result = array();

		// Check for ID parameter
		if (!isset($_POST['id'])) { $result['error'] = 'No ID parameter.'; }

		// If no errors so far, perform the action
		if (!isset($result['error']))
		{

			// Set the ID
			$id = $_POST['id'];

			// Get a MagicColorManager object and attempt to find the color with the matching ID
			$magicColorManager = MagicColorManager::getInstance();
			if ($id < 0 || $id >= $magicColorManager->getCount()) { $result['error'] = 'Color with the given index does not exist.'; }

			// One more error check
			if (!isset($result['error'])) 
			{
				// Set the color in the database
				$colors = $magicColorManager->getColors();
				$color = $colors[$id];
				$result['name'] = $color->getName();
				$magicColorManager->saveColor($id, $color);
				$result['success'] = 'yup!';
			}
		}

		echo json_encode($result);
		die;
	}

?>