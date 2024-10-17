const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .version() // Optional for cache-busting
   .sourceMaps(); // Optional: To generate source maps for easier debugging in development
