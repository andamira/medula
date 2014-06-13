<?
/*
 * Header template
 * 
 * Codex:
 * http://codex.wordpress.org/Function_Reference/get_header
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

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<?php // mobile meta ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="page-header" role="banner">

	<?php // to use a image just replace the bloginfo('name') with your img src ?>
	<div class="page-header-logo"><a href="<?php echo home_url(); ?>" rel="nofollow">
		<span class="website-name h1"><?php bloginfo('name'); ?></span><br>
		<span class="website-description h2"><?php bloginfo('description'); ?></span>
	</a></div>

	<nav class="page-main-nav" role="navigation"><?php osea_page_main_nav(); ?></nav>

</header>
