/**
 * Gulp Configuration File
 *
 * Usage:
 *
 *     type: `gulp --dev` while developing stuff
 *     type: `gulp` for production (minified) stuff
 *     type: `gulp clean` to delete out your target res/ folders
 *
 *     Additional options:
 *
 *     --imgmin | --noimgmin     (Don't) minify images
 *     --rem2px | --norem2px     (Don't) prefix rem with pixels
 *
 *
 *     >----------------->
 *
 *     1 Global Options
 *
 *         1.1 Assets & Resources Paths
 *         1.2 Gulp Defaults
 *
 *     2 Define Sources
 *
 *         2.1 Theme Sources
 *
 *             2.1.1 Your Assets
 *             2.1.2 Vendor CSS & JS (concat)
 *             2.1.3 Vendor CSS & JS (separate)
 *
 *         2.2 Plugin Sources
 *
 *             2.2.1 Your Assets
 *             2.2.2 Vendor CSS & JS (concat)
 *             2.2.3 Vendor CSS & JS (separate)
 *
 *         2.3 Suggested Javascript Plugins
 *         2.4 Suggested PHP Plugins
 *
 *     3 Define Targets
 *
 *     4 Load Gulp Dependencies
 *
 *     5 Define Subtasks
 *
 *         5.1 Minify CSS
 *         5.2 Process Images
 *
 *     6 Define Tasks
 *
 *         6.1 Sass Compilation
 *         6.2 JS Compilation
 *         6.3 Separate vendor CSS & JS
 *         6.4 Process Images
 *         6.5 Process Fonts
 *         6.6 Clean
 *
 *     7 Configure Environment
 *
 *         7.1 CLI Parameters
 *         7.2 Default Task
 *
 *     <------------------<
 *
 * Links:
 *
 * @link https://github.com/isaacs/minimatch Syntax for Glob Matching 
 *
 */


/**
 * 1 GLOBAL OPTIONS
 * -----------------------------------------------------------
 */

/**
 * 1.1 Assets & Resources Paths
 */

var VENDOR_DL      = "bower_components/";  // folder that contains the vendor dependencies
var THEME_ASSETS   = "assets/theme/";      // folder that contains the unprocessed assets for the theme
var PLUGIN_ASSETS  = "assets/plugin/";     // folder that contains the unprocessed assets for the plugin
var THEME_RES      = "theme/res/";         // must match medula_get_theme_resources_uri() in theme/functions.php
var PLUGIN_RES     = "plugin/res/";        // must match medula_get_plugin_resources_uri() in plugin/plugin.php

/**
 * 1.2 Gulp Defaults
 *
 * NOTE: In section 7.1 you can see some CLI Parameters that modify this defaults. E.g. --dev
 */

var DEBUG_LVL          = 0;     // 0 = none | 1 = print files going through tasks pipes | 2 = also for subtasks

var IS_PRODUCTION = true;       // default task
var SASS_STYLE = 'nested';

var AUTOPREFIXER_RULES = ['last 3 versions', '> 3%', 'not ie <=10']; // https://github.com/ai/browserslist#queries

var DO_REMPIXEL        = false; // rem to pixel fallback
var DO_IMAGEMIN        = true;  // minify images?
var DO_JSMANGLE        = true;  // minify javascript?


/**
 * 2 DEFINE SOURCES
 * ------------------------------------------------------------
 */


/**
 * 2.1 THEME SOURCES
 */
var themeSource = {

	/**
	 * 2.1.1 YOUR ASSETS
	 * -----------------
	 */

	sass: [
		THEME_ASSETS + 'sass/**/[^_]*.scss',
	],
	sass_exclude: [ '', ],

	js: [
		THEME_ASSETS + 'js/main.js',
	],
	js_exclude: [ '', ],

	img: [
		THEME_ASSETS + 'img/**/*.{png,gif,jpg,jpeg,svg,ico}'
	],
	img_exclude: [ '', ],

	fonts: [
		THEME_ASSETS + 'fonts/**/*.{woff,woff2,svg,ttf,eof}'
	],
	fonts_exclude: [ '', ],


	/**
	 * 2.1.2 VENDOR JS & CSS (CONCAT)
	 * ------------------------------
	 *
	 * List of vendor files intented to be concatenated into the theme main.css
	 * and main.js, and then postprocessed. The order matters for concatenation.
	 * Note: they are included _before_ the custom styles and scripts.
	 *
	 * Install the ones you want from the root folder:
	 *     bower install PACKAGE_NAME --save-dev
	 *
	 */
	vendor: [

	/* STYLESHEET                                        PACKAGE_NAME        WEBSITE
	 * --------------------------------------------------------------------------------
		VENDOR_DL + 'reset.css/reset.css',                   // reset.css         meyerweb.com/eric/tools/css/reset
		VENDOR_DL + 'normalize-css/normalize.css',           // normalize.css     necolas.github.io/normalize.css
	 */
		VENDOR_DL + 'sanitize-css/sanitize.css',             // sanitize-css      jonathantneal.github.io/sanitize.css
		VENDOR_DL + 'modernizr/modernizr.custom.js',         // Modernizr         modernizr.com
	],
	vendor_exclude: [ '', ],
	

	/**
	 * 2.1.3 VENDOR JS & CSS (SEPARATE)
	 * --------------------------------
	 *
	 * List of vendor files intented to be (minified and) copied to the theme
	 * and plugin vendor folders, and later loaded from the php templates;
	 *
	 * You can find a list of suggested plugins in the next section 2.4.
	 *
	 * IMPORTANT: You'll have to load them from the file /theme/vendor/main.php like this:
	 *
	 *     wp_register_script( 'thatvendor-js', . medula_get_theme_resources_uri('js/vendor/thatvendor.js'), array(), '', true );
	 *
	 * or from the file /plugin/lib/vendor/main.php like this:
	 *
	 *     wp_register_script( 'thatvendor-js', medula_get_plugin_resources_uri('js/vendor/thatvendor.js'), array(), '', true );
	 */
	vendor_separate: [
		THEME_ASSETS + 'js/vendor/**/*.js',
	],
	vendor_separate_exclude: [ '', ],

};


	/**
	 * 2.3 LIST OF SUGGESTED JAVASCRIPT PLUGINS FOR COMMON NEEDS
	 *----------------------------------------------------------
	 *
	 * Here is a list of recommended vendor plugins and libraries.
	 * Install the ones you want from the root folder, like this:
	 *
	 *     bower install PACKAGE_NAME --save-dev
	 *
	 * (or use the custom bower install command when specified).
	 *
	 * For the Theme:
	 *
	 * You can copy the lines to the previous section 2.1.3 and load
	 * the libraries from /theme/vendor/main.php (section 3.1),
	 * or to the previous section 2.1.2, for concatenation.
	 *
	 * For the Plugin: TODO
	 *
	 * You can copy the lines to the previous section 2.2.3 and load
	 * the libraries from /plugin/lib/vendor/main.php,
	 * or to the previous section 2.2.2, for concatenation.
	 *
	 *
 	 * @link https://github.com/sorrycc/awesome-javascript/ Collection of browser-side js libraries
	 */

	/* NEED                                                  PACKAGE_NAME        WEBSITE
	 * ---------------------------------------------------------------------------------

	// Compatibility / Accesibility
	VENDOR_DL + 'picturefill/dist/picturefill.js',                // PictureFill       -

	// Navigation
	VENDOR_DL + 'jQuery.mmenu/dist/core/js/jquery.mmenu.min.all.js',  // MMenu    mmenu.frebsite.nl
	VENDOR_DL + 'jQuery.mmenu/dist/core/css/jquery.mmenu.all.css',

	// Maps
	VENDOR_DL + 'leaflet/dist/leaflet.js',                        // Leaflet           leafletjs.com

	// Tables
	VENDOR_DL + 'dynatable/jquery.dynatable.js',                  // Dynatable         dynatable.com
	VENDOR_DL + '/dynatable/jquery.dynatable.css',

	// Sliders / Slideshows
	VENDOR_DL + 'jquery-cycle2/build/jquery.cycle2.js',           // Cycle2            jquery.malsup.com/cycle2
	
	// Animations
	VENDOR_DL + 'snabbt.js/snabbt.js',                            // Snabbt            daniel-lundin.github.io/snabbt.js
	
	// Autocomplete
	VENDOR_DL + 'awesomeplete/awesomeplete.js',                   // Awesomeplete      leaverou.github.io/awesomplete
	VENDOR_DL + 'awesomeplete/awesomeplete.css',                  // $ bower install LeaVerou/awesomplete#gh-pages --save-dev

	// Syntax Highlighting
	VENDOR_DL + 'prism/prism.js',                                 // Prism             prismjs.com
	VENDOR_DL + 'prism/themes/prism.css',                         // $ bower install -D prism.git#gh-pages

	--- */

	
	/**
	 * 2.4 LIST OF SUGGESTED PHP PLUGINS FOR COMMON NEEDS
	 *----------------------------------------------------
	 *
	 * @link https://github.com/ziadoz/awesome-php Curated list of PHP libraries
	 */

	/* NEED                                                  PACKAGE_NAME        WEBSITE
	 * ---------------------------------------------------------------------------------

	--- */




/**
 * 3 DEFINE TARGET FOLDERS
 * ------------------------------------------------------------
 */

var target = {
	css:             THEME_RES + 'css',
	js:              THEME_RES + 'js',
	img:             THEME_RES + 'img',
	fonts:           THEME_RES + 'fonts',

	vendor_separate_css: THEME_RES + 'css/vendor',
	vendor_separate_js:  THEME_RES + 'js/vendor',
	vendor_img:      THEME_RES + 'img/vendor',
};


/**
 * 4 LOAD GULP DEPENDENCIES
 * ------------------------------------------------------------
 *
 * Don't use plugins on the blacklist:
 * @link https://github.com/gulpjs/plugins/blob/master/src/blackList.json
 */

// General
var gulp = require('gulp');
var gutil = require('gulp-util');
var debug = require('gulp-debug');
var exclude = require('gulp-ignore').exclude;
var addsrc = require('gulp-add-src');
var gulpFilter = require('gulp-filter'); // https://github.com/sindresorhus/gulp-filter/issues/67
var concat = require('gulp-concat');
var flatten = require('gulp-flatten');
var del = require('del');
var gulpif = require('gulp-if');
var lazypipe = require('lazypipe');

// CSS components
var sass = require('gulp-sass')
// var sourcemaps = require('gulp-sourcemaps'); // TODO (can't refer to sass files now bc they are outside theme)
var autoprefixer = require('gulp-autoprefixer');
var pixrem = require('gulp-pixrem');
var cssnano = require('gulp-cssnano');
var cmq = require('gulp-combine-mq');

// JS componentss
var jscs = require('gulp-jscs');
//var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');

// Images
var imagemin = require('gulp-imagemin');


/**
 * 5 DEFINE SUB-TASKS
 * ------------------------------------------------------------
 */

/**
 * 5.1 MINIFY CSS
 */
var subtask_cssnano = lazypipe()

	.pipe(function () {
		return gulpif( DEBUG_LVL > 1, debug({title: ' » cssnano:'}) );
	})

	// http://cssnano.co/options/
	.pipe( cssnano, {
		safe: true,
		discardComments: {
			removeAll: true,
		},
	});

/**
 * 5.2 PROCESS IMAGES
 */
var subtask_process_images = lazypipe()

	.pipe(function () {
		return gulpif( DEBUG_LVL > 1, debug({title: ' » images:'}) );
	})

	.pipe(imagemin)

	// .pipe(flatten)
	;


/**
 * 6 DEFINE TASKS
 * ------------------------------------------------------------
 */

/**
 * 6.1 SASS COMPILATION
 * --------------------
 */

gulp.task('compile-sass', function () {

	var filter_frontend_style = gulpFilter( ['main.css', 'src/sass/'], {restore: true} );
	var filter_css = gulpFilter( '**/*.css' );

	return gulp.src(themeSource.sass, { base: '' } )
		.pipe(exclude(themeSource.sass_exclude))

//		.pipe(IS_PRODUCTION ? gutil.noop() : sourcemaps.init() ) // --dev

		.pipe( gulpif( DEBUG_LVL > 0, debug({title: '> compile-sass:'}) ) )

		// Preprocess
		// @link https://www.npmjs.com/package/node-sass#options
		.pipe( sass({
			errLogToConsole: true,
			style: SASS_STYLE,
			precision: 10,
			indentType: 'tab',
			indentWidth: 1,
			sourceComments: false
		})).on( "error", gutil.log)

		// Prepend vendor CSS to frontend style file
		.pipe(filter_frontend_style)
			.pipe(addsrc.prepend(themeSource.vendor)) // add it before your code so it can be overruled
			.pipe(filter_css)
			//.pipe(addsrc.prepend('theme/style.css')) // prepend theme info comment
				.pipe(concat('main.css'))
		.pipe(filter_frontend_style.restore)

//		.pipe(IS_PRODUCTION ? gutil.noop() : sourcemaps.write({includeContent: false, sourceRoot: '../sass'})) // --dev

		// Postprocess
//		.pipe(cmq({	log: false })) // NOTE: no sourcemap support
		.pipe(DO_REMPIXEL ? pixrem() : gutil.noop() )
		.pipe(autoprefixer(AUTOPREFIXER_RULES))

		// Minify
		.pipe( gulpif( IS_PRODUCTION, subtask_cssnano() ) )

		.pipe(gulp.dest(target.css))
});


/**
 * 6.2 JS COMPILATION
 * ------------------
 */

gulp.task('compile-js', function () {

	var filter_js = gulpFilter( '**/*.js', {restore: true} );

	var filter_yourjs = gulpFilter( [ 'main.js', '!bower_components/**' ], {restore: true} );
	//var filter_yourjs = gulpFilter( [ '**/*.js', '!bower_components/**' ], {restore: true} ); // BUG I can't make this filters work (because of addsrc?)

	// Select the vendor files
	return gulp.src( themeSource.vendor, { base: '' } )
		.pipe(exclude(themeSource.js_exclude))

		// Select only the javascript files
		.pipe(filter_js)

			// Insert your JS code after the others
			.pipe(addsrc.append(themeSource.js))

			// Detect errors in your code only
			// TODO do this part in a different way (merge? separate streams?)
			.pipe(filter_yourjs)
				.pipe(jscs())
			.pipe(filter_yourjs.restore)

			.pipe( gulpif( DEBUG_LVL > 0, debug({title: '> compile-js:'}) ) )

			// Concatenate all in this file
			.pipe(concat('main.js')).on( "error", gutil.log)

			// Minify
			.pipe(IS_PRODUCTION ? uglify({mangle: DO_JSMANGLE}).on('error', gutil.log) : gutil.noop())

			// Save output
			.pipe(gulp.dest(target.js))

		.pipe(filter_js.restore)
});


/**
 * 6.3 SEPARATE VENDOR JS & CSS COMPILATION
 * ----------------------------------------
 */

gulp.task('compile-vendor_separate', function () {

	var filter_css = gulpFilter( '**/*.css', {restore: true} );
	var filter_js = gulpFilter( '**/*.js', {restore: true} );

	return gulp.src( themeSource.vendor_separate )
		.pipe(exclude(themeSource.vendor_separate_exclude))


		// process  JS files
		.pipe(filter_js)

			// Minify
			.pipe(IS_PRODUCTION ? uglify({mangle: DO_JSMANGLE}).on('error', gutil.log) : gutil.noop())

			// Save output
			.pipe(gulp.dest(target.vendor_separate_js))
		.pipe(filter_js.restore)


		// process CSS files
		.pipe(filter_css)

			.pipe( gulpif( DEBUG_LVL > 0, debug({title: '> compile-vendor_separate:'}) ) )

			// Postprocess
			.pipe(DO_REMPIXEL ? pixrem() : gutil.noop() )
			.pipe(autoprefixer(AUTOPREFIXER_RULES))

			// Minify
			.pipe( gulpif( IS_PRODUCTION, subtask_cssnano() ) )

			// Save output
			.pipe(gulp.dest(target.vendor_separate_css))

		.pipe(filter_css.restore)
});


/**
 * 6.4 PROCESS IMAGES
 * ------------------
 */

gulp.task('images', function(){

	var filter_img = gulpFilter( '*.{png,gif,jpg,jpeg,svg,ico}' );

	// Images
    return gulp.src(themeSource.img)
		.pipe(exclude(themeSource.images_exclude))

		.pipe( gulpif( DO_IMAGEMIN, subtask_process_images() ) )

		.pipe(gulp.dest(target.img));


	// Vendor images
    return gulp.src(themeSource.vendor)
		.pipe(addsrc.append(themeSource.vendor_separate))
		.pipe(exclude(themeSource.vendor_separate_exclude))
		.pipe(filter_img)

		.pipe( gulpif( DO_IMAGEMIN, subtask_process_images() ) )

		.pipe(gulp.dest(target.vendor_img));
});


/**
 * 6.5 PROCESS FONTS
 * -----------------
 */

gulp.task('fonts', function(){
	return gulp.src(themeSource.fonts)
		.pipe(exclude(themeSource.fonts_exclude))

		.pipe( gulpif( DEBUG_LVL > 0, debug({title: '> fonts:'}) ) )

		.pipe(flatten())

		.pipe(gulp.dest(target.fonts));
});


/**
 * 6.6 CLEAN PREVIOUSLY COMPILED RESOURCES
 * ------------------------------------------------------------
 */
gulp.task('clean', function(cb) {

	// Delete individual resources folders:
	/*
	del([
		target.css,
		target.js,
		target.img,
		target.fonts
	], cb)
	/**/

	// Delete the whole resources folder:
	del(THEME_RES, cb)

});


/**
 * 7 ENVIRONMENT, OPTIONS & DEFAULT TASK
 * ------------------------------------------------------------
 */

/**
 * 7.1 CLI PARAMETERS
 */

if(gutil.env.dev === true) {         // --dev
	IS_PRODUCTION = false;
	DO_IMAGEMIN   = false;
	SASS_STYLE = 'compressed';
}
if(gutil.env.noimgmin === true) {   // --noimgmin
	DO_IMAGEMIN = false;
}
if(gutil.env.imgmin === true) {     // --imgmin
	DO_IMAGEMIN = true;
}
if(gutil.env.norem2px === true) {   // --norem2px
	DO_REMPIXEL = false;
}
if(gutil.env.rem2px === true) {     // --rem2px
	DO_REMPIXEL = true;
}


/**
 * 7.2 DEFAULT TASK (PRODUCTION)
 */

gulp.task( 'default',
	[ 'compile-sass', 'compile-js', 'compile-vendor_separate', 'fonts', 'images' ]
);

// Default task prepared for future Gulp 4.0
/*
gulp.task( 'default-4',
	gulp.series( 'clean',
		gulp.parallel( 'compile-sass', 'compile-js', 'compile-vendor_separate', 'fonts', 'images' ),
		function() {
		}
	)
);
*/

