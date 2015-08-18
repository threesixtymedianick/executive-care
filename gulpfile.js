/*
 *
 * Main compilation file
 *
 *
 */

"use strict";

var browserify  = require('browserify');
var gulp        = require("gulp");
var concat      = require("gulp-concat");
var copy        = require("gulp-copy");
var cssmin      = require("gulp-minify-css");
var imagemin    = require("gulp-imagemin");
var plumber     = require("gulp-plumber");
var runSequence = require('run-sequence');
var sass        = require("gulp-sass");
var uglifyjs    = require("gulp-uglifyjs"); // extended version of uglify
var watch       = require("gulp-watch");
var reactify    = require('reactify');
var source      = require('vinyl-source-stream');
var pixrem      = require('gulp-pixrem');
var autoprefixer = require('gulp-autoprefixer');

var paths = {
    src: {
        js: "src/js/",
        css: "src/css",
        scss: "src/sass/",
        images: "src/images/",
        plugins: "src/plugins/"
    },
    build: {
        css: "website/static/css/",
        js: "website/static/js/",
        images: "website/static/images/",
        plugins: "website/static/plugins/"
    }
};

gulp.task("default", [ "build", "watch" ]);

gulp.task("build", function(cb) {
    runSequence("build-css", "build-js", "copy-public-images", "copy-fonts", "copy-plugins", "build-css-libs", cb);
});

gulp.task("deploy", function(cb) {
    runSequence("build", [ "minify-css", "minify-js" ], cb);
});

gulp.task("watch", function() {
    gulp.watch(paths.src.scss + "**/*", function() {
        gulp.start("build-css");
    });

    gulp.watch(paths.src.js + "**/*.js", function() {
         gulp.start("build-js");
    });
});

gulp.task("build-css", function() {
    return gulp
        .src(paths.src.scss + "*.scss")
        .pipe(plumber())
        .pipe(sass())
        .pipe(autoprefixer({
                browsers: ['last 2 versions', 'IE 10']
              }))
        .pipe(gulp.dest(paths.build.css))
    ;
});

gulp.task("minify-css", function() {
    return gulp
        .src(paths.build.css + 'screen.css')
        .pipe(cssmin({
            keepSpecialComments: 0
        }))
        .pipe(pixrem())
        .pipe(gulp.dest(paths.build.css))
    ;
});

gulp.task("build-js", ["build-js-libs"], function() {
    var bundler = browserify({
        entries: ['./' + paths.src.js + 'index.js'], // Only need initial file, browserify finds the deps
        transform: [reactify] // We want to convert JSX to normal javascript
    });

    return bundler
        .bundle()
        .pipe(source('index.js'))
        .pipe(gulp.dest(paths.build.js))
    ;
});

gulp.task('build-js-libs', function() {
    return gulp.src([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/bxslider-4/dist/jquery.bxslider.js',
            './bower_components/jquery-validation/dist/jquery.validate.js',
            './src/js/vendor/*.js'
        ])
        .pipe(plumber())
        .pipe(concat('libraries.js'))
        .pipe(gulp.dest(paths.build.js))
    ;
});

gulp.task('build-css-libs', function () {
  return gulp.src([
          './bower_components/bxslider-4/dist/jquery.bxslider.css',
          './src/css/**/*.css'
      ])
      .pipe(concat('libraries.css'))
      .pipe(gulp.dest(paths.build.css))
});

/*gulp.task('build-js-fallback', function() {
    return gulp.src([
            './bower_components/selectivizr/selectivizr.js',
            './bower_components/respond/dest/respond.src.js'
        ])
        .pipe(plumber())
        .pipe(uglifyjs('ie.js'))
        .pipe(gulp.dest(paths.build.js))
    ;
});*/

gulp.task("minify-js", function() {
    return gulp.src([
            paths.build.js + 'index.js'
        ])
        .pipe(uglifyjs('index.js'))
        .pipe(gulp.dest(paths.build.js))
    ;
});

gulp.task('copy-public-images', function() {
    return gulp.src([
        './src/images/public/**/*.*',
        './bower_components/bxslider-4/dist/images/*.*',
    ])
        .pipe(gulp.dest('./website/static/images/'))
    ;
});

gulp.task("minify-images", function() {
    return gulp
        .src(paths.build.images + '*')
        .pipe(imagemin())
        .pipe(gulp.dest(paths.build.images))
    ;
});

gulp.task('copy-fonts', function() {
    return gulp.src('./src/fonts/**/*.*')
        .pipe(gulp.dest('./website/static/fonts/'))
    ;
});

gulp.task('copy-plugins', function() {
    return gulp.src('./src/third-party/**/*.*')
        .pipe(gulp.dest('./website/static/plugins/'))
    ;
});
