@extends('web.layout.index')

@section('title', 'Single Car!!!')

@section('head')
    @vite(['resources/js/forms/notifyAboutAvailability.js'])

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

<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $car->getFullName() }}",
        @if(count($car->images))
        "image": "{{ '/storage/' . $car->images->first()->Url }}",
        @endif
        "description": "{{ $car->description }}",
        "brand": {
            "@type": "Brand",
            "name": "{{ $car->vehicle->model->manufacturer->name }}"
        },
        "offers": {
            "@type": "Offer",
            "priceCurrency": "USD",
            @if(count($car->subscribePrices) > 0)
                "price": "{{ $car->subscribePrices->where('section_id', 1)->first()['monthly_payment'] }}",
            @endif
            "availability": "{{ App\DataClasses\CarStatusesClass::get($car->status_id)['name'] }}",
        }
    }
</script>

    <main class="main">
        <div class="content">
            <section class="section-top pt-5 d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="h3 font-m font-weight-bolder mb-2">{{ $car->getName() }}</div>
                                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between mb-3">
                                    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3 mb-lg-0">
                                        <ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
                                            <li class="breadcrumb-item" itemtype="https://schema.org/ListItem"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                            <li class="breadcrumb-item" itemtype="https://schema.org/ListItem"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}">{{ trans('page_name.car_park') }}</a></li>
                                            <li class="breadcrumb-item active" itemtype="https://schema.org/ListItem" aria-current="page">{{ $car->getName() }}</li>
                                        </ol>
                                    </nav>
                                    <ul class="list-unstyled mb-0 car-properties-preview">
                                        <li>{{ $car->vehicle->manufacturedYear }}</li>
                                        <li>{{ $car->vehicle->fuelType->name }}</li>
                                       <li>{{ $car->vehicle->transmissionType->name }}</li>
                                       @if(!is_null($car->vehicle->driverType))
                                            <li>{{ $car->vehicle->driverType->name }}</li>
                                       @endif
{{--                                        <li>Київ</li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <x-car.gallery :car="$car" :subscriptionExtentional="$subscriptionExtentional" />

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

            <x-fleet :fleetCars="$fleetCars" />

            @if(count($car->faqs))
                <x-f-a-qs :car="$car" :commonFaqs="$commonFaqs" />
            @endif

            @include('components.lead-form', ['page' => 'Single Car Page', 'pbLg' => 13])

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

    <div class="modal modal--custom popup-any-questions fade" id="notify-about-availability" data-keyboard="false" tabindex="-1" aria-labelledby="notify-about-availability" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content py-4 px-2 p-md-5">
                <div class="modal-body p-0">
                    <form class="notify-about-availability" id="call-back-availability-form" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="modal-title font-weight-bolder mb-0">{{ trans('web.notify_about_availability') }}</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <svg>
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-notify-about-availability--email_drive">Email</label>
                                    <input type="text" name="email_drive" id="popup-notify-about-availability--email_drive" class="form-control email_drive-field mb-3" placeholder="example@gmail.com" autocomplete="no-autofill-please" value="">
                                </div>
                            </div>

                            <input type="hidden" name="current_url" value="{{ url()->full() }}">

                            <input type="hidden" name="utm_source" value>
                            <input type="hidden" name="utm_medium" value>
                            <input type="hidden" name="utm_campaign" value>
                            <input type="hidden" name="utm_term" value>
                            <input type="hidden" name="utm_content" value>

                            <input type="hidden" name="car_id" value="{{ $car->id }}">

                            <div class="col-12">
                                <div class="custom-control custom-checkbox position-relative mb-5">
                                    <input type="checkbox" class="custom-control-input" id="popup-notify-about-availability--agree_drive" name="agree_drive" value="1">
                                    <label class="custom-control-label agree_drive-field" for="popup-notify-about-availability--agree_drive">
                                        <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span class=""><a href="##">{{ trans('web.agreement_two') }}</a></span>.</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-auto">
                                <button type="submit" class="btn-modal-send btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">{{ trans('web.call_me_back') }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
