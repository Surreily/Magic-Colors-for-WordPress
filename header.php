<?php
	// Header
?>

<!DOCTYPE html>

<html>
	<head>

		<!-- Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Other things -->
		<title>SITE TITLE HERE</title>

		<?php wp_head(); ?>

	</head>

	<body>

		<!-- Banner -->
		<div class="banner">
			<div class="container">
				<span class="m-text">SITE TITLE HERE</span>
			</div>
		</div>

		<!-- Menu -->
		<div class="navbar navbar-default m-back" role="navigation">
			<div class="container m-back">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<?php wp_nav_menu(array(
					'menu' => 'nav-menu',
					'menu_class' => 'nav navbar-nav',
					'depth' => 2,
					'container' => 'div',
					'container_class' => 'collapse navbar-collapse m-back',
					'container_id' => 'nav-menu',
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'walker' => new wp_bootstrap_navwalker()
				)); ?>

			</div>
		</div>

		<div class="content">