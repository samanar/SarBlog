<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('SarBlog', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.png' />
    @stack('stylesheets')
</head>
<body>

  @include('layouts/partials/navbar')
  @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('javascripts')


</body>
</html>
