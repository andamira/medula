<?php
/**
 * WPML Support Template
 *
 *      1 Custom Language Switcher
 */



/**
 * 1 Custom Language Switcher
 *
 * Shows all the languages, diferentiating between active, inactive and missing.
 *
 * @see http://wpml.org/documentation/getting-started-guide/language-setup/custom-language-switcher/
 * @see http://wpml.org/documentation/support/wpml-coding-api/
 */
function osea_wpml_switcher() {

	$languages = icl_get_languages('skip_missing=0&orderby=code');

	if( !empty( $languages ) ){

		echo '<ul id="lang_sel2">';

		foreach( $languages as $l ){

			if( !$l['active'] ){

				// Missing translation
				if($l['missing']){
					echo '<li><a style="color:#444444 !important;" title="' .
						sprintf( __( 'Not available in %1s', 'osea-theme' ),  ) .
						'" href="'.$l['url'] . '">';

				// Translation is present
				} else {
					//echo '<li><a title="'.title_from_url($l['url']).'" href="'.$l['url'].'">';
					echo '<li><a href="'.$l['url'].'">';
				}   
				echo $l['native_name'];
				echo '</a></li>';

			// Active Language (no link)
			} else {
				echo '<li><span>' . $l['native_name'] . '</span></li>';
			}
		}
		echo '</ul>';
	}   
}





