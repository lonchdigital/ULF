@extends('web.layout.index')

@section('title', 'Contacts')

@section('head')
    @if ($page->meta_title)
        <title>{{ $page->meta_title }}</title>
        <meta name="title" content="{{ $page->meta_title }}">
    @endif

    @if ($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if ($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif

    @if (isset($url['ua']) && isset($url['ru']))
        <link rel="canonical" href="{{ $url[app()->getLocale()] }}">
        <meta property="og:url" content="{{ $url[app()->getLocale()] }}" />

        <link rel="alternate" href="{{ $url['ua'] }}" hreflang="uk-UA">
        <link rel="alternate" href="{{ $url['ru'] }}" hreflang="ru-UA">
        <link rel="alternate" href="{{ $url['ua'] }}" hreflang="x-default">
    @endif
@endsection

@section('OG')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="{{ config('app.name') }}" />
    <meta name="twitter:creator" content="{{ config('app.name') }}" />

    <meta property="og:title" content="{{ $page->meta_title }}" />
    <meta property="og:description" content="{{ $page->meta_description }}" />
    <meta property="og:type" content="page" />
    <meta property="og:url" content="{{ request()->url() }}" />
    {{-- <meta property="og:image" content="" /> --}}
@endsection

@section('content')

    <main class="main">
        <div class="content">
            <section class="section-top pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}"
                                        class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">{{ $page->h1 ?? '' }}</div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a
                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $page->h1 ?? '' }}</li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>


                    <div class="contacts-wrapper">
                        <div class="contacts-left">
                            <div class="contacts-item">
                                <div class="contacts-item-title">{{ trans('web.we_are_working') }}</div>
                                <p>{{ $page->pageBlocks()->where('block', 'days')->where('key', 'first')->first()->title . ' ' ?? '' }}
                                    {{ $page->pageBlocks()->where('block', 'days')->where('key', 'first')->first()->description ?? '' }}
                                    <br>
                                    {{ $page->pageBlocks()->where('block', 'days')->where('key', 'second')->first()->title . ' ' ?? '' }}
                                    {{ $page->pageBlocks()->where('block', 'days')->where('key', 'second')->first()->description ?? '' }}
                                </p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">{{ trans('web.address') }}</div>
                                <p>{{ $page->pageBlocks()->where('block', 'address')->first()->title }}<br>
                                    {{ $page->pageBlocks()->where('block', 'address')->first()->description }}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">{{ trans('web.phone') }}</div>
                                <p>{{ $page->pageBlocks()->where('block', 'phone')->first()->title }}<br>
                                    {{ $page->pageBlocks()->where('block', 'phone')->first()->description }}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">
                                    Email
                                </div>
                                <p>
                                    <a
                                        href="mailto:auto.online@ulf.ua">{{ $page->pageBlocks()->where('block', 'email')->first()->title }}</a>
                                </p>
                            </div>
                            <div class="contacts-social" style="display: flex; gap: 10px;">
                                <a href="{{ $page->pageBlocks()->where('block', 'instagram')->first()->title }}"
                                    target="_blank">
                                    <img src="{{ asset('static_images/icon-instagram.svg') }}" alt="instagram" style="max-width: 40px">
                                </a>
                                <a href="{{ $page->pageBlocks()->where('block', 'facebook')->first()->title }}"
                                    target="_blank">
                                    <img src="{{ asset('static_images/icon-fb.svg') }}" alt="facebook" style="max-width: 40px">
                                </a>
                            </div>
                        </div>
                        <div class="contacts-right">
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d858.8882288707084!2d30.497098789744708!3d50.51822599590291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4d24028a08079%3A0xbe266778ebbad3e6!2z0J7QsdC-0LvQvtC90YHQutC40Lkg0L_RgNC-0YHQvy4sIDM1LCDQmtC40LXQsiwgMDIwMDA!5e0!3m2!1suk!2sua!4v1686135052692!5m2!1suk!2sua"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                            <iframe
                                src="https://www.google.com/maps?q={{ $page->pageBlocks()->where('block', 'map')->where('key', 'latitude')->first()->title }},{{ $page->pageBlocks()->where('block', 'map')->where('key', 'longitude')->first()->title }}&hl=uk&output=embed"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>


                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
