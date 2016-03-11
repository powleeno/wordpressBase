<?php


// Unnecessary features removal
if (!empty($sitepress)) {
	remove_action('wp_head', array($sitepress, 'meta_generator_tag'));
}
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);


// Language selector list items for menu
function base_wpml_topbar_language_selector()
{
	if (function_exists('icl_get_languages')) {
		$base_languages = icl_get_languages('skip_missing=1');
		if (1 < count($base_languages)) {
			foreach ($base_languages as $base_language) {
				if (!$base_language['active']) {
					return '<li><a href="' . $base_language['url'] . '">' . strtoupper(base_wpml_rectify_code($base_language['language_code'])) . '</a></li>';
				}
			}
		}
	}
}


function base_wpml_active_language($base_fallback_language = 'en')
{
	if (function_exists('icl_get_languages')) {
		$base_languages = icl_get_languages('skip_missing=1');
		if (1 < count($base_languages)) {
			foreach ($base_languages as $base_language) {
				if ($base_language['active']) {
					return base_wpml_rectify_code($base_language['language_code']);
				}
			}
		}
	} else {
		return $base_fallback_language;
	}
}


function base_wpml_rectify_code($code)
{
	switch ($code) {
		case 'pt-pt':
			return 'pt';
			break;
		case 'pt-br':
			return 'pt';
			break;
		case 'zh-hans':
			return 'zh';
			break;
		case 'zh-hant':
			return 'zh';
			break;
		default:
			return $code;
	}
}


function base_wpml_home_page_url()
{
	if (function_exists('icl_get_home_url')) {
		$base_home_url = icl_get_home_url();
	} else {
		$base_home_url = get_site_url();
	}
	return $base_home_url;
}


function base_get_translated_object_id($base_object_type, $base_object_id)
{
	if (function_exists('icl_object_id')) {
		$base_translated_object_id = icl_object_id($base_object_id, $base_object_type, true);
	} else {
		$base_translated_object_id = $base_object_id;
	}
	return $base_translated_object_id;
}