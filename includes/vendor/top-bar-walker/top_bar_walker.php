<?php


/**
 * Class Name: top_bar_walker
 * GitHub URI: https://gist.github.com/mirzap/4046020
 * Description: WordPress Walker for ZURB's Foundation Top Bar. Customize the output of menus for Foundation top bar classes and add descriptions.
 * Author: Mirza Pasic - https://github.com/mirzap
 */


class top_bar_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args)
	{
		if ( has_nav_menu( 'base_menu_header' ) )
		{
			global $wp_query;

			$indent = ($depth) ? str_repeat("\t", $depth) : '';

			$class_names = $value = '';

			$classes = empty($item->classes) ? array() : (array)$item->classes;

			$classes[] = ($item->current) ? 'active' : '';
			$classes[] = ($args->has_children) ? 'has-dropdown' : '';

			$args->link_before = (in_array('section', $classes)) ? '<label>' : '';
			$args->link_after = (in_array('section', $classes)) ? '</label>' : '';
			//$output .= (in_array('section', $classes)) ? '<li class="divider"></li>' : '';

			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
			$class_names = strlen(trim($class_names)) > 0 ? ' class="' . esc_attr($class_names) . '"' : '';

			//$output .= ($depth == 0) ? $indent . '<li class="divider"></li>' : '';
			$output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

			$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

			$item_output = $args->before;
			$item_output .= (!in_array('section', $classes)) ? '<a' . $attributes . '>' : '';
			$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
			$item_output .= $args->link_after;
			$item_output .= (!in_array('section', $classes)) ? '</a>' : '';
			$item_output .= $args->after;

			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
	}

	function end_el(&$output, $item, $depth)
	{
		$output .= '</li>' . "\n";
	}

	function start_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n" . $indent . '<ul class="sub-menu dropdown">' . "\n";
	}

	function end_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth);
		$output .= $indent . '</ul>' . "\n";
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
	{
		$id_field = $this->db_fields['id'];
		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

}