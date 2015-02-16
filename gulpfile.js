// Install dependencies:
//
//         sudo npm install -g gulp bower
//         npm install
//         bower install
//
// Usage:
//
//      type "gulp" for production (minified) stuff
//      type "gulp --dev" for dev stuff
//      type "gulp clean" to delete/clean out your target folders.
//
// INFO:
// See https://github.com/isaacs/minimatch for glob matching syntax info
//
// TODO: jshint, sourcemaps, browserify, livereload...
//


// GLOBAL OPTIONS
// -----------------------------------------------------------
autoprefixer_rules = 'ie >= 8, > 5%, last 3 versions';
remPixelFallback = true;
jsMangle = true;


// DEFINE SOURCES AND TARGETS
// ------------------------------------------------------------

var source = {

	// YOUR ASSETS
	// ===========

	// Sass
	sass: [
		'src/sass/**/[^_]*.scss',
	],
	sass_exclude: [ '', ],

	// javascript
	js: [
		'src/js/main.js',
	],
	js_exclude: [ '', ],

	// Images
	img: ['src/img/**/*.{png,gif,jpg,jpeg,svg,ico}'],
	img_exclude: [ '', ],

	// Fonts
	fonts: ['src/fonts/**/*.{woff,woff2,svg,ttf,eof}'],
	fonts_exclude: [ '', ],


	// VENDOR JS & CSS (INTENDED TO BE CONCATENATED AND POSTPROCESSED)
	// =====================================================================
	// (you can also add images and they will be copied to theme/img/vendor)
	//
	// Warning: Order of files is important for concatenation. (TODO)
	//
	// Here you have some suggested plugins. You can install
	// the ones you want. From the root of the project type:
	//
	//     bower install PLUGINNAME --save-dev
	//
	vendor: [
		'vendor-dl/normalize.css/normalize.css',
		'vendor-dl/modernizr/modernizr.js',

		// Recommended Plugins:
		// --------------------

		'vendor-dl/jQuery.mmenu/src/js/jquery.mmenu.min.all.js',  // Mobile-App Menus      mmenu.frebsite.nl
		'vendor-dl/jQuery.mmenu/src/css/jquery.mmenu.all.css',

		// 'vendor-dl/leaflet/dist/leaflet.js',                   // Interactive Maps      leafletjs.com

		// 'vendor-dl/dynatable/jquery.dynatable.js',             // Interactive Table     dynatable.com
		// 'vendor-dl/dynatable/jquery.dynatable.css',

		// 'vendor-dl/jquery-cycle2/build/jquery.cycle2.js',      // Slideshow plugin      jquery.malsup.com/cycle2
	],
	vendor_exclude: [ '', ],
	

	// VENDOR JS & CSS (INTENDED TO BE LOADED LIVE FROM WORDPRESS)
	// =====================================================================
	// (you can also add images and they will be copied to theme/img/vendor)
	//
	// They will be (minified and) copied to /theme/[js|css]/vendor/
	// You'll have to load them from WordPress php files, usually like this:
	//
	//     wp_register_script( 'thatvendor-js', get_stylesheet_directory_uri() . '/js/vendor/thatvendor.js', array( 'jquery' ), '', true );
	//
	vendor_live: [

		// IE8 COMPAT (loaded from theme/header.php)
		'vendor-dl/nwmatcher/src/nwmatcher.js',
		'vendor-dl/respond/dest/respond.min.js',
		'vendor-dl/selectivizr/selectivizr.js',
	],
	vendor_live_exclude: [ '', ],

};


var target = {
	css: 'theme/css',
	js: 'theme/js',

	vendor_live_js: 'theme/js/vendor/',
	vendor_live_css: 'theme/css/vendor/',

	fonts: 'theme/fonts',
	img: 'theme/img',
	vendor_img: 'theme/img/vendor',
};



// LOAD DEPENDENCIES
// ------------------------------------------------------------

// General
var gulp = require('gulp');
var gutil = require('gulp-util');
var print = require('gulp-print');
var exclude = require('gulp-ignore').exclude;
var addsrc = require('gulp-add-src');
var gulpFilter = require('gulp-filter');
var concat = require('gulp-concat');
var flatten = require('gulp-flatten');
var del = require('del');

// CSS components
var sass = require('gulp-sass')
// var sourcemaps = require('gulp-sourcemaps'); // TODO (can't refer to sass files now bc they are outside theme)
var autoprefixer = require('gulp-autoprefixer');
var pixrem = require('gulp-pixrem');
var minifycss = require('gulp-minify-css');
var cmq = require('gulp-combine-mq');

// JS componentss
var jscs = require('gulp-jscs');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');

// Images
var imagemin = require('gulp-imagemin');


// DEFINE TASKS
// ------------------------------------------------------------

// Sass Compilation
// ----------------
gulp.task('compile-sass', function () {

	var filter_frontend_style = gulpFilter( ['style.css', 'src/sass/'] );
	var filter_css = gulpFilter( '**/*.css' );

	return gulp.src(source.sass, { base: '' } )
		.pipe(exclude(source.sass_exclude))

//		.pipe(isProduction ? gutil.noop() : sourcemaps.init() ) // --dev

		// .pipe(print()) // DEBUG

		// Preprocess
		.pipe( sass({
			errLogToConsole: true,
			style: sassStyle,
			precision: 10,
			sourceComments: false
		})).on( "error", gutil.log)


		// Prepend vendor CSS to frontend style file
		.pipe(filter_frontend_style)
			.pipe(addsrc.prepend(source.vendor)) // add it before your code so it can be overruled
			.pipe(filter_css)
			.pipe(addsrc.prepend('theme/style.css')) // theme info comment
				// .pipe(print()) // DEBUG
				.pipe(concat('style.css'))
		.pipe(filter_frontend_style.restore())

//		.pipe(isProduction ? gutil.noop() : sourcemaps.write({includeContent: false, sourceRoot: '../sass'})) // --dev

		// Postprocess
//		.pipe(cmq({	log: false })) // NOTE: no sourcemap support
		.pipe(remPixelFallback ? pixrem() : gutil.noop() )
		.pipe(autoprefixer(autoprefixer_rules))

		// Minify
		.pipe(isProduction ? minifycss({
			compatibility: 'ie8',
			keepBreaks: true,
			roundingPrecision: 7,
			keepSpecialComments: 1 // only keep the first one
		}) : gutil.noop())


		.pipe(gulp.dest(target.css))
});


// js Compilation
// --------------
gulp.task('compile-js', function () {

	var filter_yourjs = gulpFilter( source.js );
	var filter_js = gulpFilter( '**/*.js' );

	// Select the vendor files
	return gulp.src( source.vendor )
		.pipe(exclude(source.js_exclude))

		// Select only the javascript files
		.pipe(filter_js)

			// Insert your js code after the others
			.pipe(addsrc.append(source.js))
				// .pipe(print()) // DEBUG

			// Detect errors in your code only
			.pipe(filter_yourjs)
				.pipe(jscs())
			.pipe(filter_yourjs.restore())

			// Concatenate all in this file
			.pipe(concat('scripts.js')).on( "error", gutil.log)

			// Minify
			.pipe(isProduction ? uglify({mangle: jsMangle}).on('error', gutil.log) : gutil.noop())

			// Save output
			.pipe(gulp.dest(target.js))

		.pipe(filter_js.restore())
});


// vendor js & CSS files to load from WordPress
// --------------------------------------------
gulp.task('compile-vendor_live', function () {

	var filter_css = gulpFilter( '**/*.css' );
	var filter_js = gulpFilter( '**/*.js' );

	return gulp.src( source.vendor_live )
		.pipe(exclude(source.vendor_live_exclude))


		// process  JS files
		.pipe(filter_js)

			// Minify
			.pipe(isProduction ? uglify({mangle: jsMangle}).on('error', gutil.log) : gutil.noop())

			// Save output
			.pipe(gulp.dest(target.vendor_live_js))
		.pipe(filter_js.restore())


		// process CSS files
		.pipe(filter_css)

			// .pipe(print()) // DEBUG

			// Postprocess
			.pipe(remPixelFallback ? pixrem() : gutil.noop() )
			.pipe(autoprefixer(autoprefixer_rules))

			// Minify
			.pipe(isProduction ? minifycss({
				compatibility: 'ie8',
				keepBreaks: true,
				roundingPrecision: 10,
				keepSpecialComments: 0
			}) : gutil.noop())

			// Save output
			.pipe(gulp.dest(target.vendor_live_css))

		.pipe(filter_css.restore())
});


// COPY FONTS
// ----------
gulp.task('fonts', function(){
	return gulp.src(source.fonts)
		.pipe(exclude(source.fonts_exclude))

		.pipe(flatten())
		.pipe(gulp.dest(target.fonts));
});


// PROCESS AND COPY IMAGES
// -----------------------
// TODO: compress
gulp.task('images', function(){

	// Images
    return gulp.src(source.img)
		.pipe(exclude(source.images_exclude))
		.pipe(imagemin())
		.pipe(flatten())
		.pipe(gulp.dest(target.img));


	// Vendor images
	
	var filter_img = gulpFilter( '*.{png,gif,jpg,jpeg,svg,ico}' );

    return gulp.src(source.vendor)
		.pipe(addsrc.append(source.vendor_live))
		.pipe(exclude(source.vendor_live_exclude))
		.pipe(filter_img)
			.pipe(flatten())
			.pipe(gulp.dest(target.vendor_img));
});



// CLEAN COMPILATION
gulp.task('clean', function(cb) {
	del([target.css, target.js, target.img, target.fonts], cb)
});



// DEFINE ENVIRONMENT & DEFAULT TASK
// ------------------------------------------------------------

var isProduction = true;             // gulp
var sassStyle = 'nested';


// CLI options
// -----------
if(gutil.env.dev === true) {         // --dev
	isProduction = false;
	var sassStyle = 'compressed';
}
// TODO: --no-imgmin


gulp.task( 'default',
	[ 'compile-sass', 'compile-js', 'compile-vendor_live', 'fonts', 'images' ]
);

