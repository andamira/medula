<?php
/**
 * Navigation Menus template
 *
 *     1 Theme Support
 *
 *     2 Menus
 *
 *     3 Custom Nav Walker
 *
 * @link http://codex.wordpress.org/Navigation_Menus
 */


/**
 * 1 THEME SUPPORT
 * ************************************************************
 *
 */

add_theme_support( 'menus' );

register_nav_menus(
	array(
		'site-main-nav' => __( 'The Main Menu', 'medula-theme' ),        // main nav in header
		'site-footer-nav' => __( 'The Footer Menu', 'medula-theme' )     // links in the footer
	)
);


/**
 * 2 MENUS
 * ************************************************************
 *
 * To create a new menu:
 *  - add a new key to the register_nav_menus array, above
 *  - duplicate any of the existing menus below, and modify the values
 *  - call the function from the template you want
 */

// The Main Menu
function medula_site_main_nav() {
	wp_nav_menu(array(
		'theme_location' => 'site-main-nav',            // Must match the registered key above
		'menu' => __( 'Main Site Menu', 'medula-theme' ),
		'container' => false,
		'container_class' => '',
		'container_id' => '',
		'menu_class' => '',
		'menu_id' => '',
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0,
		'fallback_cb' => '',
		'walker' => new medula_Walker_Nav_Menu()          // Custom menu code, customizable below
	));
}

// The Footer Links
function medula_site_footer_nav() {
	wp_nav_menu(array(
		'theme_location' => 'site-footer-nav',          // Must match the registered key above
		'menu' => __( 'Site Footer Menu', 'medula-theme' ),
		'container' => false,
		'container_class' => '',
		'container_id' => '',
		'menu_class' => '',
		'menu_id' => '',
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0,
		'fallback_cb' => '',
		'walker' => '',
	));
}


/**
 * 3 CUSTOM NAV WALKER
 * ************************************************************
 *
 * Code sourced from WordPress 3.9.1
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu#Using_a_Custom_Walker_Function
 *
 * @link http://shinraholdings.com/62/custom-nav-menu-walker-function/#example-code
 * @link http://illuminatikarate.com/blog/how-to-output-custom-html-in-wordpress-menus-using-a-custom-nav-walker/
 */
class medula_Walker_Nav_Menu extends Walker {
    /**
     * What the class handles.
     *
     * @var string
     */
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );

    /**
     * Database fields to use.
     *
     * @var array
     */
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    /**
     * Starts the list before the elements are added.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start the element output.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filter the CSS class(es) applied to a menu item's <li>.
         *
         * @param array  $classes The CSS classes that are applied to the menu item's <li>.
         * @param object $item    The current menu item.
         * @param array  $args    An array of wp_nav_menu() arguments.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filter the ID applied to a menu item's <li>.
         *
         * @param string $menu_id The ID that is applied to the menu item's <li>.
         * @param object $item    The current menu item.
         * @param array  $args    An array of wp_nav_menu() arguments.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        /**
         * Filter the HTML attributes applied to a menu item's <a>.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item The current menu item.
         * @param array  $args An array of wp_nav_menu() arguments.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes $args->before, the opening <a>,
         * the menu item's title, the closing </a>, and $args->after. Currently, there is
         * no filter for modifying the opening and closing <li> for a menu item.
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Ends the element output, if needed.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Page data object. Not used.
     * @param int    $depth  Depth of page. Not Used.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }
}


