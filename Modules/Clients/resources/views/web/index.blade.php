@extends('web.layout.index')

@section('title', 'Catalog')

@section('head')
    @if($page->meta_title)
        <title>{{ $page->meta_title }}</title>
        {{-- <meta name="title" content="{{ $page->meta_title }}"> --}}
    @endif

    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if($page->meta_keywords)
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
                        <div class="col mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="h3 font-m font-weight-bolder mb-2">{{ trans('page_name.client_history') }}</div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
                                        <li class="breadcrumb-item" itemtype="https://schema.org/ListItem"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                        <li class="breadcrumb-item active" itemtype="https://schema.org/ListItem" aria-current="page">{{ trans('page_name.client_history') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="customer-stories-main pb-7 pb-md-10 pb-lg-13">
                <div class="container">

                    <div class="scroll-gallery row">
                        @foreach ($clients as $client)
                            @if(!is_null($client->video) || $client->youtube)
                                @if($client->youtube)
                                    <div class="scroll-gallery--item col-12 col-md-6 col-xl-4">
                                        <div class="inner h-100 position-relative">
                                            <div class="video-wrap you-tube-video-wrapper video-wrap--vissible h-100">
                                                <a data-fancybox="scroll-gallery" href="{{ $client->youtube }}" class="btn you-tube-video btn-video-play-pause">
                                                    <img src="{{ $client->image_url }}" alt="Client history image">
                                                    <button type="button" class="btn btn-video-play-pause"></button>
                                                </a>
                                            </div>
                                            <div class="scroll-gallery--content">
                                                <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
                                                <p class="mb-0">{{ $client->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="scroll-gallery--item col-12 col-md-6 col-xl-4">
                                        <div class="inner h-100 position-relative">
                                            <div class="video-wrap video-wrap--vissible h-100">
                                                <video class=" js-player specific-player" playsinline
                                                        data-poster="{{ $client->image_url }}">
                                                    <source src="{{ '/storage/' . $client->video }}" type="video/mp4" />
                                                </video>
                                                <button type="button" class="btn btn-video-play-pause"></button>
                                            </div>
                                            <div class="scroll-gallery--content">
                                                <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
                                                <p class="mb-0">{{ $client->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="scroll-gallery--item col-12 col-md-6 col-xl-4">
                                    <div class="inner h-100 position-relative">
                                        <div class="scroll-gallery--img">
                                            <div class="wrap-img">
                                                <img class="bg-down" src="{{ $client->image_url }}" alt="img">
                                            </div>
                                        </div>
                                        <div class="scroll-gallery--content">
                                            <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
                                            <p class="mb-0">{{ $client->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col col-sm-auto mx-auto">
                            <button type="button" class="btn-show-more btn btn-main-blue btn-default text-uppercase w-100 mt-3">{{ trans('web.show_more') }}</button>
                        </div>
                    </div>
                </div>
            </section>

            @include('components.lead-form', ['page' => 'Clients History Page', 'pbLg' => 13])

            <section class="seo pb-7 pb-md-10 pb-lg-13">
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
