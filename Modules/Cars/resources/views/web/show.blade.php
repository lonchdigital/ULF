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

            <x-callback-form />

            <x-fleet />



            <x-f-a-qs :car="$car" :commonFaqs="$commonFaqs" />


            <section class="any-questions pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="inner px-4 px-md-0 py-7">
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                                        <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Залишились питання?</div>
                                        <form id="form-any-questions">
                                            <div class="row field-wrap">
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="any-questions-name">Ваше ім’я</label>
                                                        <input type="text" id="any-questions-name" class="form-control mb-2" placeholder="Введіть ім’я">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваше ім’я українськими літерами (кирилицею)</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="any-questions-phone">Номер телефону</label>
                                                        <input type="tel" id="any-questions-phone" class="form-control mb-2" placeholder="+38 000 0000000">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-checkbox position-relative mb-5">
                                                        <input type="checkbox" class="custom-control-input" id="form-any-questions-check">
                                                        <label class="custom-control-label" for="form-any-questions-check">
                                                            <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <span class="link-underline"><a href="##">персональних даних</a></span>.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-auto mx-auto">
                                                    <a href="##" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">Передзвоніть мені</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
