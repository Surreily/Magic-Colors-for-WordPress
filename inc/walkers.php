<?php

/* ------------------------------------------------------------------------- */
/* Walker classes                                                            */
/* ------------------------------------------------------------------------- */

class Walker_Nav_Primary extends Walker_Nav_Menu {

	/*function start_lvl(&$output, $depth=0, $args=array())
	{
		// Indent
		$indent = str_repeat("\t", $depth);

		$class = 'nav-level-' . $depth;

		$output .= $indent . '<ul class="' . $class . '">';
	}

	function start_el(&$output, $item, $depth=0, $args=array(), $id=0) 
	{
		// Indent
		$indent = ($depth) ? str_repeat("\t", $depth) : "";

		$li_attributes = "";
		$classes_output = "";

		// Classes
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		/*
		$classes[] = ($args->walker->has_children) ? "nav-dropdown" : "";
		$classes[] = ($item->current || $item->current_item_ancestor) ? "nav-active" : "";
		$classes[] = "menu-item-" . $item->ID;
		if ($depth && $args->has_children)
		{
			$classes[] = 'nav-dropdown-sub';
		}
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));*/

		/*$classes_output = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

		// ID
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);

		$output .= $indent;
		$output .= '<li id="' . $id . '" class="' . $class_names . '">';
	
		// Create anchor tag
		$anchor = '<a';
		$anchor .= !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$anchor .= !empty($item->attr_target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$anchor .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$anchor .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		$anchor .= '>';

		// Item output
		$item_output = $args->before;
		$item_output .= $anchor;
		$item_output .= $args->link_before;
		$item_output .= apply_filters('the_title', $item->title, $item->ID);
		$item_output .= $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth=0, $args=array())
	{
		$output .= '</li>';
	}

	function end_lvl(&$output, $depth=0, $args=array())
	{
		$output .= '</ul>';
	}*/

	/**
	 * Starts a list of menu items.
	 */
	function start_lvl(&$output, $depth=0, $args=array())
	{
		// Indent the code
		$indent = str_repeat("\t", $depth);

		// Determine the classes to use
		$classes = array();
		$classes[] = "nav-list";
		if ($depth == 1) $classes[] = "dropdown";
		$classes_o = (count($classes) > 0) ? " class=\"" . join(' ', $classes) . "\"" : "";

		// Append to the output
		$output .= "\n$indent<ul$classes_o>";
	}

	/**
	 * Ends a list of menu items.
	 */
	function end_lvl(&$output, $depth=0, $args=array())
	{
		// Indent the code
		$indent = str_repeat("\t", $depth);

		// Append to the output
		$output .= "$indent</ul>";
	}

	/**
	 * Begins a list item.
	 */
	function start_el(&$output, $item, $depth=0, $args=array(), $id=0)
	{
		// Indent the code
		$indent = str_repeat("\t", $depth);

		// Determine the classes to use
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		if ($args->walker->has_children) $classes[] = "dropdown-toggle";
		if ($item->current || $item->current_item_ancestor) $classes[] = "nav-active";
		$classes[] = "menu-item-" . $item->ID;
		$classes_o = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

		// ID
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);

		// Append to output
		$output .= $indent;
		$output .= '<li id="' . $id . '" class="' . $classes_o . '">';
	
		// Create anchor tag
		$anchor = '<a';
		$anchor .= !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$anchor .= !empty($item->attr_target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$anchor .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$anchor .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		$anchor .= '>';

		// Generate link
		$item_output = $args->before;
		$item_output .= $anchor;
		$item_output .= $args->link_before;
		$item_output .= apply_filters('the_title', $item->title, $item->ID);
		$item_output .= $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		// Append to output
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

?>