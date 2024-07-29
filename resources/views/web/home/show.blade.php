@extends('web.layout.index')

@section('title', 'Home page!!!')

@section('head')
@endsection

@section('content')

    <main class="main">
        <div class="content">
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
                                                    <div class="head mb-1">Кермуй</div>
                                                    <div class="animation-scroll-up">
                                                        <div class="animation-scroll-up--outer">
                                                            <div class="animation-scroll-up--inner">
                                                                у справах<br>
                                                                на побачення<br>
                                                                до спортзалу<br>
                                                                довго<br>
                                                                тимчасово<br>
                                                                зараз<br>
                                                                за тиждень<br>
                                                                не за всі гроші світу<br>
                                                                авто, про яке давно мріяв<br>
                                                                не думай про сервіс<br>
                                                                та отримуй задоволення
                                                            </div>
                                                            <div class="animation-scroll-up--bg"></div>
                                                        </div>
                                                    </div>
                                                    <p class="subhead mb-6">усю рутину <br>ми беремо на себе</p>
                                                    <div class="button-wrap row pt-60 pt-sm-40 pt-lg-0">
                                                        <div class="col d-flex flex-column flex-lg-row align-items-center">
                                                            <a href="catalog.html" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase mb-4 mb-lg-0 mr-lg-4">Кермувати</a>
                                                            <button type="button" class="btn-default btn-default-white btn btn-block btn-outline-white text-uppercase mt-0" data-toggle="modal" data-target="#popup-any-questions">Передзвоніть мені</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-top--swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Вигідніше</span> за оренду та лізинг</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Швидкі</span> рішення</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner">Підписка на <span>автопарк</span></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Безбар'єрний</span> вхід і вихід</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Вигідніше</span> за оренду та лізинг</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner">Цілодобова <span>підтримка</span></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Безбар'єрний</span> вхід і вихід</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Швидкі</span> рішення</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Вигідніше</span> за оренду та лізинг</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner">Цілодобова <span>підтримка</span></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="rtl" class="section-top--swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Вигідніше</span> за оренду та лізинг</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Швидкі</span> рішення</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner">Підписка на <span>автопарк</span></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Безбар'єрний</span> вхід і вихід</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Вигідніше</span> за оренду та лізинг</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner">Цілодобова <span>підтримка</span></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Безбар'єрний</span> вхід і вихід</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Швидкі</span> рішення</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Вигідніше</span> за оренду та лізинг</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner">Цілодобова <span>підтримка</span></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <div class="slider-content--inner"><span>Комфортне</span> пересування</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-top--img">
                        <div class="wrap-img">
                            <img class="bg-down d-none d-sm-block" src="img/bg.jpeg" alt="img">
                            <img class="bg-down d-sm-none" src="img/bg-mob.jpeg" alt="img">
                            </img>
                        </div>
                    </div>
                </div>
            </section>
            <div class="scroll-trigger">
                <section id="ready-drive" class="ready-drive pt-7 pt-md-10 pt-lg-14 pb-7 pb-md-10 pb-lg-34">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-lg-left">Готовий кермувати?</div>
                                <div class="h4 mb-3 mb-lg-7">Знайомся, це — <strong>ULFAUTO-підписка</strong>. Сервіс, з яким авто — це тільки про кайф під час поїздки. Вся інша відповідальність — на нашому боці. Так, ми не перебільшуємо: ТО, шиномонтаж, страхування, тюнінг, зберігання гуми, ремонт, заміна авто... Вигадав щось своє? Приймаємо і цей виклик.</div>
                                <div class="video-wrap video-wrap--vissible w-100 d-lg-none d-flex justify-content-center mb-sm-3">
                                    <a class="w-100" data-fancybox="specific-player-mob" data-src="#specific-player" data-thumb="img/AvnjahftKA.jpeg">
                                        <video class="js-player specific-player" playsinline controls data-poster="img/AvnjahftKA.jpeg">
                                            <source src="assets/video/example.mp4" type="video/mp4" />
                                        </video>
                                    </a>
                                    <button type="button" class="btn btn-video-play-pause"></button>
                                </div>
                                <ul class="list-decimal mb-6">
                                    <li>Обери авто та строк підписки</li>
                                    <li>Забирай і одразу кермуй</li>
                                    <li>Звертайся за сервісами</li>
                                    <li>Змінюй авто на яке хочеш</li>
                                    <li>Передумав? Не проблема, навіть повернемо залог!</li>
                                </ul>
                            </div>
                            <div class="col-4 d-none d-lg-flex">
                                <div class="video-wrap video-wrap--vissible">
                                    <a data-fancybox="specific-player" data-src="#specific-player" data-thumb="img/AvnjahftKA.jpeg">
                                        <video class="js-player specific-player" playsinline controls data-poster="img/AvnjahftKA.jpeg">
                                            <source src="assets/video/example.mp4" type="video/mp4" />
                                        </video>
                                    </a>
                                    <button type="button" class="btn btn-video-play-pause"></button>
                                </div>
                                <div id="specific-player" class="video-wrap hidden" style="display:none">
                                    <video class="js-player specific-player" playsinline controls data-poster="img/AvnjahftKA.jpeg">
                                        <source src="assets/video/example.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-12 col-lg-7 d-flex flex-column flex-md-row align-items-center">
                                        <button type="button" class="btn-default btn btn-block btn-main-blue text-uppercase mb-4 mb-md-0 mr-md-4" data-toggle="modal" data-target="#popup-any-questions">ЦІКАВО</button>
                                        <a href="catalog.html" class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-0">ХОЧУ КЕРМУВАТИ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="customer-stories" class="customer-stories bg-dark-black py-7 py-md-10 py-lg-13">
                    <div class="container-wrap">
                        <div class="container">
                            <div class="row mb-6">
                                <div class="col">
                                    <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-white">Історії клієнтів</div>
                                    <div class="horizontal-scoll-wrapper d-none d-md-block">
                                        <div class="scroll-gallery horizontal row flex-nowrap">
                                            <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                <div class="inner h-100 position-relative">
                                                    <div class="video-wrap video-wrap--vissible h-100">
                                                        <a data-fancybox="scroll-gallery" data-src="#scroll-gallery-player-1" data-thumb="img/customer-stories-1.jpeg">
                                                            <video class=" js-player specific-player" muted playsinline controls data-poster="img/customer-stories-1.jpeg">
                                                                <source src="assets/video/example.mp4" type="video/mp4" />
                                                            </video>
                                                        </a>
                                                        <button type="button" class="btn btn-video-play-pause"></button>
                                                    </div>
                                                    <div id="scroll-gallery-player-1" class="video-wrap hidden" style="display:none">
                                                        <video class="js-player specific-player" playsinline controls data-poster="img/customer-stories-1.jpeg">
                                                            <source src="assets/video/example.mp4" type="video/mp4" />
                                                        </video>
                                                    </div>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                <div class="inner h-100 position-relative">
                                                    <a data-fancybox="scroll-gallery" href="img/customer-stories-2.jpeg">
                                                        <div class="scroll-gallery--img">
                                                            <div class="wrap-img">
                                                                <img class="bg-down" src="img/customer-stories-2.jpeg" alt="img">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                <div class="inner h-100 position-relative">
                                                    <div class="video-wrap video-wrap--vissible h-100">
                                                        <a data-fancybox="scroll-gallery" data-src="#scroll-gallery-player-3" data-thumb="img/customer-stories-3.jpeg">
                                                            <video class="js-player specific-player" muted playsinline controls data-poster="img/customer-stories-3.jpeg">
                                                                <source src="assets/video/example-vertical.mp4" type="video/mp4" />
                                                            </video>
                                                        </a>
                                                        <button type="button" class="btn btn-video-play-pause"></button>
                                                    </div>
                                                    <div id="scroll-gallery-player-3" class="video-wrap hidden" style="display:none">
                                                        <video class="js-player specific-player" playsinline controls data-poster="img/customer-stories-3.jpeg">
                                                            <source src="assets/video/example-vertical.mp4" type="video/mp4" />
                                                        </video>
                                                    </div>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                <div class="inner h-100 position-relative">
                                                    <a data-fancybox="scroll-gallery" href="img/customer-stories-4.jpeg">
                                                        <div class="scroll-gallery--img">
                                                            <div class="wrap-img">
                                                                <img class="bg-down" src="img/customer-stories-4.jpeg" alt="img">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-gallery--item col-12 col-sm-6 col-xl-4">
                                                <div class="inner h-100 position-relative">
                                                    <a data-fancybox="scroll-gallery" href="img/scroll-gallery-car-1.jpeg">
                                                        <div class="scroll-gallery--img">
                                                            <div class="wrap-img">
                                                                <img class="bg-down" src="img/scroll-gallery-car-1.jpeg" alt="img">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="story-cube position-relative d-md-none">
                                        <div class="story-cube--swiper">
                                            <div class="story-cube--wrapper swiper-wrapper">
                                                <div class="story-cube--slide swiper-slide" slot="slide-0">
                                                    <div class="inner h-100 position-relative">
                                                        <div class="video-wrap video-wrap--vissible h-100">
                                                            <a data-fancybox="story-cube-gallery" data-src="#story-cube-gallery-player-1" data-thumb="img/customer-stories-1.jpeg">
                                                                <video class="js-player specific-player" playsinline controls data-poster="img/customer-stories-1.jpeg">
                                                                    <source src="assets/video/example.mp4" type="video/mp4" />
                                                                </video>
                                                            </a>
                                                            <button type="button" class="btn btn-video-play-pause"></button>
                                                        </div>
                                                        <div id="story-cube-gallery-player-1" class="video-wrap hidden" style="display:none">
                                                            <video class="js-player specific-player" playsinline controls data-poster="img/customer-stories-1.jpeg">
                                                                <source src="assets/video/example.mp4" type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                                <div class="story-cube--slide swiper-slide" slot="slide-1">
                                                    <a data-fancybox="story-cube-gallery" href="img/customer-stories-2.jpeg">
                                                        <div class="scroll-gallery--img">
                                                            <div class="wrap-img">
                                                                <img class="bg-down" src="img/customer-stories-2.jpeg" alt="img">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
                                                <div class="story-cube--slide swiper-slide" slot="slide-2">
                                                    <a data-fancybox="story-cube-gallery" href="img/customer-stories-3.jpeg">
                                                        <div class="scroll-gallery--img">
                                                            <div class="wrap-img">
                                                                <img class="bg-down" src="img/customer-stories-3.jpeg" alt="img">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="scroll-gallery--content">
                                                        <div class="scroll-gallery--head mb-2">Моє перше авто</div>
                                                        <p class="mb-0">Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...</p>
                                                    </div>
                                                </div>
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
                                    <a href="customer-stories.html" class="btn-default btn-transparent btn btn-block btn-outline-main-blue text-uppercase mt-0">Більше історій</a>
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
            <section class="seo pb-7 pb-md-10 pb-lg-35">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="spoiler">
                                <div>
                                    <h3>Автомобілі за підпискою – мінімум зобов’язань, максимум свободи</h3>
                                    <h5>Поїздки в офіс, зустрічі з партнерами, відрядження – людині, якій за день треба встигати відвідувати багато місць, не обійтися без надійного, потужного, презентабельного авто. Сьогодні в Україні можна купити транспортний засіб будь-якого класу та марки. Але така покупка – це і додаткові турботи: оформлення права власності, КАСКО, ОСЦПВ, витрата часу на техобслуговування.<br>
                                        Якщо ви бажаєте стати володарем хорошої автомашини, при цьому щоб вашою єдиною турботою було вчасно заправляти її бак, тоді сервіс підписки на автомобілі – те, що потрібно. А компанія <span class="link-bg"><a href="##">ULFAUTO</a></span> (Київ) допоможе оформити угоду швидко і на вигідних для вас умовах.
                                    </h5>
                                </div>
                                <div>
                                    <h3>Підписка на машину – порядок роботи сервісу</h3>
                                    <h5>У багатьох країнах високим попитом серед фізичних осіб користується послуга “Автомобіль за підпискою”, Україна ж донедавна була позбавлена можливості оцінити переваги цієї опції. Однак завдяки <span class="link-bg"><a href="##">ULFAUTO</a></span> сьогодні в нашій країні з’явилася перша справжня вдосконалена оренда автомобіля – за підпискою.<br>
                                        Послуга дає змогу легко взяти в тимчасове користування новий транспортний засіб або транспортний засіб, що вже побував в експлуатації, в ідеальному технічному стані, отримавши повноцінне сервісне обслуговування (ремонт, зберігання і заміна шин, підтримка в дорозі), а також деякі безкоштовні плюшки (дитяче крісло, рейлінги та ін.).<br>
                                        Щоб укласти договір, фізичній особі необхідно надати паспорт, ІПН, водійські права, внести перший платіж за місяць і гарантійний депозит. Підписку не доведеться доводити свою платоспроможність, надавати кредитну історію, шукати поручителів.<br>
                                        Користування седаном або кросовером відбувається приблизно за тим самим принципом, як у випадку з платними мобільними додатками або абонементом у спортзал. Щомісяця з рахунку фізичної особи списується певна сума, але за бажання, послугу в будь-який час можна заморозити.
                                    </h5>
                                </div>
                                <div>
                                    <h3>Як взяти машину за підпискою – етапи угоди</h3>
                                    <h5>Ми подбали про те, щоб для фізичних осіб з Києва та інших регіонів країни, яких цікавить оренда транспортного засобу, став доступним сервіс “Авто за підпискою”.<br>
                                        Щоб оформити підписку, потрібно:</h5>
                                    <ol>
                                        <li>Вибрати в каталозі відповідну марку і модель ТЗ.</li>
                                        <li>Вказати бажаний термін користування транспортом.</li>
                                        <li>Натиснути кнопку “Подати заявку”.</li>
                                    </ol>
                                    <h5>Після узгодження з менеджерами <span class="link-bg"><a href="##">ULFAUTO</a></span> транспортний засіб передається в користування своєму новому власнику.</h5>
                                </div>
                                <div>
                                    <h3>Машина за підпискою, каршерінг, лізинг – у чому відмінності?</h3>
                                    <h5>Усі три види послуг надають фізичним особам можливість користуватися транспортним засобом. Але між ними є принципові відмінності.<br>
                                        Каршерінг підходить ідеально, коли потрібен персональний транспорт на пару годин. З головних недоліків послуги – вартість, що перевищує тарифи таксі, необхідність внести заставну суму, ризик отримати в оренду авто з погано прибраним салоном.<br>
                                        Лізинг – довгострокова оренда ТЗ, яке в підсумку можна викупити. Має багато спільного з придбанням у кредит. Опція підходить тим, хто не бажає віддавати відразу повну суму за покупку, а вважає за краще виплачувати її поступово. На старті доведеться заплатити 15-30% від вартості транспортного засобу. Сервіс більш популярний серед юридичних осіб.<br>
                                        Взяти авто по підписці – новий спосіб володіння транспортним засобом. Опція розрахована на фізичних осіб, які не бажають витрачати гроші на придбання ТЗ або сковувати себе кредитними зобов’язаннями. Можливий період підписки – від 1 місяця до 2 років. Користуватися транспортом і сервісним обслуговуванням можна відразу після внесення оплати за 1 місяць і гарантійного депозиту, який повертається після завершення договору.<br>
                                        Якщо говорити про такий момент, як вартість авто за підпискою, то Україна – з тих країн, де ціни суттєво варіюються залежно від моделі транспортного засобу, тривалості користування. Але головний фактор ціноутворення – якісне сервісне обслуговування, що не передбачено у звичайній оренді та каршерінгу, а в лізингу представлено лише частково.</h5>
                                </div>
                                <div>
                                    <h3>Машина за підпискою в <span class="link-bg"><a href="##">ULFAUTO</a></span> – основні переваги</h3>
                                    <h5>Компанія <span class="link-bg"><a href="##">ULFAUTO</a></span> в сегменті автопослуг працює 11 років. Своїм клієнтам ми гарантуємо:</h5>
                                    <ul>
                                        <li>Бездоганний стан автотранспорту з каталогу;</li>
                                        <li>Широкий вибір марок і моделей на різні бюджети;</li>
                                        <li>Цілодобову підтримку (працює у всіх країнах Європи);</li>
                                        <li>Швидке оформлення;</li>
                                        <li>Мінімальний перший платіж;</li>
                                        <li>Припинення договору за бажанням орендаря.</li>
                                    </ul>
                                    <h5>Нашими послугами можна скористатися в Києві, Львові та області. Здійсніть свою мрію про ідеальний автомобіль вже сьогодні – оформлюйте підписку в <span class="link-bg"><a href="##">ULFAUTO</a></span>.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection
