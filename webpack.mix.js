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

mix.scripts(
    ["node_modules/lightbox2/dist/js/lightbox.min.js"],
    "public/frontend/assets/js/lightbox.js"
).styles(
    ["node_modules/lightbox2/dist/css/lightbox.min.css"],
    "public/frontend/assets/css/lightbox.css"
);