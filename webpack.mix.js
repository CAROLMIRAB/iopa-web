let mix = require('laravel-mix');


mix.webpackConfig({

    module: {
        rules: [
            {
                test: /\.(woff2?|ttf|eot|svg|otf)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
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
                test: /\.(png|jpe?g|gif|svg|map)$/,
                loader: 'file-loader',
                options: {
                    name: path => {
                        if (!/node_modules|bower_components|plugins/.test(path)) {
                            return '/images/[name].[ext]?[hash]';
                        }

                        return '/images/vendor/' + path
                            .replace(/\\/g, '/')
                            .replace(
                                /((.*(node_modules|bower_components|plugins))|fonts|font|assets)\//g, ''
                            ) + '?[hash]'
                    }
                }
            },
            {
                test: /\.scss$/,
                include: [
                    path.resolve(__dirname, "not_exist_path")
                ],
                use: [

                    {
                        loader: "css-loader",
                    },
                    {
                        loader: "style-loader",
                    },
                    
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
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


mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/select2/dist/css/select2.css',
    'plugins/nucleo/css/nucleo.css',
    'plugins/nucleo/css/nucleo-svg.css',
    'plugins/summernote/summernote.css',
    'plugins/amsify-suggestags/css/amsify.suggestags.css',
    'node_modules/cropper/dist/cropper.css',
    'bower_components/datatables.net-dt/css/jquery.dataTables.css',
    'node_modules/toastr/toastr.scss',
    'bower_components/bootstrap-toggle/css/bootstrap-toggle.css'
], 'public/back/css/build.back.min.css').version();

mix.styles([
    'resources/assets/back/css/argon.css',
    'resources/assets/back/css/styles.css'
], 'public/back/css/custom.back.min.css').version();


mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/select2/dist/js/select2.min.js',
    'node_modules/sweetalert2/dist/sweetalert2.js',
    'plugins/stringToSlug/jquery.slugit.min.js',
    'plugins/summernote/summernote.min.js',
    'plugins/amsify-suggestags/js/jquery.amsify.suggestags.js',
    'plugins/upload-preview/uploadPreview.min.js',
    'node_modules/cropper/dist/cropper.js',
    'bower_components/datatables.net/js/jquery.dataTables.js',
    'node_modules/toastr/toastr.js',
    'node_modules/jquery-validation/dist/jquery.validate.js',
    'bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js'
], 'public/back/js/build.back.min.js').version();

mix.scripts([
    'resources/assets/back/js/argon.min.js',
    'resources/assets/back/js/doctor.js',
    'resources/assets/back/js/post.js',
    'resources/assets/back/js/office.js',
    'resources/assets/back/js/surgery.js',
    'resources/assets/back/js/exams.js',
    'resources/assets/back/js/specialty.js'
], 'public/back/js/custom.back.min.js').version();


/* fronend site web styles and js */

mix.sass('resources/assets/front/scss/app.scss',
    'public/front/css/').version();

mix.scripts([
    'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
    'node_modules/wow.js/dist/wow.min.js'
], 'public/front/js/front.min.js').version();