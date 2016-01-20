var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

var paths = {
 'jquery'   : './vendor/bower_components/jquery/',
 'bootstrap': './vendor/bower_components/bootstrap/',
 'fawesome' : './vendor/bower_components/font-awesome/', //font-awesome
 'customcss': './public/',
 'customjs' : './public/'
};

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
  mix.scripts([
   paths.jquery    + 'dist/jquery.min.js',
   paths.bootstrap + 'dist/js/bootstrap.min.js',
   paths.customjs  + 'js/classie.js',
   paths.customjs  + 'js/cbpAnimatedHeader.min.js',
   paths.customjs  + 'js/jqBootstrapValidation.js',
   paths.customjs  + 'js/contact_me.js',
   paths.customjs  + 'js/agency.js',
 ], 'public/js/app.js')


});

elixir(function(mix) {
  mix.styles([
   paths.bootstrap + 'dist/css/bootstrap.min.css',
   paths.customcss + 'css/agency.css',
   paths.fawesome  + 'css/font-awesome.css',
 ], 'public/css/app.css');
});

elixir(function(mix) {
 mix
     .copy(paths.fawesome + 'fonts/**', 'public/fonts')
     .copy(paths.bootstrap + 'fonts/**', 'public/fonts')
});
