<!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ie6 no-js" lang="<?php echo base_wpml_active_language(); ?>"><![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7 no-js" lang="<?php echo base_wpml_active_language(); ?>"><![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8 no-js" lang="<?php echo base_wpml_active_language(); ?>"><![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9 no-js" lang="<?php echo base_wpml_active_language(); ?>"><![endif]-->
<!--[if gt IE 9]><!-->
<html lang="<?php echo base_wpml_active_language(); ?>">
<!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
	<title><?php bloginfo('name'); ?></title>
	<?php
		// Sets favicons; place files in $path
		base_set_favicons(get_template_directory_uri() . '/images/favicon/');
		wp_head();
	?>
</head>

<body>

<header class="contain-to-grid sticky">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name">
				<h1><a href="<?php echo base_wpml_home_page_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
			</li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span><?php echo __('Menu', 'menus'); ?></span></a>
			</li>
		</ul>
		<section class="top-bar-section">
			<ul class="left">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'base_menu_header',
							'container' => '',
							'items_wrap' => '%3$s',
							'walker' => new top_bar_walker()
						)
					);
				?>
			</ul>
			<ul class="right">
				<?php echo base_wpml_topbar_language_selector(); ?>
			</ul>
		</section>
	</nav>
</header>


<!-- Welcome message ------------------------ -->
<section class="row">
	<div class="columns small-12">
		<h1><?php bloginfo('name'); ?></h1>
		<p><?php echo __('Your theme is up and running. Get developing!', 'welcome message'); ?></p>
	</div>
</section>
