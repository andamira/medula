<?php
/*
 * Template for plugin Under Construction
 * @link
 *
 * This plugin is useful for hiding the website using a custom page.
 *
 * If you want that the underConstruction plugin finds this template
 * you must move it to the root of the theme, where functions.php is.
 *
 *     1 Templates:
 *
 *         1.1 Minimal HTML
 *         1.2 WordPress Template
 *         1.3 Example underConstruction
 *
 */



/**
 * 1 UNDERCONSTRUCTION TEMPLATES
 *
 * Choose a template by setting the variable below to:
 *
 *     blank | wordpress | default
 */

$medula_underconstruction_template = "blank";

switch ($medula_underconstruction_template) {

	/**
	 * 1.1 Minimal HTML5 Template
	 */
	case "blank":

?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  </body>
</html>
<?php

	break;

	/**
	 * 1.2 WordPress Template
	 */
	case "wordpress":

if ( medula_template_override('') ) { return; }

get_header('');
?>
<main role="main">
	<article>
		<header>
			<h1></h1>
		</header>
		<section>
			<p></p>
			<h2></h2>
			<p></p>
			<p></p>
		</section>
		<footer>
			<p></p>
		</footer>
	</article>
</main>
<?php
get_footer('');

	break;

	/**
	 * 1.3 Example underConstruction Page
	 */
	case default:

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php printf(__('%s is coming soon', 'medula'), the_title()); ?></title>

		<style type="text/css">
			body {
				background-color: #222222;
				color: #FFF;
			}
			.headerText {
				width: 550px;
				margin: 10% auto auto 0;
				font-size: 28px;
				text-align: center;
			}
			.bodyText {
				width: 550px;
				margin: 15px auto auto 0;
				font-size: 14px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<p class="headerText"><?php
			 echo site_url();
		?></p>
		<p class="bodyText"><?php
			printf(__('%s is coming soon', 'medula'), '');
		?></p>
	</body>
</html>

<?php

}

