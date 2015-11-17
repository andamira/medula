<?php
/**
 * Header Template (for Toolset Layouts)
 *
 * If you want to use Layouts, don't forget to activate
 * the theme support for Toolset in ../lib/vendor.php
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
<?php

	// Head meta and link tags can be configured in lib/head-tags.php
	// Head cleanup can be configured in lib/medula.php [5]

	wp_head();

?>
</head>

<body <?php body_class('toolset-layouts'); ?>>

	<header class="site-header" role="banner">
		<nav class="site-main-nav" role="navigation"><?php medula_site_main_nav(); ?></nav>
	</header>

	<div class="layouts-containers"> <?php // container of layouts containers ?>
