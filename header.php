<?php
	// Header
?>



<html>
	<head>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

		<!-- JS -->

		<!-- Other things -->
		<title>SITE TITLE HERE</title>

		<?php
			wp_head();
		?>

	</head>

	<body>

		<!-- Banner -->
		<div class="banner">
			<span class="m2-text">SITE TITLE HERE</span>
		</div>

		<?php wp_nav_menu(array(
			'menu' => 'nav-menu',
			'container_class' => 'nav m1-border'
		)); ?>