<?php

function register_menus() {
	register_nav_menu('nav', __('Navigation Menu'));
}

add_action('init', 'register_menus');

?>