const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);*/

mix.styles([
    'resources/assets/front/css/bootstrap.min.css',
    'resources/assets/front/css/crm.css',
    'resources/assets/front/css/sidebars.css',
    'resources/assets/front/css/sticky-footer.css',
    'resources/assets/front/css/headers.css',


], 'public/css/front.css');

mix.styles([
    'resources/assets/front/css/bundle.css',
    'resources/assets/front/css/slick.css',
    'resources/assets/front/css/slick-theme.css',
    'resources/assets/front/css/app.css',

], 'public/css/front_ecommerce.css');

mix.scripts([
    'resources/assets/front/js/bootstrap.bundle.min.js',
    'resources/assets/front/js/sidebars.js',
    'resources/assets/front/js/jquery-3.3.1.min.js',
    'resources/assets/front/js/search.js',

], 'public/js/front.js');

mix.scripts([
    'resources/assets/front/js/bundle.js',
    'resources/assets/front/js/slick.min.js',
    'resources/assets/front/js/chart.min.js',
    'resources/assets/front/js/apexcharts.min.js',
    'resources/assets/front/js/circle-progress.min.js',
    'resources/assets/front/js/dashboard.js',
    'resources/assets/front/js/app.js',
], 'public/js/front_ecommerce.js');

/*
*
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
*
*/






