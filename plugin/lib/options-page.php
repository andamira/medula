<?php
/**
 * Settings Page Template
 *
 *     >------------------>
 *
 *     1 Add the menu
 *
 *         1.1 Top level menu page
 *         1.2 Sub-menu under appearance
 *
 *     2 Add the Settings
 *
 *         2.1 Register the Settings
 *         2.2 Add Sections To Settings
 *         2.3 Add Fields To The Sections
 *
 *     3 Callback Functions
 *
 *         3.1 Theme Page
 *         3.2 Display Section
 *         3.3 Display Settings
 *         3.4 Validate Settings
 *
 *     <------------------<
 *
 * @link https://codex.wordpress.org/Settings_API
 * @link https://developer.wordpress.org/plugins/settings/custom-settings-page/
 * @link https://developer.wordpress.org/reference/functions/add_options_page/
 */


/**
 * 1 ADD THE MENU
 * ************************************************************
 *
 * Use either 1.1 or 1.2 solution
 */

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page() {

	/**
	 * 1.1 TOP LEVEL MENU PAGE
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_menu_page
	 */

	/*
	add_menu_page(
		$page_title, # The title used on the settings page.
		$menu_title, # The title used on the menu.
		$capability, # Only displays the menu if the user matches this capability.
		$menu_slug,  # The unique name of the menu slug.
		$function,   # This is the callback function to run to display the page.
		$icon_url,   # Display a icon just for the menu.
		$position    # This allows you to choose when the menu item appears in the list.
	); /**/

	//add_menu_page( 'Options', 'Theme Options', 'manage_options', 'medula_theme_options.php', 'medula_theme_page', medula_get_theme_resources_uri('img') . '/favicon.png', 61 );


	/**
	 * 1.2 SUB-MENU UNDER APPEARANCE
	 */

	add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'medula_theme_options.php', 'medula_theme_page');
}


/**
 * 2 ADD THE SETTINGS
 * ************************************************************
 */

add_action( 'admin_init', 'medula_register_settings' );

function medula_register_settings() {

	/**
	 * 2.1 REGISTER THE SETTINGS
	 */

	/*
	register_setting(
		$option_group,      # The name of the group of settings you are going to store. This must match the group name used in the settings_field() function.
		$option_name,       # The name of the option which will be saved, this is the key that is used in the options table.
		$sanitize_callback, # This is the function that is used to validate the settings for this option group.
	); /**/

	register_setting( 'medula_theme_options', 'medula_theme_options', 'medula_validate_settings');


	/**
	 * 2.2 ADD SECTIONS
	 */

	/*
	add_settings_section(
		$id,       # String to use for the ID of the section.
		$title,    # The title to use on the section.
		$callback, # This is the function that will display the settings on the page.
		$page      # This is the page that is displaying the section, should match the menu slug of the page.
	); /**/

	add_settings_section( 'medula_section_example', 'Example Section', 'medula_display_section', 'medula_theme_options.php' );


	/**
	 * 2.3 ADD FIELDS
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_settings_field
	 */

	/*
	add_settings_field(
		$id,       # ID of the field
		$title,    # Title of the field.
		$callback, # Function used to display the setting. This is very important as it is used to display the input field you want.
		$page,     # Page which is going to display the field should be the same as the menu slug on the section.
		$section,  # Section Id which the field will be added to.
		$args      # Additional arguments which are passed to the callback function.
	); /**/

	// Create textbox field
	$field_args = array(
		'type'      => 'text',
		'id'        => 'example_text',
		'name'      => 'example_text',
		'desc'      => 'Example Description',
		'label_for' => 'example_text',
		'class'     => 'example-class'
	);
	add_settings_field( 'example-id', 'example title', 'medula_display_settings', 'medula_theme_options.php', 'medula_section_backgrounds', $field_args );

}


/**
 * 3 CALLBACK FUNCTIONS
 * ************************************************************
 */

/**
 * 3.1 THEME PAGE
 *
 * Callback function to the add_theme_page
 * Will display the theme options page
 */

function medula_theme_page() {

?>
	<div class="section panel">
	<h1><img src="<?php echo medula_get_plugin_resources_uri('img/logo.png'); ?>" height=24 width=24 /> <?php printf(wp_kses(__('Theme Options', 'medulap'), array())); ?></h1>
		<form method="post" enctype="multipart/form-data" action="options.php">
			<?php
			settings_fields('medula_theme_options');
			do_settings_sections('medula_theme_options.php');
			?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes', 'medulap'); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * 3.2 DISPLAY SECTION
 *
 * Function to add extra text to display on each section
 */

function medula_display_section( $section ) {

}

/**
 * 3.3 DISPLAY SETTINGS
 *
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */

function medula_display_settings( $args ) {

	extract( $args );

	$option_name = 'medula_theme_options';

	$options = get_option( $option_name );

	switch ( $type ) {
	case 'text':
		// Sanitize Input
		//$options[$id] = stripslashes($options[$id]);
		//$options[$id] = esc_attr( $options[$id]);

		echo "<input class='regular-text $class' type='text' id='$id' name='" . $option_name . "[$id]' size='100' value='" . $options[$id] . "' />";
		echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
		break;
	}
}

/**
 * 3.4 VALIDATE SETTINGS
 *
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */

function medula_validate_settings($input) {

	/*
	foreach($input as $k => $v) {
		$newinput[$k] = trim($v);

		// Check the input is a letter or a number
		if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
			$newinput[$k] = '';
		}
	}

	return $newinput;
	/**/

	return $input;
}

