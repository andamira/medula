
// INFO:
// See https://github.com/isaacs/minimatch for glob matching syntax info
//


// DEFINE SOURCES AND TARGETS
// ------------------------------------------------------------

var source = {

	// Sass CSS pre-processor
	// ----------------------
	sass: [
		'src/sass/**/[^_]*.scss',
	],
	sass_exclude: [
		'',
	],

	// Load your js plugins here (order is important)
	// ---------------------------------------------
	// Install with: "bower install NAME --save-dev"
	// Look for matching CSS' in css: section below
	js: [
		'vendor-dl/modernizr/modernizr.js',

		// Recommended Plugins:
		// ------------------
		'vendor-dl/jQuery.mmenu/src/js/jquery.mmenu.min.all.js',  // App look-a-like menus (mmenu.frebsite.nl)
		// 'vendor-dl/leaflet/dist/leaflet.js',                   // Interactive Maps (leafletjs.com)
		// 'vendor-dl/dynatable/jquery.dynatable.js',             // Interactive Table (dynatable.com)
		// 'vendor-dl/jquery-cycle2/build/jquery.cycle2.js',      // Versatile slideshow plugin (jquery.malsup.com/cycle2)

		'src/js/osea.js',
	],
	js_exclude: [
		'',
	],
	
	// Load your external CSS files here (order is important)
	// ------------------------------------------------------
	css: [

		// CSS from recommended plugins:
		// -----------------------------
		'vendor-dl/jQuery.mmenu/src/css/jquery.mmenu.all.css',
		// 'vendor-dl/dynatable/jquery.dynatable.css',
	],


	// Static Assets
	// -------------
	// images: ['/src/img/**/*.{png,jpeg,gif,jpg}'],
	// images_exclude: [],
	// fonts: ['/src/fonts/**/*.{ttf,woff,eof,svg}'],
	// fonts_exclude: []
};


var target = {
	sass: 'src/css',
	js: 'src/js',
};



// LOAD DEPENDENCIES
// ------------------------------------------------------------

// General
var gulp = require('gulp');
var gutil = require('gulp-util');
var print = require('gulp-print');
var exclude = require('gulp-ignore').exclude;
var gulpFilter = require('gulp-filter');
var concat = require('gulp-concat'); // see 'devconfig' task for an alternative
var addsrc = require('gulp-add-src');

// CSS components
var sass = require('gulp-sass')
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var pixrem = require('gulp-pixrem');
var minifycss = require('gulp-minify-css');

// JS componentss
var jscs = require('gulp-jscs');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');


// DEFINE TASKS
// ------------------------------------------------------------

// Sass Compilation
// ----------------
gulp.task('compile-sass', function () {

	var filter = gulpFilter( ['style.css', 'src/sass/'] );

	return gulp.src(source.sass, { base: '' } )
		.pipe(exclude(source.sass_exclude))
		.pipe(isProduction ? gutil.noop() : sourcemaps.init() ) // --dev


		// 1) Preprocess
		.pipe( sass({
			errLogToConsole: true,
			style: sassStyle,
			precision: 10,
			sourceComments: false
		})) 
			.on( "error", gutil.log)


		// 2) Append 3rd party CSS to frontend styles
		.pipe(filter)
			.pipe(addsrc.append(source.css))
			// .pipe(print())
			.pipe(concat('style.css'))
		.pipe(filter.restore())
	
		.pipe(isProduction ? gutil.noop() : sourcemaps.write({includeContent: false, sourceRoot: '../sass'})) // --dev


		// 3) Postprocess
		.pipe(pixrem())
		.pipe(autoprefixer('ie >= 8, > 5%, last 3 versions'))

		.pipe(isProduction ? minifycss({
			compatibility: 'ie8',
			keepBreaks: false,
			roundingPrecision: 10,
			keepSpecialComments: 0
		}) : gutil.noop())

		.pipe(gulp.dest(target.sass))
});


// js Compilation
// --------------
gulp.task('compile-js', function () {

	var filter = gulpFilter( [ 'osea.js', 'src/js' ] );

	return gulp.src( source.js )

		// Detect errors only in your js code
		.pipe(filter)
			// .pipe(print())
		.pipe(jscs())
		.pipe(filter.restore())

		.pipe(concat('scripts.js'))
			.on( "error", gutil.log)

		.pipe(isProduction ? uglify() : gutil.noop())

		.pipe(gulp.dest(target.js))
});



// DEFINE ENVIRONMENT & DEFAULT TASK
// ------------------------------------------------------------

var isProduction = true;     // gulp
var sassStyle = 'nested';

if(gutil.env.dev === true) { // gulp --dev
	isProduction = false;
	var sassStyle = 'compressed';
}


gulp.task( 'default',
	[ 'compile-sass', 'compile-js' ]
);

