<?php

function base_get_browser_info()
{
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser_name = '';
	$browser_short = "";
	$platform = '';
	$browser_version = '';
	$pattern = '';
	//First get the platform?
	if (preg_match('/linux/i', $user_agent)) {
		$platform = 'linux';
	} elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
		$platform = 'mac';
	} elseif (preg_match('/windows|win32/i', $user_agent)) {
		$platform = 'windows';
	}
	// Next get the name of the useragent yes seperately and for good reason
	if (preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent)) {
		$browser_name = 'Internet Explorer';
		$browser_short = "IE";
	} elseif (preg_match('/Firefox/i', $user_agent)) {
		$browser_name = 'Mozilla Firefox';
		$browser_short = "Firefox";
	} elseif (preg_match('/Chrome/i', $user_agent)) {
		$browser_name = 'Google Chrome';
		$browser_short = "Chrome";
	} elseif (preg_match('/Safari/i', $user_agent)) {
		$browser_name = 'Apple Safari';
		$browser_short = "Safari";
	} elseif (preg_match('/Opera/i', $user_agent)) {
		$browser_name = 'Opera';
		$browser_short = "Opera";
	} elseif (preg_match('/Netscape/i', $user_agent)) {
		$browser_name = 'Netscape';
		$browser_short = "Netscape";
	}
	// finally get the correct version number
	$known = array('Version', $browser_short, 'other');
	$pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $user_agent, $matches)) {
		// we have no matching number just continue
	}
	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($user_agent, "Version") < strripos($user_agent, $browser_short)) {
			$browser_version = $matches['version'][0];
		} else {
			$browser_version = $matches['version'][1];
		}
	} else {
		$browser_version = $matches['version'][0];
	}
	// check if we have a number
	if ($browser_version == null || $browser_version == "") {
		$browser_version = "?";
	}
	return array(
		'userAgent' => $user_agent,
		'name' => $browser_name,
		'short' => $browser_short,
		'version' => $browser_version,
		'platform' => $platform,
		'pattern' => $pattern
	);
}

function base_browser_is_ie()
{
	$browser_info = base_get_browser_info();
	if ($browser_info['short'] == 'IE' && intval($browser_info['version']) <= 9) {
		return true;
	} else {
		return false;
	}
}