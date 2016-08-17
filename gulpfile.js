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

elixir(function(mix) {
    mix.sass('app.sass', 'resources/assets/css')
        .styles([
            'app.css',
            'libs/sweetalert.css',
            'libs/horsey.css',
            'libs/select2.css',
        ])
        .scripts([
            'libs/jquery-3.1.0.js',
            'libs/materialize.js',
            'libs/sweetalert.min.js',
            'libs/dropzone.js',
            'libs/horsey.js',
            'libs/select2.js',
            'app.js'
        ])
        .copy('node_modules/materialize-sass/font', 'public/build/font')
        .version(['css/all.css', 'js/all.js']);
});
