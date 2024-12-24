@extends('web.layout.index')

@section('title', $page->meta_title ?? 'Single Car!!!')

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

    @vite(['Modules/Articles/resources/js/articles-catalog.js'])
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
                        <div class="col mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}"
                                        class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="h3 font-m font-weight-bolder d-none d-lg-block">
                                        {{ trans('page_name.blog') }}</div>
                                    <div class="h3 font-m font-weight-bolder d-lg-none">{{ trans('page_name.blog') }}</div>
                                    <div class="filters-button ml-4">
                                        <button type="button" class="btn btn-reset">
                                            <svg class="i-sorting">
                                                <use xlink:href="img/icons/icons.svg#i-sorting"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-reset btn-filter collapsed"
                                            data-toggle="collapse" data-target="#navbarFilters"
                                            aria-controls="navbarFilters" aria-expanded="false"
                                            aria-label="Toggle navigation" id="toggleFilter">
                                            <svg class="i-filters-menu">
                                                <use xlink:href="img/icons/icons.svg#i-filters-menu"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a
                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ trans('page_name.blog') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="our-fleet pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div id="articles-list" class="our-fleet-preview row">
                                {{-- Got from AJAX --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5 mb-lg-0">
                        <div class="col-auto mx-auto ">
                            <button id="show-more" type="button"
                                class="btn-show-more btn btn-main-blue btn-default text-uppercase">Показати більше</button>
                        </div>
                        <div class="col-12">
                            <nav class="bg-white mt-5 mt-md-2">
                                <ul id="pagination-wrapper" class="pagination-ajax justify-content-center mb-0">
                                    {{-- Got from AJAX --}}
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </section>
            <section class="seo pb-7 pb-md-10 pb-lg-22">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="spoiler art-rich-editor">
                                {!! $page->seo_text !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection
