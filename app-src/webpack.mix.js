const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/*
 | original setting
 | mix.js('resources/js/app.js', 'public/js')
 |    .sass('resources/sass/app.scss', 'public/css');
 */

/*
 | method to compile js and css to root
 | 1. mix.setPublicPath('../')
 |        .js('resources/js/app.js', 'js')
 |        .sass('resources/sass/app.scss', 'css');
 |
 | 2. mix.js('resources/js/app.js', 'public/js')
 |        .sass('resources/sass/app.scss', 'public/css')
 |        .styles([
 |            'public/css/app.css'
 |        ], '../css/app.css')
 |        .scripts([
 |            'public/js/app.js'
 |        ], '../js/app.js');
 */

mix.setPublicPath('../')
    .js('resources/js/app.js', 'js')
    .sass('resources/sass/app.scss', 'css')
    .version();
