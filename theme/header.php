<?php
/**
 * Header Template
 *
 * @link https://developer.wordpress.org/reference/functions/get_header/
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
<?php

	// Head meta and link tags are configured in lib/head-tags.php
	// Head cleanup process is configured in lib/medula.php [5]

	wp_head();

?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page-wrapper">
		<a class="skip-link screen-reader-text" href="#site-content-wrapper"><?php _e( 'Skip to content', 'medula' ); ?></a>

		<header class="site-header" role="banner">

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
