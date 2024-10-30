@extends('web.layout.index')

@section('title', 'Single Car!!!')

@section('head')
    @if($page->meta_title)
        <title>{{ $page->meta_title }}</title>
        <meta name="title" content="{{ $page->meta_title }}">
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
            <section class="section-top pt-5 d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">{{ $car->getName() }}</div>
                                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between mb-3">
                                    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3 mb-lg-0">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                            <li class="breadcrumb-item"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}">{{ trans('page_name.car_park') }}</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $car->getName() }}</li>
                                        </ol>
                                    </nav>
                                    <ul class="list-unstyled mb-0 car-properties-preview">
                                        <li>{{ $car->vehicle->manufacturedYear }}</li>
                                        <li>{{ $car->vehicle->fuelType->name }}</li> {{-- Бензин, 2.0 --}}
{{--                                        <li>Автомат</li>--}}
{{--                                        <li>Повний привод</li>--}}
{{--                                        <li>Київ</li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <x-car.gallery :car="$car" />

            <section class="car-content pb-4 pb-md-7 pb-lg-9">
                <div class="container">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-12 col-lg-6">
                            <x-car.info :car="$car" />
                        </div>
                        <div class="col-12 col-lg-6 mb-7 mb-lg-0">
                            <x-car.subscription-period :car="$car" :subscribeMonthSettings="$subscribeMonthSettings" :commonCarSettings="$commonCarSettings" />
                        </div>
                    </div>
                </div>
            </section>

            <x-subscription-benefits :subscribeBenefits="$subscribeBenefits" />

            <x-gallery-cars :car="$car" />

            <x-service-steps :carDriveBlock="$carDriveBlock" />

            @include('components.test-drive-lead-form', ['page' => 'Single Car Page', 'pbLg' => 13])

            <x-fleet />

            <x-f-a-qs :car="$car" :commonFaqs="$commonFaqs" />

            @include('components.lead-form', ['page' => 'Single Car Page', 'pbLg' => 13])

            <section class="seo pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="spoiler">
                                {!! $page->seo_text !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection
