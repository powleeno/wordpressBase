<?php


function base_wpml_topbar_links()
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


function base_wpml_active_language($fallback='en')
{
	if (function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=1');
		if (1 < count($languages)) {
			foreach ($languages as $language) {
				if ($language['active']) {
					echo base_wpml_rectify_code($language['language_code']);
				}
			}
		}
	} else {
		echo $fallback;
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