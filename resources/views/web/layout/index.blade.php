<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=400, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">

    {{-- <title>@yield('title', 'Автопарк')</title> --}}
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:image" content="{{ asset('static_images/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="32x32" href="{{ asset('static_images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static_images/favicon-32x32.png') }}">

    <script>
        const translations = {
            month: "{{ trans('web.month') }}",
            call_me_back: "{{ trans('web.call_me_back') }}",
            send: "{{ trans('web.send') }}"
        };
    </script>

    @vite(['resources/js/forms/popupForm.js'])
    @yield('head')

    <link rel="shortcut icon" href="##" type="image/x-icon" />

    @section('SEO')
        <meta name="description" content="{{ config('app.name') }}">
    @show

    @section('OG')
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="{{ config('app.name') }}" />
        <meta name="twitter:creator" content="{{ config('app.name') }}" />

        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:description" content="{{ config('app.name') }}" />
        <meta property="og:image" content="{{ asset('/images/logos/logo-gold.svg') }}" />
    @show

    @vite(['resources/js/app.js'])

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l][];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'http://web.archive.org/web/20221021003108/https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KG8FLBM');</script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8CSTKL1SCL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8CSTKL1SCL');
    </script>

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
