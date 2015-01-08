/**
 * Ósea Scripts File
 * Author: andamira
 *
 *		1 jQuery(document).ready()
 *		2 Big Functions
 *			2.1 Smart Header (auto hide)
 *			2.3 Swap Gravatars
 *		3 Utility Functions
 *			3.1 REM Functions
 *			3.2 IE8 polyfill
 *			3.3 Get Viewport
 *			3.4 Throttle Resize-triggered Events
 *				with example... 
 *		4 Embedded external libraries
 *			4.1 jquery.easing
 *			4.2 jQuery.fragmentScroll
 *			
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 */


/**
 * 1 DOCUMENT READY
 * ************************************************************
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {

	// Swap Gravatars (Uncomment here and the function at 2.3 if you intend to use it)
	// osea_swap_gravatars();

	/**
	 * Smart Header
	 *
	 * (Uncomment one of these lines and the function at 2.1 if you intend to use it)
	 *
	 * Define the height of chosen element in:
	 * @see /lib/sass/base/_menus.scss
	 */
	//osea_smart_header('.site-header' );
	//osea_smart_header('.site-main-nav', '.site-header-logo');


	/** 
	 * MMenu (Mobile) Menu
	 *
	 * @see http://mmenu.frebsite.nl/documentation/
	 */
	$("#mmenu").mmenu({		// OPTIONS
		// ---------------------------

		"slidingSubmenus": false,   // *true, false

		// position can be: *left, right, top, bottom (last 2 only works if zposition=front)
		// zposition can be: *back, front, side
		"offCanvas": {
			//"position": "right",
			"zposition": "front"
		},  

		// theme classes : *mm-dark, mm-light, mm-black, mm-white
		// extensions classes: mm-fullscreen, 
		"classes": "mm-light",

		//"footer": { "add": true, "title": "MENU" },
		//"header": { "title": "MENU", "add": true, "update": true }


		}, {        // CONFIGURATION
		// -------------------------

		"offCanvas": {
			"pageSelector": "#page-wrapper"
		}

	});


	// jquery.fragmentScroll
	$('body').fragmentScroll();
});


/**
 * 2 BIG FUNCTIONS
 * ************************************************************
 */

/**
 * 2.1 SMART HEADER
 * Fix Header and auto hide it on scroll down
 *
 * @param string $navbar		selector for the element
 * @param string $above Navbar	optional selector for the above element
 *
 * @see:styles /lib/sass/breakpoints/base/_menus.scss
 * @see:source http://jsfiddle.net/mariusc23/s6mLJ/31/ Inspired by this
 */

/*
function osea_smart_header(navbar, aboveNavbar) {

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
 * 2.2 SWAP GRAVATARS
 *
 * In the /lib/comments.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
 */

/*
function osea_swap_gravatars() {
	// set the viewport using the function above
	viewport = updateViewportDimensions();
	// if the viewport is tablet or larger, we load in the gravatars
	if (viewport.width >= 768) {
		jQuery('.comment img[data-gravatar]').each(function(){
			jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
		}); 
	}
}
/**/


/**
 * 3 UTILITY FUNCTIONS
 * ************************************************************
 */

/**
 * 3.1 REM functions
 *
 * @see:source http://stackoverflow.com/a/16091018/940200
 */

// Return the initial font-size of the html element 
var rem = function rem() {
	var html = document.getElementsByTagName('html')[0];
	return function () {
		return parseInt(window.getComputedStyle(html)['fontSize']);
	}
}();

// Convert pixels to rems
function px2rem(length) {
	return (parseInt(length) / rem());
}
// Convert rems to pixels
function rem2px(length) {
	return (parseFloat(length) * rem());
}


/**
 * 3.2 IE8 polyfill for GetComputed Style (for Responsive Script below)
 * If you don't want to support IE8, you can just remove this.
 */
if (!window.getComputedStyle) {
  window.getComputedStyle = function(el, pseudo) {
    this.el = el;
    this.getPropertyValue = function(prop) {
      var re = /(\-([a-z]){1})/g;
      if (prop == 'float') prop = 'styleFloat';
      if (re.test(prop)) {
        prop = prop.replace(re, function () {
          return arguments[2].toUpperCase();
        });
      }
      return el.currentStyle[prop] ? el.currentStyle[prop] : null;
    }
    return this;
  }
}


/**
 * 3.3 Get Viewport Dimensions
 *
 * returns object with viewport dimensions to match css in width and height properties
 * @see:source http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
 */
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return {width:x,height:y};
}
// setting the viewport width
var viewport = updateViewportDimensions();


/**
 * 3.4 Throttle Resize-triggered Events
 *
 * Wrap your actions in this function to throttle the frequency
 * of firing them off, for better performance, esp. on mobile.
 *
 * @see:source http://stackoverflow.com/a/4541963/940200
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
 * 4 EMBEDDED EXTERNAL LIBRARIES
 * ************************************************************
 */

/**
 * 4.1 jQuery Easing
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * @version 1.3
 * @see http://gsgd.co.uk/sandbox/jquery/easing/
 */
// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});


/**
 * 4.2 jQuery.fragmentScroll
 * 
 * Replaces the default fragment link behavior with a scroll animation.
 *
 * @version 1.2.0
 * @see:source https://github.com/miWebb/jQuery.fragmentScroll
 *
 */

(function($, window, undefined) {
	'use strict';

	$.fn.fragmentScroll = function(options) {
		// Options
		var options = $.extend({}, $.fn.fragmentScroll.defaults, options);

		// Init
		return this.each(function() {
			fragmentScroll(this, options);
		});
	}

	$.fn.fragmentScroll.defaults = {
		// Animation
		frame: 'html, body', // body for webkit browsers
		offset: 0,
		speed: 'slow',
		easing: 'swing', // http://www.easings.net

		// Options
		enableFragment: false,
		enableAnimationChain: false,

		// Events
		onStart: function() {},
		onComplete: function() {}
	}

	function fragmentScroll(element, options) {
		// On click event
		$(element).find('[href^="#"]').on('click', function(event) {
			// Prevent default behavior
			event.preventDefault();

			// Check active
			if ($(':animated').length && options.enableAnimationChain) {
				return false;
			}

			// Variables
			var fragment = this.href.substring(this.href.indexOf('#'));
			var frame = $(options.frame);

			// onStart
			if (typeof(options.onStart) == "function") {
				options.onStart.call();
			}

			// Animation
			frame.animate({
				scrollTop: $(fragment).offset().top + $(options.frame).offset().top - options.offset
			}, options.speed, options.easing);

			// onComplete
			if (typeof(options.onStart) == "function") {
				frame.promise().done(options.onComplete);
			}

			// Show fragment
			if(options.enableFragment) {
				window.location.hash = fragment;
			}
		});
	}
})(jQuery, window);


