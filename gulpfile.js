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
var materializePath = nodeModules + 'materialize-css/dist/';
var jqueryPath = nodeModules + 'jquery/dist/';
var vuePath = nodeModules + 'vue/dist/';

elixir(function(mix) {
    mix.sass('app.sass', 'resources/assets/css')
        .styles([
            materializePath + 'css/materialize.css',
            'libs/sweetalert.css',
            'libs/horsey.css',
            'app.css'
        ])
        .scripts([
            jqueryPath + 'jquery.js',
            materializePath + 'js/materialize.js',
            vuePath + 'vue.js',
            'libs/sweetalert.min.js',
            'libs/dropzone.js',
            'libs/horsey.js',
            'app.js'
        ])
        .copy(materializePath + 'fonts', 'public/build/fonts')
        .version(['css/all.css', 'js/all.js']);
});
