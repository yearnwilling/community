var elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var minify = require('gulp-minify');
var Task = elixir.Task;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var sass_path = 'resources/assets/sass/app/';
var js_path = 'resources/assets/js/app/';
var libs_path = 'resources/assets/js/libs/';

gulp.task("copyfiles", function() {
    gulp.src("vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css")
        .pipe(gulp.dest("public/assets/css"));
    gulp.src("vendor/almasaeed2010/adminlte/dist/css/skins/skin-blue.min.css")
        .pipe(gulp.dest("public/assets/css"));
    gulp.src("vendor/almasaeed2010/adminlte/bootstrap/css/bootstrap.min.css")
        .pipe(gulp.dest("public/assets/css"));
    gulp.src("vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js")
        .pipe(gulp.dest("public/assets/js"));
    gulp.src("vendor/almasaeed2010/adminlte/bootstrap/js/bootstrap.min.js")
        .pipe(gulp.dest("public/assets/js"));
    gulp.src("vendor/almasaeed2010/adminlte/dist/js/app.min.js")
        .pipe(gulp.dest("public/assets/js"));
    gulp.src("vendor/almasaeed2010/adminlte/bootstrap/fonts/**")
        .pipe(gulp.dest("public/assets/fonts"));
    gulp.src("vendor/almasaeed2010/adminlte/dist/img/**")
        .pipe(gulp.dest("public/assets/img"));
});

elixir.extend('app_sass', function() {
    new Task('app_sass', function() {
        gulp.src(sass_path+'**/*.scss')
            .pipe(sass())
            .pipe(gulp.dest('public/css'));
    });

});

elixir.extend('app_js', function() {
    new Task('app_js', function() {
        gulp.src(js_path+'**/*.js')
            .pipe(minify())
            .pipe(gulp.dest('public/js'));
    });
});

elixir.extend('libs_js', function() {
    new Task('libs_js', function() {
        gulp.src(libs_path+'**/*.js')
            .pipe(minify())
            .pipe(gulp.dest('public/js'));
    });
});

elixir(function(mix) {
    mix.sass(['app.scss',])
        // .browserify('app.js');
    //
    // mix.app_js();
    // mix.browserify('libs/jquery-validate.js','./public/js/libs/jquery-validate.js');
    // mix.browserify('app/community/add.js','./public/js/community/add.js');
    mix.app_sass();

    mix.styles([
        '../assets/css/bootstrap.min.css',
        '../assets/css/AdminLTE.min.css',
        '../assets/css/skin-blue.min.css',
    ], './public/css/vendor.css', './public/css');

    // mix.scripts([
    //     '../assets/js/app.min.js',
    //     '../assets/js/bootstrap.min.js',
    // ], './public/js/vendor.js', './public/js');

});



gulp.task('app_sass', function() {
    gulp.src(sass_path+'**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/css'));
});




