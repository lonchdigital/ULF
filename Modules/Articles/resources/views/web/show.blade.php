@extends('web.layout.index')

@section('title', 'Single article!!!')

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
                        <div class="col-12 col-lg-10 mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('blog.page') }}"
                                        class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">{{ $article->name }}</div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a
                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('blog.page') }}">{{ trans('page_name.blog') }}</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $article->name }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="privacy-terms pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-10 mx-auto mb-5">
                            <img src="{{ $article->image_url }}" alt="Blog Image" title="{{ $article->name ?? 'Blog image' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-10 mx-auto">
                            <div class="h5 font-m mb-3 art-rich-editor">
                                {!! $article->text !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection
