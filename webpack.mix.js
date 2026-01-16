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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();

// Adminstrator
const $prefix = ["administrator", "main"];

$prefix.forEach(element => {
    mix
        .js('resources/' + element + '/js/app.js', 'public/' + element + '/js')
        .sass('resources/' + element + '/sass/style.scss', 'public/' + element + '/css')
        .sourceMaps();
});

// mix.sass('resources/administrator/sass/plugins.scss', 'public/administrator/css').sourceMaps();