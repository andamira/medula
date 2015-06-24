<?php
/**
 * Header template
 * 
 * @link http://codex.wordpress.org/Function_Reference/get_header
 */
?>
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->     
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->     
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php // META THEME COLOR {@link https://github.com/whatwg/meta-theme-color} ?>
	<meta name="theme-color" content="#ffffff">

	<?php // mobile meta ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page-wrapper">

		<header class="site-header" role="banner">

			<a class="mmenu-button" href="#mmenu" >
				<i class="dashicons dashicons-menu"></i>
			</a>

			<?php // to use a image just replace the bloginfo('name') with your img src ?>
			<div class="site-header-logo"><a href="<?php echo home_url(); ?>" rel="nofollow">
				<span class="site-name"><?php bloginfo('name'); ?></span><br />
				<span class="site-description"><?php // bloginfo('description'); ?></span>
			</a></div>

			<div id="site-header-wrapper" class="site-wrapper">

				<nav class="site-main-nav" role="navigation"><?php medula_site_main_nav(); ?></nav>

			</div>

		</header>

		<div id="site-content-wrapper" class="site-wrapper">
