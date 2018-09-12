let mix = require('laravel-mix');


mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.(woff2?|ttf|eot|svg|otf)$/,
                loader: 'file-loader',
                options: {
                    name: path => {
                        if (!/node_modules|bower_components|plugins/.test(path)) {
                            return '/fonts/[name].[ext]?[hash]';
                        }

                        return '/fonts/vendor/' + path
                            .replace(/\\/g, '/')
                            .replace(
                                /((.*(node_modules|bower_components|plugins))|fonts|font|assets)\//g, ''
                            ) + '?[hash]'
                    }
                }
            },
            {
                test: /\.(png|jpe?g|gif)$/,
                loader: 'file-loader',
                options: {
                    name: path => {
                        if (!/node_modules|bower_components|plugins/.test(path)) {
                            return '/img/[name].[ext]?[hash]';
                        }

                        return '/img/vendor/' + path
                            .replace(/\\/g, '/')
                            .replace(
                                /((.*(node_modules|bower_components|plugins))|fonts|font|assets)\//g, ''
                            ) + '?[hash]'
                    }
                }
            }
        ],
    },
});
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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


   mix.styles([
    'public/scss/packages.front.css',
    'node_modules/dropzone/dist/dropzone.css',
    'node_modules/croppie/croppie.css',
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
], 'public/front/css/build.front.min.css').version();