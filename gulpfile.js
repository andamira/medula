
// source and targets for the sections below.
var source = {

	sass: [
		'lib/sass/**/[^_]*.scss',
	],
	sass_exclude: [
//		'lib/sass/**/_*.scss',
	],

	// plugins
	// You should specifically load your js plugins or plugin folders in the order you want them to load
	js: [
		'vendor/lib/js/libs/**/*.js',  // I put jquery in the header b/c its used by everything it seems like.
	],
	//js_exclude: [],

	// "static" stuff and add all the images and fonts from plugins
	//images: ['/lib/img/**/*.{png,jpeg,gif,jpg}'],
	//imgages_exclude: [],
	//fonts: ['/lib/fonts/**/*.{ttf,woff,eof,svg}'],
	//fonts_exclude: []
};

var target = {
	sass: 'lib/css',
	js: 'lib/js',

	// "static" stuff
	//images: assettarget + 'lib/img',
	//fonts: assettarget + 'lib/fonts'
};



///////////////////////////////////
// Stuff you may not want to edit
///////////////////////////////////
var gulp = require('gulp');
var gutil = require('gulp-util');
var watch = require('gulp-watch');
var plumber = require('gulp-plumber');
var flatten = require('gulp-flatten');
var exclude = require('gulp-ignore').exclude;
var del = require('del');
//var lr = require('tiny-lr');

// Include CSS components
var sass = require('gulp-sass')
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var pixrem = require('gulp-pixrem');
var minifycss = require('gulp-minify-css');

// Include JS componentss
var concat = require('gulp-concat'); // I use this instead of gulp-concat because gulp-concat does't work with watch.
var uglify = require('gulp-uglify');

// Include utilities
//var livereload = require('gulp-livereload');
//var server = lr();


// sass Compilation
gulp.task('sass', function () {
	if (config.env == 'dev') {
		gulp.src(source.sass, { base: '' } )
//			.pipe(exclude(source.sass_exclude))
//			.pipe(watch())
//			.pipe(plumber())
			.pipe(sourcemaps.init())
			.pipe( sass({
				errLogToConsole: true,
				style: "nested",
				precision: 10,
				sourceComments: false
			})) 
				.on( "error", gutil.log)
			.pipe(sourcemaps.write({includeContent: false, sourceRoot: '../sass'}))
			.pipe(pixrem())
			.pipe(autoprefixer('ie >= 8, > 5%, last 5 versions'))
			.pipe(gulp.dest(target.sass))
//			.pipe(livereload(server));
	} else {
		gulp.src(source.sass)
//			.pipe(exclude(source.sass_exclude))
			.pipe( sass({
				errLogToConsole: true,
				style: "compressed",
				precision: 10
			}))
				.on( "error", gutil.log)
			.pipe(pixrem())
			.pipe(autoprefixer('ie >= 8, > 5%, last 5 versions'))
			.pipe(minifycss({
				compatibility: 'ie8',
				keepBreaks: false,
				roundingPrecision: 10,
				keepSpecialComments: 0
			}))
			.pipe(gulp.dest(target.sass));
	}
});




// environment
var config = {'env': 'prod'};

////
//
// Set the dev and prod tasks.
//
////
gulp.task('devconfig', function () {
	//console.log('[NOTE] If you get an error... just try again.');
	config.env = 'dev';
	concat = require('gulp-continuous-concat'); // I use this instead of gulp-concat because gulp-concat doesn't work with watch.
});

gulp.task('dev',
//	['devconfig','livereload','prod']
	['devconfig','prod']
);

gulp.task( 'prod',
//	['sass','scripts','fonts','images']
	['sass']
);

gulp.task( 'default', ['prod'] );


