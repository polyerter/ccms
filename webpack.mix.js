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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/icons.css',
    'resources/assets/css/style.css',
], 'public/css/admin/main.css');

mix.js([
    'resources/assets/js/detect.js',
    'resources/assets/js/jquery.slimscroll.js',
    'resources/assets/js/sidebar-menu.js',
], 'public/js/admin/admin-main.js');

// mix.styles([
//     'resources/assets/plugins/chartistjs/chartist.min.css',
//     'resources/assets/plugins/datepicker/datepicker.min.css',
// ], 'public/css/admin/dashboard.css');

mix.js([
    // 'resources/assets/plugins/chartistjs/chartist.min.js',
    // 'resources/assets/plugins/chartistjs/chartist-plugin-tooltip.min.js',
    // 'resources/assets/js/init/to-do-list-init.js',
    // 'resources/assets/plugins/datepicker/datepicker.min.js',
    // 'resources/assets/plugins/datepicker/i18n/datepicker.en.js',
    'resources/assets/js/init/dashborad.js',
], 'public/js/admin/dashboard.js');

mix.styles([
    'resources/assets/plugins/switchery/switchery.min.css',
    'resources/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css',
], 'public/css/admin/settings.css');

// mix.js([
//     'resources/assets/plugins/switchery/switchery.min.js',
//     'resources/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js',
//     // 'resources/assets/js/init/switchery-init.js',
//     // 'resources/assets/js/init/form-touchspin-init.js',
// ], 'public/js/admin/settings.js');

mix.copy('resources/assets/js/jquery.min.js', 'public/js/admin/jquery.min.js');
mix.copy('resources/assets/js/popper.min.js', 'public/js/admin/popper.min.js');
mix.copy('resources/assets/js/bootstrap.min.js', 'public/js/admin/bootstrap.min.js');
mix.copy('resources/assets/js/modernizr.min.js', 'public/js/admin/modernizr.min.js');
mix.copy('resources/assets/js/main.js', 'public/js/admin/main.js');

mix.copy('resources/assets/js/init/switchery-init.js', 'public/js/admin/init/switchery-init.js');
mix.copy('resources/assets/js/init/form-touchspin-init.js', 'public/js/admin/init/form-touchspin-init.js');
mix.copy('resources/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js', 'public/js/admin/plugins/jquery.bootstrap-touchspin.min.js');
mix.copy('resources/assets/plugins/switchery/switchery.min.js', 'public/js/admin/plugins/switchery.min.js');

//for users
mix.copy('resources/assets/plugins/datatables/jquery.dataTables.min.js', 'public/js/admin/users/js/jquery.dataTables.min.js');
mix.copy('resources/assets/plugins/datatables/dataTables.bootstrap4.min.js', 'public/js/admin/users/js/dataTables.bootstrap4.min.js');

mix.copy('resources/assets/plugins/datatables/dataTables.buttons.min.js', 'public/js/admin/users/js/dataTables.buttons.min.js');
mix.copy('resources/assets/plugins/datatables/buttons.bootstrap4.min.js', 'public/js/admin/users/js/buttons.bootstrap4.min.js');
mix.copy('resources/assets/plugins/datatables/jszip.min.js', 'public/js/admin/users/js/jszip.min.js');
mix.copy('resources/assets/plugins/datatables/pdfmake.min.js', 'public/js/admin/users/js/pdfmake.min.js');
mix.copy('resources/assets/plugins/datatables/vfs_fonts.js', 'public/js/admin/users/js/vfs_fonts.js');
mix.copy('resources/assets/plugins/datatables/buttons.html5.min.js', 'public/js/admin/users/js/buttons.html5.min.js');
mix.copy('resources/assets/plugins/datatables/buttons.print.min.js', 'public/js/admin/users/js/buttons.print.min.js');
mix.copy('resources/assets/plugins/datatables/buttons.colVis.min.js', 'public/js/admin/users/js/buttons.colVis.min.js');

mix.copy('resources/assets/plugins/datatables/dataTables.responsive.min.js', 'public/js/admin/users/js/dataTables.responsive.min.js');
mix.copy('resources/assets/plugins/datatables/responsive.bootstrap4.min.js', 'public/js/admin/users/js/responsive.bootstrap4.min.js');

mix.copy('resources/assets/js/init/table-datatable-init.js', 'public/js/admin/init/table-datatable-init.js');

mix.styles([
    'resources/assets/plugins/datatables/dataTables.bootstrap4.min.css',
    'resources/assets/plugins/datatables/buttons.bootstrap4.min.css',
    'resources/assets/plugins/datatables/responsive.bootstrap4.min.css',
], 'public/css/admin/users/css/users.css');

//create user

mix.styles([
    'resources/assets/plugins/datepicker/datepicker.min.css'
], 'public/css/admin/users/css/create_user.css');

mix.copy('resources/assets/plugins/bootstrap-inputmask/jquery.inputmask.bundle.min.js', 'public/js/admin/users/js/jquery.inputmask.bundle.min.js');
mix.copy('resources/assets/js/init/form-inputmask-init.js', 'public/js/admin/init/form-inputmask-init.js');
mix.copy('resources/assets/plugins/datepicker/datepicker.min.js', 'public/js/admin/users/js/datepicker.min.js');

mix.copy('resources/assets/js/init/form-inputmask-init.js', 'public/js/admin/init/form-inputmask-init.js');
mix.copy('resources/assets/plugins/datepicker/i18n/datepicker.en.js', 'public/js/admin/users/js/datepicker.en.js');
mix.copy('resources/assets/js/init/form-datepicker-init.js', 'public/js/admin/init/form-datepicker-init.js');

//role
mix.copy('resources/assets/plugins/jstree/jstree.min.css', 'public/css/admin/users/css/jstree.min.css');
mix.copy('resources/assets/plugins/jstree/32px.png', 'public/css/admin/users/css/32px.png');
mix.copy('resources/assets/plugins/jstree/throbber.gif', 'public/css/admin/users/css/throbber.gif');

mix.copy('resources/assets/plugins/jstree/jstree.min.js', 'public/js/admin/users/js/jstree.min.js');
mix.copy('resources/assets/js/init/jstree-init.js', 'public/js/admin/init/jstree-init.js');
