@php $global = DB::table('settings')->first(); @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ !empty($global) ? $global->sitedescription : 'Тестовый сайт'}}">
    <meta name="keywords" content="{{ !empty($global) ? $global->sitekeywords : 'Тестовые данные'}}">
    <meta name="author" content="altynshatyr.kz">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>{{ !empty($global) ? $global->sitename : 'Тестовый сайт' }}</title>

    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="xp-vertical">

<div class="xp-authenticate-bg"></div>
<!-- Start XP Container -->
<div id="xp-container" class="xp-container">

    <!-- Start Container -->
    <div class="container">

        <!-- Start XP Row -->
        <div class="row vh-100 align-items-center">
            <!-- Start XP Col -->
            <div class="col-lg-12 ">

                <!-- Start XP Auth Box -->
                <div class="xp-auth-box">
                    <div class="card">
                        <div class="card-body">
                            <div class="xp-error-box text-center">
                                @yield('error')
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End XP Auth Box -->

            </div>
            <!-- End XP Col -->
        </div>
        <!-- End XP Row -->
    </div>
    <!-- End Container -->
</div>
<!-- End XP Container -->

<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/popper.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/modernizr.min.js') }}"></script>
<script src="{{ asset('js/admin/admin-main.js') }}"></script>


<script src="{{ asset('js/admin/main.js') }}"></script>

</body>
</html>