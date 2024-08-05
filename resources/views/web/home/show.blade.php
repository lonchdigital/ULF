@extends('web.layout.index')

@section('title', 'Homepage')

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

            @if($homeMainBlock)
                <section id="section-top" class="section-top">
                    <div class="mx-auto position-relative">
                        <div class="row pt-18 pt-lg-16 pt-xl-26 pt-xxl-42 pb-8">
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
                                                            <div class="col d-flex flex-column flex-lg-row align-items-center">
                                                                <a href="{{ route('catalog.page') }}" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase mb-4 mb-lg-0 mr-lg-4">{{ $homeMainBlock->button_one }}</a>
                                                                <button type="button" class="btn-default btn-default-white btn btn-block btn-outline-white text-uppercase mt-0" data-toggle="modal" data-target="#popup-any-questions">{{ $homeMainBlock->button_two }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($homeBenefitBlock)
                                    <div class="section-top--swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($homeBenefitBlock->where('row', 1) as $benefit)
                                                <div class="swiper-slide">
                                                    <div class="slider-content">
                                                        <div class="slider-content--inner">{!! $benefit->title !!}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div dir="rtl" class="section-top--swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($homeBenefitBlock->where('row', 2) as $benefitTwo)
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
                                <img class="bg-down d-none d-sm-block" src="{{ (!is_null($homeMainBlock->image)) ? '/storage/' . $homeMainBlock->image : '' }}" alt="img">
                                <img class="bg-down d-sm-none" src="img/bg-mob.jpeg" alt="img">
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <div class="scroll-trigger">

                @if($homeDriveBlock)
                    <section id="ready-drive" class="ready-drive pt-7 pt-md-10 pt-lg-14 pb-7 pb-md-10 pb-lg-34">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-lg-left">{{ $homeDriveBlock->title }}</div>
                                    <div class="h4 mb-3 mb-lg-7">{!! $homeDriveBlock->description !!}</div>
                                    <div class="video-wrap video-wrap--vissible w-100 d-lg-none d-flex justify-content-center mb-sm-3">
                                        <a class="w-100" data-fancybox="specific-player-mob" data-src="#specific-player" data-thumb="{{ '/storage/' . $homeDriveBlock->image }}">
                                            <video class="js-player specific-player" playsinline controls data-poster="{{ '/storage/' . $homeDriveBlock->image }}">
                                                <source src="assets/video/example.mp4" type="video/mp4" />
                                            </video>
                                        </a>
                                        <button type="button" class="btn btn-video-play-pause"></button>
                                    </div>
                                    <ul class="list-decimal mb-6">
                                        <li>{{ $homeDriveBlock->step_one }}</li>
                                        <li>{{ $homeDriveBlock->step_two }}</li>
                                        <li>{{ $homeDriveBlock->step_three }}</li>
                                        <li>{{ $homeDriveBlock->step_four }}</li>
                                        <li>{{ $homeDriveBlock->step_five }}</li>
                                    </ul>
                                </div>
                                <div class="col-4 d-none d-lg-flex">
                                    <div class="video-wrap video-wrap--vissible">
                                        <a data-fancybox="specific-player" data-src="#specific-player" data-thumb="{{ '/storage/' . $homeDriveBlock->image }}">
                                            <video class="js-player specific-player" playsinline controls data-poster="{{ '/storage/' . $homeDriveBlock->image }}">
                                                <source src="assets/video/example.mp4" type="video/mp4" />
                                            </video>
                                        </a>
                                        <button type="button" class="btn btn-video-play-pause"></button>
                                    </div>
                                    <div id="specific-player" class="video-wrap hidden" style="display:none">
                                        <video class="js-player specific-player" playsinline controls data-poster="{{ '/storage/' . $homeDriveBlock->image }}">
                                            <source src="assets/video/example.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-12 col-lg-7 d-flex flex-column flex-md-row align-items-center">
                                            <button type="button" class="btn-default btn btn-block btn-main-blue text-uppercase mb-4 mb-md-0 mr-md-4" data-toggle="modal" data-target="#popup-any-questions">{{ $homeDriveBlock->button_one }}</button>
                                            <a href="catalog.html" class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-0">{{ $homeDriveBlock->button_two }}</a>
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
                                    <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-white">{{ trans('page_name.client_history') }}</div>
                                    <div class="horizontal-scoll-wrapper d-none d-md-block">
                                        <div class="scroll-gallery horizontal row flex-nowrap">

                                            @foreach ($clients as $client)
                                                @if(!is_null($client->video))
                                                    <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                        <div class="inner h-100 position-relative">
                                                            <div class="video-wrap video-wrap--vissible h-100">
                                                                <a data-fancybox="scroll-gallery" data-src="#scroll-gallery-player-{{ $client->id }}" data-thumb="{{ $client->image_url }}">
                                                                    <video class=" js-player specific-player" muted playsinline controls data-poster="{{ $client->image_url }}">
                                                                        <source src="{{ '/storage/' . $client->video }}" type="video/mp4" />
                                                                    </video>
                                                                </a>
                                                                <button type="button" class="btn btn-video-play-pause"></button>
                                                            </div>
                                                            <div id="scroll-gallery-player-{{ $client->id }}" class="video-wrap hidden" style="display:none">
                                                                <video class="js-player specific-player" playsinline controls data-poster="{{ $client->image_url }}">
                                                                    <source src="{{ '/storage/' . $client->video }}" type="video/mp4" />
                                                                </video>
                                                            </div>
                                                            <div class="scroll-gallery--content">
                                                                <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
                                                                <p class="mb-0">{{ $client->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                        <div class="inner h-100 position-relative">
                                                            <a data-fancybox="scroll-gallery" href="{{ $client->image_url }}">
                                                                <div class="scroll-gallery--img">
                                                                    <div class="wrap-img">
                                                                        <img class="bg-down" src="{{ $client->image_url }}" alt="img">
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="scroll-gallery--content">
                                                                <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
                                                                <p class="mb-0">{{ $client->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="story-cube position-relative d-md-none">
                                        <div class="story-cube--swiper">
                                            <div class="story-cube--wrapper swiper-wrapper">

                                                @foreach ($clients as $client)
                                                    @if(!is_null($client->video))
                                                        <div class="story-cube--slide swiper-slide" slot="slide-{{ $client->id }}">
                                                            <div class="inner h-100 position-relative">
                                                                <div class="video-wrap video-wrap--vissible h-100">
                                                                    <a data-fancybox="story-cube-gallery" data-src="#story-cube-gallery-player-{{ $client->id }}" data-thumb="{{ $client->image_url }}">
                                                                        <video class="js-player specific-player" playsinline controls data-poster="{{ $client->image_url }}">
                                                                            <source src="{{ '/storage/' . $client->video }}" type="video/mp4" />
                                                                        </video>
                                                                    </a>
                                                                    <button type="button" class="btn btn-video-play-pause"></button>
                                                                </div>
                                                                <div id="story-cube-gallery-player-{{ $client->id }}" class="video-wrap hidden" style="display:none">
                                                                    <video class="js-player specific-player" playsinline controls data-poster="{{ $client->image_url }}">
                                                                        <source src="{{ '/storage/' . $client->video }}" type="video/mp4" />
                                                                    </video>
                                                                </div>
                                                            </div>
                                                            <div class="scroll-gallery--content">
                                                                <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
                                                                <p class="mb-0">{{ $client->description }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="story-cube--slide swiper-slide" slot="slide-{{ $client->id }}">
                                                            <a data-fancybox="story-cube-gallery" href="{{ $client->image_url }}">
                                                                <div class="scroll-gallery--img">
                                                                    <div class="wrap-img">
                                                                        <img class="bg-down" src="{{ $client->image_url }}" alt="img">
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="scroll-gallery--content">
                                                                <div class="scroll-gallery--head mb-2">{{ $client->history_title }}</div>
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
                                    <a href="{{ route('clients.page') }}" class="btn-default btn-transparent btn btn-block btn-outline-main-blue text-uppercase mt-0">{{ trans('web.show_more_histories') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="our-fleet" class="our-fleet pt-7 pt-md-10 pt-lg-35 pb-7 pb-md-10 pb-lg-13">
                    <div class="container">
                        <div class="row mb-6">
                            <div class="col">
                                <div class="head font-weight-bolder mb-3 mb-md-6 text-center">Наш автопарк <br class="d-sm-none"><span class="text-main-blue">=</span><br class="d-sm-none"> Твій автопарк</div>
                                <div class="our-fleet-preview row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="our-fleet-preview--item">
                                            <div class="name">Hyundai Tucson</div>
                                            <div class="wrap-img">
                                                <img src="img/car-1.png" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <a href="##" class="btn-arrow btn btn-block">
                                                <span>Бензин, 2.0, Автомат, Повний привод</span>
                                            </a>
                                            <div class="discount">&#128293; -20% &#128293;</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="our-fleet-preview--item">
                                            <div class="name">Toyota Camry</div>
                                            <div class="wrap-img">
                                                <img src="img/car-2.png" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <a href="##" class="btn-arrow btn btn-block">
                                                <span>Бензин, 2.0, Автомат, Передній привод</span>
                                            </a>
                                            <div class="in-subscription">у підписці</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="our-fleet-preview--item">
                                            <div class="name">Toyota RAV4</div>
                                            <div class="wrap-img">
                                                <img src="img/car-3.png" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <a href="##" class="btn-arrow btn btn-block">
                                                <span>Гібрид, Автомат, Повний привод</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 d-none d-md-flex">
                                        <div class="our-fleet-preview--item">
                                            <div class="name">Toyota RAV4</div>
                                            <div class="wrap-img">
                                                <img src="img/car-4.png" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <a href="##" class="btn-arrow btn btn-block">
                                                <span>Бензин, 2.0, Автомат, Повний привод</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 d-none d-md-flex">
                                        <div class="our-fleet-preview--item">
                                            <div class="name">Hyundai Tucson</div>
                                            <div class="wrap-img">
                                                <img src="img/car-5.png" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <a href="##" class="btn-arrow btn btn-block">
                                                <span>Бензин, 2.0, Автомат, Повний привод</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 d-none d-md-flex our-fleet-search">
                                        <div class="our-fleet-preview--item bg-main-blue our-fleet-preview--search">
                                            <div class="name text-white">Не знайшов авто мрії в нашому автопарку?</div>
                                            <div class="wrap-img">
                                                <img src="img/car-6.png" alt="Image">
                                            </div>
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <button type="button" class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold mb-4 mb-lg-0 mr-lg-4" data-toggle="modal" data-target="#popup-сar-selection">НА ПОШУКИ АВТО</іге>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                                <a href="catalog.html" class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-0">ОБИРАЙ ТА КЕРМУЙ</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="section-order d-flex flex-column">
                <section class="test-drive pb-md-10 pb-lg-35 order-last order-md-first">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="inner px-4 px-md-0 py-7">
                                    <div class="row">
                                        <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                                            <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Завітай на тест-драйв</div>
                                            <div class="h4 font-m font-weight-bolder mb-3 mb-md-9 text-md-center">Можеш спробувати, а потім підписатись</div>
                                            <form id="form-test-drive">
                                                <div class="row field-wrap">
                                                    <div class="col-12 col-md-6">
                                                        <div class="field mb-2 mb-md-8">
                                                            <label class="control-label" for="name">Ваше ім’я</label>
                                                            <input type="text" id="name" class="form-control mb-2" placeholder="Введіть ім’я">
                                                            <div class="field--help-info small-txt text-red mb-2">Введіть Ваше ім’я українськими літерами (кирилицею)</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="field mb-2 mb-md-8">
                                                            <label class="control-label" for="phone">Номер телефону</label>
                                                            <input type="tel" id="phone" class="form-control mb-2" placeholder="+38 000 0000000">
                                                            <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="custom-control custom-checkbox position-relative mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="form-test-drive-check">
                                                            <label class="custom-control-label" for="form-test-drive-check">
                                                                <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <span class="link-underline"><a href="##">персональних даних</a></span>.</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col col-md-auto mx-auto">
                                                        <a href="##" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">ХОЧУ ЗАТЕСТИТИ</a>
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
                @include('components.automatch')
                <section class="our-fleet our-fleet--mob pb-7 pb-md-10 pb-lg-13 d-md-none">
                    <div class="container">
                        <div class="row">
                            <div class="our-fleet-search col">
                                <div class="our-fleet-search--inner position-relative">
                                    <div class="our-fleet-preview--item bg-main-blue">
                                        <div class="name text-white text-center">Не знайшов авто мрії в нашому автопарку?</div>
                                        <div class="wrap-img">
                                            <img src="img/car-6.png" alt="Image">
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-auto mx-auto">
                                                <button type="button" class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold" data-toggle="modal" data-target="#popup-сar-selection">НА ПОШУКИ АВТО</button>
                                            </div>
                                        </div>
                                        <div class="wrap-img wrap-img--hidden">
                                            <img src="img/bg-car-preview.png" class="bg-down" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section id="asked-questions" class="asked-questions pb-7 pb-md-10 pb-lg-13 pt-7 pt-md-0">
                <div class="container">
                    <div class="row mb-6">
                        <div class="col">
                            <div class="head font-weight-bolder mb-3 mb-md-6 text-center">Часті питання</div>
                            <div class="accordion" id="accordion-asked-questions">
                                <div class="card">
                                    <div class="card-header p-0" id="heading-accordion-question-1">
                                        <div class="h4 mb-0">
                                            <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-1" aria-expanded="false" aria-controls="collapse-accordion-question-1">Що таке підписка на автомобіль?</div>
                                        </div>
                                    </div>
                                    <div id="collapse-accordion-question-1" class="collapse" aria-labelledby="heading-accordion-question-1" data-parent="#accordion-asked-questions">
                                        <div class="card-body">Що таке підписка на автомобіль?</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-0" id="heading-accordion-question-2">
                                        <div class="h4 mb-0">
                                            <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-2" aria-expanded="false" aria-controls="collapse-accordion-question-2">Що включає “підписка на авто”?</div>
                                        </div>
                                    </div>
                                    <div id="collapse-accordion-question-2" class="collapse" aria-labelledby="heading-accordion-question-2" data-parent="#accordion-asked-questions">
                                        <div class="card-body">Що включає “підписка на авто”?</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-0" id="heading-accordion-question-3">
                                        <div class="h4 mb-0">
                                            <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-3" aria-expanded="false" aria-controls="collapse-accordion-question-3">Як оформити “ULFAUTO [підписка]”?</div>
                                        </div>
                                    </div>
                                    <div id="collapse-accordion-question-3" class="collapse" aria-labelledby="heading-accordion-question-3" data-parent="#accordion-asked-questions">
                                        <div class="card-body">Як оформити “ULFAUTO [підписка]”?</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-0" id="heading-accordion-question-4">
                                        <div class="h4 mb-0">
                                            <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-4" aria-expanded="false" aria-controls="collapse-accordion-question-4">Що покриває страховка?</div>
                                        </div>
                                    </div>
                                    <div id="collapse-accordion-question-4" class="collapse" aria-labelledby="heading-accordion-question-4" data-parent="#accordion-asked-questions">
                                        <div class="card-body">Що покриває страховка?</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-0" id="heading-accordion-question-5">
                                        <div class="h4 mb-0">
                                            <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-5" aria-expanded="false" aria-controls="collapse-accordion-question-5">Чи можу я поміняти авто?</div>
                                        </div>
                                    </div>
                                    <div id="collapse-accordion-question-5" class="collapse" aria-labelledby="heading-accordion-question-5" data-parent="#accordion-asked-questions">
                                        <div class="card-body">Чи можу я поміняти авто?</div>
                                    </div>
                                </div>
                            </div>
                            <a href="asked-questions.html" class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-3 mt-md-6 col-12 col-md-6 col-lg-4 mx-auto">Більше Відповідей</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="any-questions pb-7 pb-md-10 pb-lg-35">
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

            @if($page->seo_text)
                <section class="seo pb-7 pb-md-10 pb-lg-35">
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
            @endif
        </div>
    </main>

@endsection
