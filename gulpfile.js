var elixir = require('laravel-elixir');

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

var materializePath = '../../../node_modules/materialize-css/dist/';

elixir(function(mix) {
    mix.sass('app.sass', 'resources/assets/css')
        .styles([
            materializePath + 'css/materialize.css',
            'libs/sweetalert.css',
            'libs/horsey.css',
            'libs/select2.css',
            'app.css'
        ])
        .scripts([
            'libs/jquery-3.1.0.js',
            materializePath + 'js/materialize.js',
            'libs/sweetalert.min.js',
            'libs/dropzone.js',
            'libs/horsey.js',
            'libs/select2.js',
            'app.js'
        ])
        .copy(materializePath + 'fonts', 'public/build/fonts')
        .version(['css/all.css', 'js/all.js']);
});
