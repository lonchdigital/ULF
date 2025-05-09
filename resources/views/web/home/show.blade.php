@extends('web.layout.index')

@section('title', 'Homepage')

@section('head')
    @if ($page->meta_title)
        <title>{{ $page->meta_title }}</title>
        {{-- <meta name="title" content="{{ $page->meta_title }}"> --}}
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

            @if ($homeMainBlock)
                <section id="section-top" class="section-top {{ ( $homeMainBlock->is_video ) ? 'art-mask' : '' }}">
                    <div class="mx-auto position-relative">
                        <div class="row pt-18 pt-lg-16 pt-xl-26 pt-xxl-36 pb-8">
                            <div class="col">
                                <div class="section-top--item pb-10 pb-md-22 pb-lg-16 pb-xl-26">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-7 col-xl-5">
                                                <div class="section-top--content">
                                                    <div class="section-top--info">
                                                        <div class="head mb-1">{{ $homeMainBlock->title }}</div>
                                                        <div class="animation-scroll-up">
                                                            <div class="animation-scroll-up--outer">
                                                                <div class="animation-scroll-up--inner">
                                                                    {!! $homeMainBlock->running_text !!}
                                                                </div>
                                                                <div class="animation-scroll-up--bg"></div>
                                                            </div>
                                                        </div>
                                                        <p class="subhead mb-6">{!! $homeMainBlock->description !!}</p>
                                                        <div class="button-wrap row pt-60 pt-sm-40 pt-lg-0">
                                                            <div
                                                                class="col d-flex flex-column flex-lg-row align-items-center">
                                                                <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}"
                                                                    class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase mb-4 mb-lg-0 mr-lg-4">{{ $homeMainBlock->button_one }}</a>
                                                                <button type="button"
                                                                    class="btn-default btn-default-white btn btn-block btn-outline-white text-uppercase mt-0"
                                                                    data-toggle="modal"
                                                                    data-target="#popup-any-questions2">{{ $homeMainBlock->button_two }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($homeBenefitBlock)
                                    <div class="section-top--swiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($homeBenefitBlock->where('row', 1) as $benefit)
                                                <div class="swiper-slide">
                                                    <div class="slider-content">
                                                        <div class="slider-content--inner">{!! $benefit->title !!}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div dir="rtl" class="section-top--swiper--rtl">
                                        <div class="swiper-wrapper">
                                            @foreach ($homeBenefitBlock->where('row', 2) as $benefitTwo)
                                                <div class="swiper-slide">
                                                    <div class="slider-content">
                                                        <div class="slider-content--inner">{!! $benefitTwo->title !!}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="section-top--img">
                            <div class="wrap-img">
                                @if( $homeMainBlock->is_video )
                                    <video class="d-none d-sm-block art-center-video art-fit-video" playsinline autoplay muted loop>
                                        <source src="{{ '/storage/' . $homeMainBlock->video }}" type="video/mp4" />
                                    </video>
                                    <video class="d-sm-none art-center-video art-fit-video" playsinline autoplay muted loop>
                                        <source src="{{ '/storage/' . $homeMainBlock->video_mob }}" type="video/mp4" />
                                    </video>
                                @else
                                    <img class="bg-down d-none d-sm-block"
                                        src="{{ !is_null($homeMainBlock->image) ? '/storage/' . $homeMainBlock->image : '' }}"
                                        alt="img">
                                    <img class="bg-down d-sm-none"
                                        src="{{ !is_null($homeMainBlock->image_mob) ? '/storage/' . $homeMainBlock->image_mob : '' }}"
                                        alt="img">
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <div class="scroll-trigger">
                @if ($homeDriveBlock)
                    <section id="ready-drive" class="ready-drive pt-7 pt-md-10 pt-lg-14 pb-7 pb-md-10 pb-lg-34">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg">
                                    <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-lg-left">
                                        {{ $homeDriveBlock->title }}</div>
                                    <div class="h4 mb-3 mb-lg-7">{!! $homeDriveBlock->description !!}</div>
                                    <div class="video-wrap video-wrap--vissible w-100 d-lg-none d-flex justify-content-center mb-sm-3">
                                        <video class="js-player specific-player" playsinline
                                            data-poster="{{ '/storage/' . $homeDriveBlock->image }}">
                                            <source src="{{ '/storage/' . $homeDriveBlock->video }}" type="video/mp4" />
                                        </video>
                                        <button type="button" class="btn btn-video-mute-toggle muted"></button>
                                    </div>
                                    <ul class="list-decimal mb-6">
                                        @if(!is_null($homeDriveBlock->step_one))
                                            <li>{{ $homeDriveBlock->step_one }}</li>
                                        @endif
                                        @if(!is_null($homeDriveBlock->step_two))
                                            <li>{{ $homeDriveBlock->step_two }}</li>
                                        @endif
                                        @if(!is_null($homeDriveBlock->step_three))
                                            <li>{{ $homeDriveBlock->step_three }}</li>
                                        @endif
                                        @if(!is_null($homeDriveBlock->step_four))
                                            <li>{{ $homeDriveBlock->step_four }}</li>
                                        @endif
                                        @if(!is_null($homeDriveBlock->step_five))
                                            <li>{{ $homeDriveBlock->step_five }}</li>
                                        @endif
                                    </ul>
                                </div>
                                @if (!is_null($homeDriveBlock->video) || $homeDriveBlock->youtube)
                                    @if ($homeDriveBlock->youtube)
                                        <div class="col-auto d-none d-lg-flex ready-to-drive-block">
                                            <div class="video-wrap you-tube-video-wrapper video-wrap--vissible">
                                                <a data-fancybox="specific-player" href="{{ $homeDriveBlock->youtube }}"
                                                    class="btn you-tube-video btn-video-play-pause">
                                                    <img src="{{ '/storage/' . $homeDriveBlock->image }}"
                                                        alt="Client history image">
                                                    <button type="button" class="btn btn-video-play-pause"></button>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-auto d-none d-lg-flex">
                                            <div class="video-wrap video-wrap--vissible">
                                                {{-- autoplay muted loop --}}
                                                <video class="js-player specific-player" playsinline muted
                                                    data-poster="{{ '/storage/' . $homeDriveBlock->image }}"
                                                    >
                                                    <source src="{{ '/storage/' . $homeDriveBlock->video }}"
                                                        type="video/mp4" />
                                                </video>
                                                <button type="button" class="btn btn-video-mute-toggle muted"></button>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-12 col-lg-7 d-flex flex-column flex-md-row align-items-center">
                                            <button type="button"
                                                class="btn-default btn btn-block btn-main-blue text-uppercase mb-4 mb-md-0 mr-md-4"
                                                data-toggle="modal"
                                                data-target="#popup-any-questions">{{ $homeDriveBlock->button_one }}</button>
                                            <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}"
                                                class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-0">{{ $homeDriveBlock->button_two }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                <section id="customer-stories" class="customer-stories bg-dark-black py-7 py-md-10 py-lg-13">
                    <div class="container-wrap">
                        <div class="container">
                            <div class="row mb-6">
                                <div class="col">
                                    <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-white">
                                        {{ trans('page_name.client_history') }}</div>
                                    <div id="customer-stories-pc" class="horizontal-scoll-wrapper d-none d-md-block">
                                        <div class="scroll-gallery horizontal row flex-nowrap">

                                            @foreach ($clients as $client)
                                                @if (!is_null($client->video) || $client->youtube)
                                                    @if ($client->youtube)
                                                        <div class="scroll-gallery--item col-12 col-md-6 col-xl-4">
                                                            <div class="inner h-100 position-relative">
                                                                <div
                                                                    class="video-wrap you-tube-video-wrapper video-wrap--vissible h-100">
                                                                    <a data-fancybox="scroll-gallery"
                                                                        href="{{ $client->youtube }}"
                                                                        class="btn you-tube-video btn-video-play-pause">
                                                                        <img src="{{ $client->image_url }}"
                                                                            alt="Client history image">
                                                                        <button type="button"
                                                                            class="btn btn-video-play-pause"></button>
                                                                    </a>
                                                                </div>
                                                                <div class="scroll-gallery--content">
                                                                    <div class="scroll-gallery--head mb-2">
                                                                        {{ $client->history_title }}</div>
                                                                    <p class="mb-0">{{ $client->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                            <div class="inner h-100 position-relative">
                                                                <div class="video-wrap video-wrap--vissible h-100 3333333">
                                                                    <video class="js-player specific-player" playsinline muted
                                                                        data-poster="{{ $client->image_url }}"
                                                                        >
                                                                        <source src="{{ '/storage/' . $client->video }}"
                                                                            type="video/mp4" />
                                                                    </video>
                                                                    <button type="button" class="btn btn-video-mute-toggle muted"></button>
                                                                </div>

                                                                <div class="scroll-gallery--content">
                                                                    <div class="scroll-gallery--head mb-2">
                                                                        {{ $client->history_title }}</div>
                                                                    <p class="mb-0">{{ $client->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                        <div class="inner h-100 position-relative">
                                                            <div class="scroll-gallery--img">
                                                                <div class="wrap-img">
                                                                    <img class="bg-down"
                                                                        src="{{ $client->image_url }}"
                                                                        alt="img">
                                                                </div>
                                                            </div>
                                                            <div class="scroll-gallery--content">
                                                                <div class="scroll-gallery--head mb-2">
                                                                    {{ $client->history_title }}</div>
                                                                <p class="mb-0">{{ $client->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <div id="customer-stories-mobile" class="story-cube position-relative d-md-none">
                                        <div class="story-cube--swiper page-home">
                                            <div class="story-cube--wrapper swiper-wrapper">
                                                @foreach ($clients as $client)
                                                    @if (!is_null($client->video) || $client->youtube)
                                                        @if ($client->youtube)
                                                            <div class="scroll-gallery--item col-12 col-md-6 col-xl-4">
                                                                <div class="inner h-100 position-relative">
                                                                    <div
                                                                        class="video-wrap you-tube-video-wrapper video-wrap--vissible h-100">
                                                                        <a data-fancybox="video"
                                                                            href="{{ $client->youtube }}"
                                                                            class="btn you-tube-video btn-video-play-pause">
                                                                            <img src="{{ $client->image_url }}"
                                                                                alt="Client history image">
                                                                            <button type="button"
                                                                                class="btn btn-video-play-pause"></button>
                                                                        </a>
                                                                    </div>
                                                                    <div class="scroll-gallery--content">
                                                                        <div class="scroll-gallery--head mb-2">
                                                                            {{ $client->history_title }}</div>
                                                                        <p class="mb-0">{{ $client->description }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="story-cube--slide swiper-slide"
                                                                slot="slide-{{ $client->id }}">
                                                                <div class="inner h-100 position-relative">
                                                                    <div class="video-wrap video-wrap--vissible h-100">
                                                                        <video preload="auto" class="js-player specific-player" playsinline muted
                                                                            data-poster="{{ $client->image_url }}">
                                                                            <source src="{{ '/storage/' . $client->video }}"
                                                                                type="video/mp4" />
                                                                        </video>
                                                                        <button type="button" class="btn btn-video-mute-toggle muted"></button>
                                                                    </div>
                                                                </div>
                                                                <div class="scroll-gallery--content">
                                                                    <div class="scroll-gallery--head mb-2">
                                                                        {{ $client->history_title }}</div>
                                                                    <p class="mb-0">{{ $client->description }}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="story-cube--slide swiper-slide"
                                                            slot="slide-{{ $client->id }}">
                                                            <div class="scroll-gallery--img">
                                                                <div class="wrap-img">
                                                                    <img class="bg-down"
                                                                        src="{{ $client->image_url }}"
                                                                        alt="img">
                                                                </div>
                                                            </div>
                                                            <div class="scroll-gallery--content">
                                                                <div class="scroll-gallery--head mb-2">
                                                                    {{ $client->history_title }}</div>
                                                                <p class="mb-0">{{ $client->description }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="story-cube--next swiper-button-next"></div>
                                            <div class="story-cube--prev swiper-button-prev"></div>

                                            <div class="story-cube--pagination swiper-pagination"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto mx-auto">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('clients.page') }}"
                                        class="btn-default btn-transparent btn btn-block btn-outline-main-blue text-uppercase mt-0">{{ trans('web.show_more_histories') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="our-fleet" class="our-fleet pt-7 pt-md-10 pt-lg-35 pb-7 pb-md-10 pb-lg-13">
                    <div class="container">
                        <div class="row mb-6">
                            <div class="col">
                                <div class="head font-weight-bolder mb-3 mb-md-6 text-center">
                                    {{ trans('web.our_car_park') }} <br class="d-sm-none"><span
                                        class="text-main-blue">=</span><br class="d-sm-none">
                                    {{ trans('web.your_car_park') }}</div>
                                <div class="our-fleet-preview row">

                                    @foreach ($cars as $car)
                                        @include('components.car.car-item', ['car' => $car])
                                    @endforeach

                                    {{-- TODO:: do we need this block? --}}
                                    <div class="col-12 col-md-6 col-lg-4 d-none d-md-flex our-fleet-search">
                                        <div class="our-fleet-preview--item bg-main-blue our-fleet-preview--search">
                                            <div class="name text-white">{{ trans('web.did_not_found_dream_car') }}</div>
                                            <div class="wrap-img">
                                                <img src="{{ asset('static_images/car-6.png') }}" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span
                                                    class="value">1 080</span> / {{ trans('web.month') }}</div>
                                            <button type="button"
                                                class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold mb-4 mb-lg-0 mr-lg-4"
                                                data-toggle="modal"
                                                data-target="#popup-сar-selection">{{ trans('web.go_find_the_car') }}</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                                <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}"
                                    class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-0">{{ trans('web.choose_and_drive') }}</a>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="section-order d-flex flex-column">

                @include('components.test-drive-lead-form', ['page' => 'Main page', 'pbLg' => 35])

                @include('components.automatch')
                <section class="our-fleet our-fleet--mob pb-7 pb-md-10 pb-lg-13 d-md-none">
                    <div class="container">
                        <div class="row">
                            <div class="our-fleet-search col">
                                <div class="our-fleet-search--inner position-relative">
                                    <div class="our-fleet-preview--item bg-main-blue">
                                        <div class="name text-white text-center">{{ __('web.did_not_found_dream_car') }}
                                        </div>
                                        <div class="wrap-img">
                                            <img src="{{ asset('static_images/car-6.png') }}" alt="Image">
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-auto mx-auto">
                                                <button type="button"
                                                    class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold"
                                                    data-toggle="modal" data-target="#popup-сar-selection">{{ __('web.go_find_the_car') }}</button>
                                            </div>
                                        </div>
                                        <div class="wrap-img wrap-img--hidden">
                                            <img src="{{ asset('static_images/bg-car-preview.png') }}" class="bg-down" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @if($page->faqs->count())
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "FAQPage",
                    "mainEntity": [
                    @foreach($page->faqs()->orderBy('sort', 'ASC')->get() as $faq)
                        {
                            "@type": "Question",
                            "name": "{{ $faq->question }}",
                            "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "<p>{{ $faq->answer }}</p>"
                            }
                        },
                    @endforeach
                    ]
                }
                </script>
                <section id="asked-questions" class="asked-questions pb-7 pb-md-10 pb-lg-13 pt-7 pt-md-0">
                    <div class="container">
                        <div class="row mb-6">
                            <div class="col">
                                <div class="head font-weight-bolder mb-3 mb-md-6 text-center">{{ trans('web.faqs') }}</div>
                                <div class="accordion" id="accordion-asked-questions">
                                    @forelse($page->faqs()->orderBy('sort', 'ASC')->get() as $faq)
                                        <div class="card">
                                            <div class="card-header p-0" id="heading-accordion-question-{{ $loop->iteration }}">
                                                <div class="h4 mb-0">
                                                    <div class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapse-accordion-question-{{ $loop->iteration }}" aria-expanded="false"
                                                        aria-controls="collapse-accordion-question-{{ $loop->iteration }}" role="button">{{ $faq->question }}</div>
                                                </div>
                                            </div>
                                            <div id="collapse-accordion-question-{{ $loop->iteration }}" class="collapse"
                                                aria-labelledby="heading-accordion-question-{{ $loop->iteration }}"
                                                data-parent="#accordion-asked-questions">
                                                <div class="card-body">{!! $faq->answer !!}</div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('faq') }}"
                                    class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-3 mt-md-6 col-12 col-md-6 col-lg-4 mx-auto">{{ __('web.more_answers') }}</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @include('components.lead-form', ['page' => 'Main page', 'pbLg' => 35])

            @if ($page->seo_text)
                <section class="seo pb-7 pb-md-10 pb-lg-35">
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
            @endif
        </div>
    </main>
@endsection

@section('scripts')
    @vite(['resources/js/modules/home-video-settings.js'])
@endsection