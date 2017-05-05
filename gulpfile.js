var elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
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

elixir(function(mix) {
    mix.sass(['app.scss',])
        .browserify('app.js');
    //
    mix.app_sass();
    mix.styles([
        '../assets/css/bootstrap.min.css',
        '../assets/css/AdminLTE.min.css',
        '../assets/css/skin-blue.min.css',
    ], './public/css/vendor.css', './public/css');

    mix.scripts([
        '../assets/js/app.min.js',
        '../assets/js/bootstrap.min.js',
    ], './public/js/vendor.js', './public/js');

});



gulp.task('app_sass', function() {
    gulp.src(sass_path+'**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/css'));
});




