const mix = require('laravel-mix');

/* mix.js('resources/js/app.js', 'public/js')
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
    ], 'public/js/app.js'); */

mix.styles([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'resources/corporate-ui/css/nucleo-icons.css',
        'resources/corporate-ui/css/css/nucleo-svg.css',
        'resources/corporate-ui/css/corporate-ui-dashboard.css?v=1.0.0'
        // ... other CSS files
    ], 'public/css/app.css')
    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        // ... other JS files
        'resources/corporate-ui/js/core/popper.min.js',
        'resources/corporate-ui/js/plugins/perfect-scrollbar.min.js',
        'resources/corporate-ui/js/plugins/smooth-scrollbar.min.js',
        'resources/corporate-ui/js/corporate-ui-dashboard.min.js?v=1.0.0',
    ], 'public/js/app.js')
