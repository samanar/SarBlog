<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} Management</title>

    <!-- Styles -->
    <link href="{{ asset('css/uikit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.png'/>
    @stack('stylesheets')
</head>
<body>
@include('layouts.partials.navbars.main')
<div class=" uk-child-width-expand\@s m-l-10 m-r-10" uk-grid>
    @include('layouts.partials.navbars.manage')
    <div class="uk-width-expand@s uk-card uk-card-default m-l-20 m-r-20 p-t-15">
        @yield('content')
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/uikit.min.js') }}"></script>
<script src="{{ asset('js/uikit_icons.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('javascripts')


</body>
</html>
