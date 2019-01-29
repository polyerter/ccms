@php $global = DB::table('settings')->first(); @endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description" content="{{ !empty($global) ? $global->sitedescription : 'Тестовый сайт'}}">
  <meta name="keywords" content="{{ !empty($global) ? $global->sitekeywords : 'Тестовые данные'}}">
  <meta name="author" content="altynshatyr.kz">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>{{ !empty($global) ? $global->sitename : 'Тестовый сайт' }}</title>

    {{--<link rel="shortcut icon" href="assets/images/favicon.ico">--}}


  <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet" type="text/css">
  @stack('css')

</head>

<body class="xp-vertical">

<div id="xp-container">

    <div class="xp-leftbar">
        <div class="xp-sidebar">
            <div class="xp-logobar text-center">
                <a href="{{ route('admin.index') }}" class="xp-logo">
                  @if(!empty($global->sitelogo))
                    <img src="{{ asset('/uploads/' . $global->sitelogo) }}" width="135px" class="img-fluid" alt="{{ $global->sitename }}" >
                  @endif
                </a>
              <p class="badge badge-pill text-center" style="background-image: linear-gradient(58deg,#4c7cf3 0,#4cc6f3 100%); color: white">Система управления кооперативом</p>
            </div>

        @include('admin.layouts.menu')

        </div>

    </div>

    @include('admin.layouts.rightbar')

</div>

<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/popper.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/modernizr.min.js') }}"></script>
<script src="{{ asset('js/admin/admin-main.js') }}"></script>


@stack('scripts')
<script src="{{ asset('js/admin/main.js') }}"></script>

</body>
</html>