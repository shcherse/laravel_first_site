let mix = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', '../resources/css')
    .scripts([
        'resources/js/libs/jquery-3.2.1.js',
        'resources/js/libs/select2.min.js'
    ], 'public/js/all.js')
    .styles([
        'resources/css/libs/bootstrap.min.css',
        'resources/css/app.css',
        'resources/css/libs/select2.min.css'
    ], 'public/css/all.css')
    .version();

   // mix.styles([
        //'libs/bootstrap.min.css',
        //'app.css',
        //'libs/select2.min.css'
    //]);

    //mix.scripts([
        //'libs/jquery-3.2.1.js',
        //'libs/select2.min.js'
    //]);
