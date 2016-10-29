
/**
 * Medula Main Scripts File
 * Author: andamira
 *
 *     1 jQuery(document).ready()
 *
 *         1.1 Smart Header                                 ( )
 *         1.2 Detect Conditional CSS                       ( )
 *         1.3 Scroll Offset                                (#)
 *
 *     2 Big Functions
 *
 *         2.1 Smart Header (auto hide)
 *
 *     3 Utility Functions
 *
 *         3.1 Get Viewport
 *         3.2 Throttle Resize-triggered Events
 *             with example...
 *
 *     4 Fixes
 *
 *         4.1 Skip to Content fix
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 */


/**
 * 1 DOCUMENT READY
 * ************************************************************
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {

	/**
	 * 1.1 Smart Header
	 *
	 * (Uncomment one of these lines and the function at 2.1 if you intend to use it)
	 *
	 * Define the height of chosen element in:
	 * @see /assets/theme/sass/base/_menus.scss
	 */
	medula_smart_header('body > .site-header' );
	//medula_smart_header('.site-main-nav', '.site-header-logo');


	/**
	 * 1.2 Detect Conditional CSS
	 *
	 * @see /assets/theme/sass/layout/_grid.scss
	 * @link http://adactio.com/journal/5429/
	 */
	var size = window.getComputedStyle(document.body,':after').getPropertyValue('content');
	if (size.indexOf("widescreen") !=-1) {
		// Load some more content.

	}

	/**
	 * 1.3 Scroll Offset (For Internal Links)
	 *
	 * @link http://www.abeautifulsite.net/smoothly-scroll-to-an-element-without-a-jquery-plugin-2/
	 */
	/*
	$('a[href^="#"]').on('click', function(event) {
        var header_height = $('.site-header').height() + 20; 
        var target = $(this.href);

        console.log("TEST: "+ target);

        if( target.length ) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - header_height
            }, 500); 
        }     
    });
	/**/

});


/**
 * 2 BIG FUNCTIONS
 * ************************************************************
 */

/**
 * 2.1 SMART HEADER
 * Fix Header and auto hide it on scroll down
 *
 * @param string $navbar        selector for the element
 * @param string $above Navbar  optional selector for the above element
 *
 * @see /assets/theme/sass/front/_navigation.scss
 * @link http://jsfiddle.net/mariusc23/s6mLJ/31/ Inspired by this
 */

function medula_smart_header(navbar, aboveNavbar) {

	// Variables
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;

	jQuery(navbar).addClass('smart-header');
	var navbar_height = jQuery(navbar).outerHeight(true);

	if (aboveNavbar === undefined) {
		// If there's no above element we add a special class to body
		aboveNavbar = 'body';
		aboveNavbar_height = 0;
		jQuery(aboveNavbar).addClass('smart-header-no-above');
	} else {
		var aboveNavbar_height = jQuery(aboveNavbar).outerHeight();
		jQuery(aboveNavbar).addClass('smart-header-above');
	}

	jQuery(window).scroll(function(event){
		didScroll = true;
	});

	setInterval(
		function() {
			if (didScroll) {
				hasScrolled();
				didScroll = false;
			}
		}, 250);

	function hasScrolled() {
		var st = jQuery(this).scrollTop();

		// Make sure they scroll more than delta
		if(Math.abs(lastScrollTop - st) <= delta)
			return;

		// If they scrolled down and are past the navbar, add class .scroll-down
		if (st > lastScrollTop) {

			if (st > aboveNavbar_height) {
				jQuery(navbar).addClass('hidden-top');
				jQuery(aboveNavbar).addClass('hidden-top');

				if (st > navbar_height) {
					// Scroll Down
					jQuery(navbar).removeClass('scroll-up').addClass('scroll-down');

					if (st >= navbar_height + aboveNavbar_height) {
						jQuery(navbar).addClass('hidden-bottom');
						jQuery(aboveNavbar).addClass('hidden-bottom');
					}
				}
			}

		} else {

			// Scroll Up
			if(st + jQuery(window).height() < jQuery(document).height()) {
				jQuery(navbar).removeClass('scroll-down').addClass('scroll-up');

				//if(st <= navbar_height + aboveNavbar_height) {

				if(st <= aboveNavbar_height) {
					jQuery(navbar).removeClass('hidden-bottom');
					jQuery(aboveNavbar).removeClass('hidden-bottom');

					jQuery(navbar).removeClass('hidden-top');
					jQuery(aboveNavbar).removeClass('hidden-top');
				}
				//}
			}
		}

		lastScrollTop = st;
	}
}
/**/


/**
 * 3 UTILITY FUNCTIONS
 * ************************************************************
 */

/**
 * 3.1 Get Viewport Dimensions
 *
 * returns object with viewport dimensions to match css in width and height properties
 * @link http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
 */
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],
		x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return {width:x,height:y};
}
// setting the viewport width
var viewport = updateViewportDimensions();


/**
 * 3.2 Throttle Resize-triggered Events
 *
 * Wrap your actions in this function to throttle the frequency
 * of firing them off, for better performance, esp. on mobile.
 *
 * @link http://stackoverflow.com/a/4541963/940200
 */
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/**
 * Here's an example so you can see how we're using the above function
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // update the viewport, in case the window size has changed
 *      viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * You can create functions like this to conditionally load content and other
 * stuff dependent on the viewport. Remember that mobile devices and javascript
 * aren't the best of friends. Keep it light and always make sure the larger
 * viewports are doing the heavy lifting.
 *
 */



/**
 * 4 FIXES
 * ************************************************************
 */

/**
 * 4.1 Skip to Content Fix
 *
 * Makes "skip to content" link work correctly in IE9, Chrome, and Opera
 * for better accessibility.
 *
 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
 */

( function() {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
		isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
		isIE     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( isWebkit || isOpera || isIE ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) { 
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
} )();


