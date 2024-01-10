const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('postcss-import'),
       require('tailwindcss'),
       require('autoprefixer'),
       'resources/template-assets/css/style.css'
   ])
   .autoload({
       jquery: ['$', 'window.jQuery', 'jQuery'],
   });
// Add Bootstrap CSS to the mix
mix.styles([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'resources/template-assets/css/style.css'
        // ... other CSS files
    ], 'public/css/app.css')
    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        // ... other JS files
    ], 'public/js/app.js');
