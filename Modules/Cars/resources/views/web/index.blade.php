@extends('web.layout.index')

@section('title', 'Catalog')

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

    @vite(['Modules/Cars/resources/js/cars-catalog.js'])
    @vite(['front/src/js/modules/filter.js'])
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
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="h3 font-m font-weight-bolder d-none d-lg-block">{{ trans('web.our_car_park') }} <br
                                            class="d-sm-none"><span class="text-main-blue">=</span><br class="d-sm-none">
                                        {{ trans('web.your_car_park') }}</div>
                                    <div class="h3 font-m font-weight-bolder d-lg-none">{{ trans('page_name.car_park') }}</div>
                                    <div class="filters-button ml-4">
                                        <div class="art-order">
                                            <button type="button" class="btn btn-reset">
                                                <svg class="i-sorting">
                                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-sorting' }}"></use>
                                                </svg>
                                            </button>

                                            <div class="art-select-options">
                                                <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}" class="filter-option">{{ trans('web.sort_by_default') }}</a>
                                                <a href="?order=price_up" class="filter-option">{{ trans('web.price_up') }}</a>
                                                <a href="?order=price_down" class="filter-option">{{ trans('web.price_down') }}</a>
                                                <a href="?order=popularity_up" class="filter-option">Більш популярні</a>
                                                <a href="?order=popularity_down" class="filter-option">Менш популярні</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-reset btn-filter collapsed"
                                            data-toggle="collapse" data-target="#navbarFilters"
                                            aria-controls="navbarFilters" aria-expanded="false"
                                            aria-label="Toggle navigation" id="toggleFilter">
                                            <svg class="i-filters-menu">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-filters-menu' }}"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ trans('page_name.car_park') }}</li>
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
                            <div id="cars-list" class="our-fleet-preview row">
                                {{-- Got from AJAX --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5 mb-lg-0">
                        <div class="col-auto mx-auto ">
                            <button id="show-more" type="button" class="btn-show-more btn btn-main-blue btn-default text-uppercase">Показати більше</button>
                        </div>
                        <div class="col-12">
                            <nav class="bg-white mt-5 mt-md-2">
                                <ul id="pagination-wrapper" class="pagination-ajax justify-content-center mb-0">
                                    {{-- Got from AJAX --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row d-lg-none our-fleet--mob">
                        <div class="our-fleet-search col">
                            <div class="our-fleet-search--inner position-relative">
                                <div class="our-fleet-preview--item bg-main-blue">
                                    <div class="name text-white text-center">Не знайшов авто мрії в нашому автопарку?</div>
                                    <div class="wrap-img">
                                        <img src="img/car-6.png" alt="Image">
                                    </div>
                                    <div class="row">
                                        <div class="col col-sm-auto mx-auto">
                                            <button type="button"
                                                class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold"
                                                data-toggle="modal" data-target="#popup-сar-selection">НА ПОШУКИ
                                                АВТО</button>
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
            <section class="test-drive pb-7 pb-md-10 pb-lg-22 d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="inner px-4 px-md-0 py-7">
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                                        <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Завітай на тест-драйв
                                        </div>
                                        <div class="h4 font-m font-weight-bolder mb-3 mb-md-9 text-md-center">Можеш
                                            спробувати, а потім підписатись</div>
                                        <form id="form-test-drive">
                                            <div class="row field-wrap">
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="name">Ваше ім’я</label>
                                                        <input type="text" id="name" class="form-control mb-2"
                                                            placeholder="Введіть ім’я">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваше
                                                            ім’я українськими літерами (кирилицею)</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="phone">Номер телефону</label>
                                                        <input type="tel" id="phone" class="form-control mb-2"
                                                            placeholder="+38 000 0000000">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваш
                                                            номер телефону</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-checkbox position-relative mb-5">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="form-test-drive-check">
                                                        <label class="custom-control-label" for="form-test-drive-check">
                                                            <span class="custom-checkbox--info">Я даю згоду на збір,
                                                                обробку, зберігання та використання своїх <span
                                                                    class="link-underline"><a href="##">персональних
                                                                        даних</a></span>.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-auto mx-auto">
                                                    <a href="##"
                                                        class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">ХОЧУ
                                                        ЗАТЕСТИТИ</a>
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
            <section class="seo pb-7 pb-md-10 pb-lg-22">
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

            <div class="sidebar collapse" id="navbarFilters">
                <div class="d-flex justify-content-between mb-3">
                    <div class="filter-title mr-4">Фільтри</div>
                    <button type="button" class="btn-close btn btn-reset" data-toggle="collapse" href="#navbarFilters"
                        role="button" aria-expanded="false" aria-controls="navbarFilters">
                        <svg class="i-close">
                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
                        </svg>
                    </button>
                </div>
                <div class="sidebar-filter">
                    <div class="filter-item">
                        <button type="button"
                            class="btn-clear-filter btn-default btn-transparent btn btn-block mt-0 p-0 align-content-center mb-3">Очистити</button>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Оберіть ваше місто</div>
                                <label for="select-choose-city"
                                    class="small-txt font-weight-bold text-grey mb-1">Місто</label>
                                <div class="select-wrap">
                                    <select class="select-choose-city" name="select-choose-city">
                                        <!-- <option></option> -->
                                        <option value="1">Луцьк</option>
                                        <option value="2">Львів</option>
                                        <option value="3">Київ</option>
                                        <option value="4">Володимир</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Оберіть марку авто</div>
                                <label for="select-choose-brand" class="small-txt font-weight-bold text-grey mb-1">Марка
                                    авто</label>
                                <div class="select-wrap">
                                    <select class="select-choose-brand" name="select-choose-brand">
                                        <option></option>
                                        <option value="1">Ford</option>
                                        <option value="2">Volvo</option>
                                        <option value="3">Nissan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-6">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Вкажіть ціну</div>
                                <div class="small-txt font-weight-bold text-grey mb-1">Ціна $ / міс.</div>
                                <div class="inner">
                                    <input class="currency-first form-control" type="number" value="0"
                                        min="0" max="50000" step="1">
                                    <input class="currency-last form-control" type="number" value="50000"
                                        min="0" max="50000" step="1">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div id="currency-range-slider" class="price-slider slider-range position-relative">
                                <div class="range-bar-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-6">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Вкажіть рік випуску</div>
                                <div class="small-txt font-weight-bold text-grey mb-1">Рік випуску</div>
                                <div class="inner">
                                    <div class="datepicker">
                                        <input id="graduation-year-first" class="form-control" type="text" readonly
                                            data-input autocomplete="no-autofill-please">
                                    </div>
                                    <div class="datepicker">
                                        <input id="graduation-year-last" class="form-control" type="text" readonly
                                            data-input autocomplete="no-autofill-please">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="small-txt font-weight-bold text-grey mb-1">Тип кузову</div>
                        <div class="mb-6">
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="body-type-1">
                                <label class="custom-control-label" for="body-type-1">
                                    <span class="custom-checkbox--info">Тип 1</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="body-type-2">
                                <label class="custom-control-label" for="body-type-2">
                                    <span class="custom-checkbox--info">Тип 2</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="body-type-3">
                                <label class="custom-control-label" for="body-type-3">
                                    <span class="custom-checkbox--info">Тип 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="small-txt font-weight-bold text-grey mb-1">Коробка передач</div>
                        <div class="mb-6">
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="transmission-1">
                                <label class="custom-control-label" for="transmission-1">
                                    <span class="custom-checkbox--info">Тип 1</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="transmission-2">
                                <label class="custom-control-label" for="transmission-2">
                                    <span class="custom-checkbox--info">Тип 2</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="transmission-3">
                                <label class="custom-control-label" for="transmission-3">
                                    <span class="custom-checkbox--info">Тип 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="small-txt font-weight-bold text-grey mb-1">Тип палива</div>
                        <div class="mb-6">
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="fuel-type-1">
                                <label class="custom-control-label" for="fuel-type-1">
                                    <span class="custom-checkbox--info">Тип 1</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="fuel-type-2">
                                <label class="custom-control-label" for="fuel-type-2">
                                    <span class="custom-checkbox--info">Тип 2</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="fuel-type-3">
                                <label class="custom-control-label" for="fuel-type-3">
                                    <span class="custom-checkbox--info">Тип 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Вкажіть об‘єм двигуна</div>
                                <div class="small-txt font-weight-bold text-grey mb-1">Об‘єм двигуна (л)</div>
                                <div class="inner">
                                    <input class="form-control" type="number" autocomplete="no-autofill-please">
                                    <input class="form-control" type="number" autocomplete="no-autofill-please">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-n3">
                    <a class="btn-filter-close btn btn-main-blue btn-default text-uppercase w-100 rounded-0"
                        data-toggle="collapse" href="#navbarFilters" role="button" aria-expanded="false"
                        aria-controls="navbarFilters">Застосувати</a>
                </div>
            </div>
        </div>
    </main>

@endsection
