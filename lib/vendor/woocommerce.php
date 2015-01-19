<?php
/**
 * WooCommerce Support Template
 *
 *     1 Theme Support
 *
 *     2 Disable default stylesheet
 *
 *     3 Customizations
 *
 *         3.1 Use WC 2.0 variable price format
 *         3.2 Remove tabs from product details page
 *         3.3 Remove WooCommerce Category Product Count
 *         3.4 Remove Title Attribute from WordPress List Categories 
 *         3.5 Remove
 *         3.6 Custom Add To Cart Message
 *         3.7 Hide all or standard shipping options when free shipping is available
 *
 * NOTE: Uncomment lines starting with # to enable their actions / filters
 */


/**
 *  1 THEME SUPPORT
 *
 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 */

// Unhook of WooCommerce wrappers and hook your own
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'osea_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'osea_theme_wrapper_end', 10);

// Structure of your theme between the </head> tag (not included)
// and the main section opening tag (included)
function osea_theme_wrapper_start() {
?>
	<div id="site-content-wrapper"> <?php // in header.php ?>
		<main role="main">
<?php
}

// Structure of your theme between the main section
// closing tag (included) and the page <footer> (not included)
function osea_theme_wrapper_end() {
?>
		</main>
		<?php get_sidebar(); ?>
	</div> <?php // (#site-content-wrapper) in footer.php ?>
<?php
}

/**
 * 2 DISABLE DEFAULT STYLESHEET
 *
 * If you remove the default WooCommerce styling, you must style
 * everything yourself.
 *
 * @link http://docs.woothemes.com/document/disable-the-default-stylesheet/
 * @link http://wordpress.org/support/topic/woocommerce-21-custom-css-only-2-rows
 *
 * WooCommerce Default Style Sheets:
 * @link https://github.com/woothemes/woocommerce/tree/master/assets/css
 *
 * Example Style Sheets:
 * @link https://github.com/claudiosmweb/woocommerce-sass
 */
#add_filter( 'woocommerce_enqueue_styles', '__return_false' );


/**
 * 3 CUSTOMIZATIONS
 *
 * Several customizations, disabled by default
 */


/**
 * 3.1 Use WC 2.0 variable price format
 *
 * @link https://gist.github.com/kloon/8981075
 */
#add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
#add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
	// Main Price
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	$price = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'osea-theme' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	// Sale Price
	$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	sort( $prices );
	$saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'osea-theme' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
	if ( $price !== $saleprice ) {
		$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
	}
	return $price;
}

/**
 * 3.2 Remove tabs from product details page
 */
#add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['description'] );
	unset( $tabs['reviews'] );
	unset( $tabs['additional_information'] );

	return $tabs;
}


/**
 * 3.3 Remove WooCommerce Category Product Count
 */
#add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
	return;
}


/**
 * 3.4 Remove Title Attribute from WordPress List Categories
 * @link http://stackoverflow.com/questions/2405437/removing-title-from-wp-list-categories
 */
#add_filter('wp_list_categories', 'wp_list_categories_remove_title_attributes');
function wp_list_categories_remove_title_attributes($output) {
	$output = preg_replace('` title="(.+)"`', '', $output);
	return $output;
}


/**
 * 3.5 Remove (or modify the text from) the add to cart button.
 *
 * @link https://wordpress.org/support/topic/how-to-change-add-to-cart-button-to-a-read-more-button
 */
#remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

#add_action( 'woocommerce_after_shop_loop_item', 'osea_woocommerce_template_loop_add_to_cart', 10 );
function osea_woocommerce_template_loop_add_to_cart() {
	global $product;
	echo '<form action="' . esc_url( $product->get_permalink( $product->id ) ) . '" method="get">
		<button type="submit" class="single_add_to_cart_button button alt">' . __('View More', 'osea-theme') . '</button>
	</form>';
}


/**
 * 3.6 CUSTOM ADD TO CART MESSAGE
 *
 * @link http://stackoverflow.com/questions/21832684/alternative-for-the-wc-add-to-cart-message-hook-in-woocommerce-for-wp
 */
#add_filter( 'wc_add_to_cart_message', 'osea_custom_add_to_cart_message' );
function osea_custom_add_to_cart_message ($message) {
	$custom_message = sprintf( __('Product has been succesfully added to cart.', 'osea-theme') );

	global $is_cart_added;
	$is_cart_added = 1;

	return $custom_message;
}


/**
 * 3. Hide ALL or STANDARD shipping options when free shipping is available
 *
 * @link http://docs.woothemes.com/document/hide-other-shipping-methods-when-free-shipping-is-available/
 */

// Hide STANDARD shipping options:
#add_filter( 'woocommerce_available_shipping_methods', 'hide_standard_shipping_when_free_is_available' , 10, 1 );
function hide_standard_shipping_when_free_is_available( $available_methods ) {
	if( isset( $available_methods['free_shipping'] ) AND isset( $available_methods['flat_rate'] ) ) {
		// remove standard shipping option
		unset( $available_methods['flat_rate'] );
	}
	return $available_methods;
}

// Hide ALL shipping optins:
#add_filter( 'woocommerce_available_shipping_methods', 'hide_all_shipping_when_free_is_available' , 10, 1 );
function hide_all_shipping_when_free_is_available( $available_methods ) {
if( isset( $available_methods['free_shipping'] ) ) :

	// Get Free Shipping array into a new array
	$freeshipping = array();
	$freeshipping = $available_methods['free_shipping'];

	// Empty the $available_methods array
	unset( $available_methods );

	// Add Free Shipping back into $avaialble_methods
	$available_methods = array();
	$available_methods['free_shipping'] = $freeshipping;
endif;

return $available_methods;
}


