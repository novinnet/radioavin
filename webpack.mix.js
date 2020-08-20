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
    [
        "node_modules/video.js/dist/video.min.js",
        "node_modules/videojs-resolution-switcher/lib/videojs-resolution-switcher.js"
    ],
    "public/frontend/assets/js/videojs.js"
).styles(
    [
        "node_modules/video.js/dist/video-js.min.css",
        "node_modules/videojs-resolution-switcher/lib/videojs-resolution-switcher.css"
    ],
    "public/frontend/assets/css/videojs.css"
);