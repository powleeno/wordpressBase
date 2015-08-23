<?php


// Unnecessary features removal
remove_action( 'wp_head', array($sitepress, 'meta_generator_tag' ) );
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);



// Language selector list items for menu
function base_wpml_topbar_language_selector()
{
	if (function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=1');
		if (1 < count($languages)) {
			foreach ($languages as $language) {
				if (!$language['active']) {
					echo '<li><a href="' . $language['url'] . '">' . strtoupper(base_wpml_rectify_code($language['language_code'])) . '</a></li>';
				}
			}
		}
	}
}


//
function base_wpml_active_language($fallback='en')
{
	if (function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=1');
		if (1 < count($languages)) {
			foreach ($languages as $language) {
				if ($language['active']) {
					return base_wpml_rectify_code($language['language_code']);
				}
			}
		}
	} else {
		return $fallback;
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
		$home_url = icl_get_home_url();
	} else {
		$home_url = get_site_url();
	}
	return $home_url;
}
