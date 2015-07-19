<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <title><?php bloginfo('name'); ?></title>

	<?php
    $favicon_path = $path = get_template_directory_uri().'/images/favicon/';
    set_favicons($favicon_path);
    wp_head();
    ?>
    
</head>

<body>

	<header class="contain-to-grid sticky">

		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<ul class="left">
					<?php

					$defaults = array(
						'theme_location' => 'header-menu',
						'container' => '',
						'items_wrap'    => '%3$s',
						'walker' => new Walker_Foundation_Topbar()
					);
					wp_nav_menu($defaults);
					?>
				</ul>

				<ul class="right">
					<li><a href="#">FR</a></li>
					<li><a href="#">EN</a></li>
					<li><a href="#">FR</a></li>
				</ul>

			</section>
		</nav>

	</header>
