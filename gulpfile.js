const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

var nodeModules = '../../../node_modules/';
var bulmaPath = nodeModules + 'bulma/';

elixir(function(mix) {
    mix.sass('app.sass', 'resources/assets/css')
        .styles([
            bulmaPath + 'css/bulma.css',
            'app.css'
        ])
        .webpack('app.js')
        .version(['css/all.css', 'js/app.js']);
});
