<?php

/* ------------------------------------------------------------------------- */
/* Enqueue files                                                             */
/* ------------------------------------------------------------------------- */

function magic_color_scripts() {
	// jQuery
	wp_enqueue_script('jquery');

	// Bootstrap
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css', array());
	wp_enqueue_style('bootstrap_theme_css', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array());

	// Bootstrap slider
	wp_enqueue_script('bs_slider', get_template_directory_uri() . '/js/bootstrap-slider.js', array('jquery'));
	wp_enqueue_style('bs_slider_css', get_template_directory_uri() . '/css/slider.css', array());

	// Custom JS and CSS
	wp_enqueue_script('magic_color_modal', get_template_directory_uri() . '/js/magiccolormodal.js', array('bootstrap'));
	wp_enqueue_style('css', get_template_directory_uri() . '/style.css', array());
}

add_action('wp_enqueue_scripts', 'magic_color_scripts');

/* ------------------------------------------------------------------------- */
/* Walkers                                                                   */
/* ------------------------------------------------------------------------- */

include_once("inc/wp_bootstrap_navwalker.php");

/* ------------------------------------------------------------------------- */
/* Menus                                                                     */
/* ------------------------------------------------------------------------- */

function register_menus() {
	register_nav_menu('nav', __('Navigation Menu'));
}

add_action('init', 'register_menus');

/* ------------------------------------------------------------------------- */
/* AJAX                                                                      */
/* ------------------------------------------------------------------------- */

add_action('wp_ajax_savecolor', 'saveMagicColor');
add_action('wp_ajax_nopriv_savecolor', 'saveMagicColor');

/*
/* CSS colors
/* */

function custom_css() {

	// Get the curent color
	$color = get_option('magic_color_color', '#808080');

	// Create CSS
	?><style type="text/css">

		.m-text {
			color: <?php echo $color; ?>;
		}

		.m-back {
			background-color: <?php echo $color; ?>;
		}

		.m-border {
			border-color: <?php echo $color; ?>;
		}

		.mh-text:hover,
		.mh-text:focus {
			color: <?php echo $color; ?>;
		}

		.mh-back:hover,
		.mh-back:focus {
			background-color: <?php echo $color; ?>;
		}

		.mh-border:hover
		.mh-border:focus {
			border-color: <?php echo $color; ?>;
		}

	</style><?php
}
add_action('wp_head', 'custom_css');

/* ------------------------------------------------------------------------- */
/* Misc. functions                                                           */
/* ------------------------------------------------------------------------- */

include_once("inc/magiccolors.php");

?>