const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    var assetPath = 'public/assets';
    var assetsCopy = [
        ['resources/assets/js/', '/js'],
        ['resources/assets/css/', '/css'],
        ['node_modules/jquery/dist', '/js'],
        ['node_modules/bootstrap-sass/assets/fonts', '/fonts'],
        ['node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', '/js'],
        ['node_modules/admin-lte/dist', '/adminlte'],
        ['node_modules/admin-lte/plugins', '/adminlte/plugins'],
        ['node_modules/font-awesome/fonts', '/font-awesome/fonts'],
        ['node_modules/font-awesome/css', '/font-awesome/css'],
        ['node_modules/sweetalert/dist/sweetalert.css', '/css'],
        ['node_modules/sweetalert/dist/sweetalert.min.js', '/js'],
        ['node_modules/select2/dist/css/', '/css'],
        ['node_modules/select2/dist/js/', '/js/select2'],
        ['vendor/studio-42/elfinder/css', '/elfinder/css'],
        ['vendor/studio-42/elfinder/img', '/elfinder/img'],
        ['vendor/studio-42/elfinder/js', '/elfinder/js'],
        ['vendor/studio-42/elfinder/sounds', '/elfinder/sounds'],
    ];

    for (var i = 0; i < assetsCopy.length; i++) {
        mix.copy(assetsCopy[i][0], assetPath + assetsCopy[i][1]);
    }

    mix
        .sass('app.scss', assetPath + '/css')
        .sass('common.scss', assetPath + '/css')
});
