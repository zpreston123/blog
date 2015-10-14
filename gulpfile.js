var elixir = require('laravel-elixir');
var gulp = require('gulp');
module.exports = gulp;

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

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css')
        .styles([
            'libs/bootstrap.min.css',
            'app.css',
            'libs/font-awesome.css',
            'libs/sweetalert.css',
            'libs/horsey.css'
        ])
        .scripts([
            'libs/jquery-1.11.3.js',
            'libs/bootstrap.js',
            'libs/sweetalert.min.js',
            'libs/dropzone.js',
            'libs/vue.js',
            'libs/horsey.js',
            'libs/jquery.pjax.js',
            'app.js'
        ])
        .copy(
            'node_modules/font-awesome/fonts/**',
            'public/fonts'
        );
});
