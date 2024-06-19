<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" href="{{ asset('img/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <title>@yield('title', 'КАДРИ.UA')</title>

    @yield('head')

    @vite(['resources/js/app.js'])

</head>
<body>
<div class="preloader">
    <img class="preloader__image" src="{{ asset('img/preloader.gif') }}" alt="preloader">
</div>
<div class="top-disc">
    <div class="container">
        <div class="top-disc__text">
            Система знаходиться у процесі наповнення та фінального тестування.
            Якщо ви виявите некоректну роботу системи, зверніться, будь  ласка, на пошту system@kadry-ua.com або за телефоном 0673175886.
        </div>
    </div>
</div>
@include('web.parts.header')

@yield('content')

@include('web.parts.footer')

@yield('scripts')

</body>
</html>
