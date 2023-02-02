const mix = require('laravel-mix');

mix.js('resources/js/front.js', 'public/js')
    .js('resources/js/back.js', 'public/js')
    .vue()
    .sass('resources/sass/back.scss', 'public/css')
    .options({
        processCssUrls: false
    });
