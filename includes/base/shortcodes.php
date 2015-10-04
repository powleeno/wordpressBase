<?php

function base_fancybox_gallery_shortcode($atts, $content = null)
{
	$parameters = shortcode_atts(array(
		'small' => '',
		'medium' => '',
		'large' => '',
		'class' => '',
		'identifier' => '',
		'ids' => '',
	), $atts, 'fancy_gallery');
	$return_html = '';
	$return_html .= '<ul class="';
	$return_html .= ($parameters['small'] != '' ? 'small-block-grid-' . $parameters['small'] . ' ' : '');
	$return_html .= ($parameters['medium'] != '' ? 'medium-block-grid-' . $parameters['medium'] . ' ' : '');
	$return_html .= ($parameters['large'] != '' ? 'large-block-grid-' . $parameters['large'] . ' ' : '');
	$return_html .= ($parameters['class'] != '' ? $parameters['class'] : '');
	$return_html .= '">';
	$id_list = explode(",", $parameters['ids']);
	foreach ($id_list as $id) {
		$item = get_post($id);
		$title = $item->post_title;
		$caption = $item->post_excerpt;
		$description = $item->post_content;
		$url = $item->guid;
		$return_html .= '<li>';
		$return_html .= '<a href="' . $url . '" class="fancybox" ';
		$return_html .= 'rel="' . $parameters['identifier'] . '" ';
		$return_html .= 'title="' . $title . '">';
		//$return_html .= 'style="background-image:url('.$url.');">';

		$return_html .= '<img src="' . $url . '" />';

		$return_html .= '</a>';
		$return_html .= '</li>';

	}
	$return_html .= '</ul>';
	return $return_html;
}

add_shortcode('fancy_gallery', 'base_fancybox_gallery_shortcode');


/** Adapted from Eric B. Dev - Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress
 *
 * Instructions:
 * [email]foo@bar.com[/email]
 * [email email='foo@bar.com']email me![/email]
 * [email email='foo@bar.com' data-update='false']<foo>Bar html -- this doesnt get touched by js </foo>[/email]
 *
 **/
function ericbdev_email_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array('email' => '', 'class' => '', 'update_text' => true), $atts));
	$classes = "js-replacer-text $class";
	$classes = trim($classes);
	$toSplit = ($email !== '' ? $email : do_shortcode($content));
	$outputContent = ($email !== '' ? do_shortcode($content) : '');
	$splitVals = explode('@', $toSplit);
	$domain = array_pop($splitVals);
	$email = $splitVals[0];
	$dataTags = '';
	$dataTags .= ($domain !== '' ? " data-domain='$domain'" : '');
	$dataTags .= ($email !== '' ? " data-extra='$email'" : '');
	$dataTags .= ($update_text !== true ? " data-update='false'" : '');
	$dataTags .= ($outputContent !== '' && $update_text === true ? " data-text='$outputContent'" : '');
	$returnContent = "<a class='$classes' href='#' $dataTags>";
	if ($update_text !== true):
		$returnContent .= $outputContent;
	else:
		$returnContent .= __('Please enable JavaScript', 'shortcodes');
	endif;
	$returnContent .= "</a>";
	return $returnContent;
}

add_shortcode('email', 'ericbdev_email_shortcode');


function base_button_shortcode($atts, $content = null)
{
	$parameters = shortcode_atts(array(
		'url' => '',
	), $atts, 'button_shortcode');
	$return_html = '';
	$return_html .= '<a href="' . $parameters['url'] . '" class="button">' . $content . '</a>';

	return $return_html;
}

add_shortcode('button', 'base_button_shortcode');


function base_row_shortcode($atts, $content = null)
{
	$return_html = '';
	$return_html .= '<div class="row">' . do_shortcode($content) . '</div>';
	return $return_html;
}

add_shortcode('row', 'base_row_shortcode');


function base_column_shortcode($atts, $content = null)
{
	$parameters = shortcode_atts(array(
		'small' => '',
		'medium' => '',
		'large' => '',
	), $atts, 'column_shortcode');
	$return_html = '';
	$return_html .= '<div class="columns ';
	$return_html .= ($parameters['small'] ? 'small-' . $parameters['small'] . ' ' : '');
	$return_html .= ($parameters['medium'] ? 'medium-' . $parameters['medium'] . ' ' : '');
	$return_html .= ($parameters['large'] ? 'large-' . $parameters['large'] . ' ' : '');
	$return_html .= '">' . do_shortcode($content) . '</div>';
	return $return_html;
}

add_shortcode('column', 'base_column_shortcode');