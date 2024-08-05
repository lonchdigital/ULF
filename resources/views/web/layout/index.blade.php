<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=400, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">

    <title>@yield('title', 'Автопарк')</title>
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:image" content="{{ asset('static_images/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="32x32" href="{{ asset('static_images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static_images/favicon-32x32.png') }}">

    @yield('head')

    <link rel="shortcut icon" href="##" type="image/x-icon" />

    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="wrapper">
        <div class="popup-bg-body-filter collapsed" data-toggle="collapse" data-target="#navbarFilters" aria-controls="navbarFilters" aria-expanded="false" aria-label="Toggle navigation"></div>
        <div class="popup-bg-body collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></div>

        @include('web.parts.header')

        @yield('content')

        @include('web.parts.footer')

    </div>

    @yield('scripts')

{{--    @vite(['resources/js/jquery.js'])--}}
    @vite(['resources/js/libs.js'])
    @vite(['resources/js/main.js'])
</body>
</html>
