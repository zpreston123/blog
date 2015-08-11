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

elixir(function (mix) {
    mix.sass('app.scss', 'resources/assets/css')
        .styles([
            'app.css',
            'libs/font-awesome.css',
            'libs/sweetalert.css'
        ])
        .scripts([
            'libs/jquery-1.11.3.js',
            'libs/sweetalert.min.js',
            'libs/dropzone.js'
        ]);
});
