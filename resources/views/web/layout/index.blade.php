<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=400, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL') }}">

    {{-- <title>@yield('title', 'Автопарк')</title> --}}
    @if(env('APP_ENV') !== "production") <meta name="robots" content="noindex, nofollow"> @endif
    <meta property="og:image" content="{{ asset('static_images/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="32x32" href="{{ asset('static_images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static_images/favicon-32x32.png') }}">

    <script>
        const translations = {
            in_subscription: "{{ trans('web.in_subscription') }}",
            nothing_found: "{{ trans('web.nothing_found') }}",
            choose_model: "{{ trans('web.choose_model') }}",
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

    @if( Route::currentRouteName() === 'main.page' )
        <script type="application/ld+json" defer>
            {
                "@context": "https://schema.org",
                "@type": "Organization",
                "Name": "{{ config('app.name') }}",
                "url": "{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}",
                "logo": "{{ asset('static_images/main-logo.png') }}",
                "image": "{{ asset('static_images/main-logo.png') }}",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "м. Київ, Оболонський проспект, 35-А, офіс 300",
                    "postalCode": "03150",
                    "addressCountry": "Україна"
                },
                "email": "{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'email')->first()->description }}",
                @forelse($footerPage->pageBlocks()->where('block', 'phone')->get() as $phone)
                "telephone": "{{ $phone->title }}",
                @empty
                @endforelse
                "sameAs": [
                    ""
                ]
            }
        </script>

        <script type="application/ld+json" defer>
            {
                "@context": "https://schema.org",
                "@type": "WebSite",
                "url": "{{ url( App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') ) }}",
                "name": "{{ config('app.name') }}",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "{{ url( App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') ) }}/search?q={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        </script>
    @endif


    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KG8FLBM');
    </script>
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
        <div class="popup-bg-body-filter collapsed" data-toggle="collapse" data-target="#navbarFilters" aria-controls="navbarFilters" aria-expanded="false" aria-label="Toggle navigation" role="button"></div>
        <div class="popup-bg-body collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" role="button"></div>

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
