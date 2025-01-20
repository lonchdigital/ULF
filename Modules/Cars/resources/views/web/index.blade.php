@extends('web.layout.index')

@section('title', 'Catalog')

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

    @if (isset($url['ua']) && isset($url['ru']))
        <link rel="canonical" href="{{ $url[app()->getLocale()] }}">
        <meta property="og:url" content="{{ $url[app()->getLocale()] }}" />

        <link rel="alternate" href="{{ $url['ua'] }}" hreflang="uk-UA">
        <link rel="alternate" href="{{ $url['ru'] }}" hreflang="ru-UA">
        <link rel="alternate" href="{{ $url['ua'] }}" hreflang="x-default">
    @endif

    @vite(['Modules/Cars/resources/js/cars-catalog.js'])
    @vite(['front/src/js/modules/filter.js'])
    <script>
        window.model = @json( (request()->get('model')) ? request()->get('model') : 0 );
        window.manufacturersData = @json($filters['manufacturers']);
        window.pricesMax = @json($filters['prices']['max']);
        window.pricesMin = @json($filters['prices']['min']);
        window.pricesMinCurrent = @json( (request()->get('priceMin') ? request()->get('priceMin') : $filters['prices']['min']) );
        window.pricesMaxCurrent = @json( (request()->get('priceMax') ? request()->get('priceMax') : $filters['prices']['max']) );
    </script>
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

                                            <div class="art-select-options art-sort-catalog">
                                                <a href="#" data-value="0" class="filter-option">{{ trans('web.sort_by_default') }}</a>
                                                <a href="#" class="filter-option" data-value="price_up">{{ trans('web.price_up') }}</a>
                                                <a href="#" class="filter-option" data-value="price_down">{{ trans('web.price_down') }}</a>
                                                <a href="#" class="filter-option" data-value="popularity_up">{{ trans('web.more_popular') }}</a>
                                                <a href="#" class="filter-option" data-value="popularity_down">{{ trans('web.less_popular') }}</a>
                                                <input type="hidden" id="sort-catalog-input" value="{{ ( request()->get('order') ) ? request()->get('order') : "0"; }}">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-reset btn-filter collapsed"
                                            data-toggle="collapse" data-target="#navbarFilters"
                                            aria-controls="navbarFilters" aria-expanded="false"
                                            aria-label="Toggle navigation" role="button" id="toggleFilter">
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
                                        <img src="{{ asset('static_images/car-6.png') }}" alt="Image">
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
                                        <img src="{{ asset('static_images/bg-car-preview.png') }}" class="bg-down" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('components.test-drive-lead-form', ['page' => 'Car Catalog Page', 'pbLg' => 22])

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

            <div class="sidebar collapse" id="navbarFilters">
                <div class="d-flex justify-content-between mb-3">
                    <div class="filter-title mr-4">Фільтри</div>
                    <button type="button" class="btn-close btn btn-reset" data-toggle="collapse" href="#navbarFilters"
                        aria-expanded="false" aria-controls="navbarFilters">
                        <svg class="i-close">
                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
                        </svg>
                    </button>
                </div>
                <div class="sidebar-filter">
                    <div class="filter-item">
                        <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}" class="btn-clear-filter btn-default btn-transparent btn btn-block mt-0 p-0 align-content-center mb-3">
                            Очистити
                        </a>
                    </div>

                    {{-- @dd($filters['manufacturers']) --}}
                    
                    @if( !is_null($filters['manufacturers']) )
                        <div class="filter-item">
                            <div class="field-wrap mb-3">
                                <div class="field">
                                    <label for="select-choose-manufacturer" class="small-txt font-weight-bold text-grey mb-1">Марка</label>
                                    <div class="select-wrap">
                                        <select id="select-choose-manufacturer" class="select-choose-manufacturer" name="select-choose-manufacturer">
                                            <option value="0">Оберіть марку авто</option>
                                            @foreach ($filters['manufacturers'] as $key => $manufacturer)
                                                <option value="{{ $key }}" @if(request()->get('manufacturer') == $key) selected @endif>{{ $manufacturer['manufacturer_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="select-choose-model-container" class="filter-item{{ is_null(request()->get('manufacturer')) ? ' d-none' : '' }}">
                            <div class="field-wrap mb-3">
                                <div class="field">
                                    <label for="select-choose-model" class="small-txt font-weight-bold text-grey mb-1">Модель</label>
                                    <div class="select-wrap">
                                        <select id="select-choose-model" class="select-choose-model" name="select-choose-model">
                                            <option value="0">Оберіть модель</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="filter-item">
                        <div class="field-wrap mb-6">
                            <div class="field">
                                <div class="small-txt font-weight-bold text-grey mb-1">Ціна $ / міс.</div>
                                <div class="inner">
                                    <input class="currency-first form-control price-filter-min" type="number" value="{{ ( request()->get('priceMin') ) ? request()->get('priceMin') : $filters['prices']['min'] }}">
                                    <input class="currency-last form-control price-filter-max" type="number" value="{{ ( request()->get('priceMax') ) ? request()->get('priceMax') : $filters['prices']['max'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div id="currency-range-slider" class="price-slider slider-range position-relative">
                                <div class="range-bar-full"></div>
                            </div>
                        </div>
                    </div>
                    
                    @if( count($filters['fuelTypes']) > 0 )
                        <div class="filter-item">
                            <div class="field-wrap mb-3">
                                <div class="field">
                                    {{-- <div class="field--help-info small-txt text-red mb-1">Оберіть марку авто</div> --}}
                                    <label for="select-choose-fuel-types" class="small-txt font-weight-bold text-grey mb-1">Тип палива</label>
                                    <div class="select-wrap">
                                        <select class="select-choose-fuel-types" name="select-choose-fuel-types">
                                            <option value="0">Оберіть тип палива</option>
                                            @foreach ($filters['fuelTypes'] as $fuelType)
                                                <option value="{{ $fuelType->id }}" @if(request()->get('fuelType') == $fuelType->id) selected @endif>{{ $fuelType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="filter-item">
                        <div class="field-wrap mb-6">
                            <div class="field">
                                {{-- <div class="field--help-info small-txt text-red mb-1">Вкажіть рік випуску</div> --}}
                                <div class="small-txt font-weight-bold text-grey mb-1">Рік випуску</div>
                                <div class="inner">
                                    <div class="datepicker">
                                        <input id="graduation-year-first" @if(request()->get('yearFrom')) value="{{ request()->get('yearFrom') }}" @endif class="graduation-year-from form-control" type="text" readonly
                                            data-input autocomplete="no-autofill-please">
                                    </div>
                                    <div class="datepicker">
                                        <input id="graduation-year-last" @if(request()->get('yearTo')) value="{{ request()->get('yearTo') }}" @endif class="graduation-year-to form-control" type="text" readonly
                                            data-input autocomplete="no-autofill-please">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if( count($filters['types']) > 0 )
                        @php
                            $selectedBodyTypes = request()->get('bodyTypes') ? explode(',', request()->get('bodyTypes')) : [];
                        @endphp
                        <div class="filter-item">
                            <div class="small-txt font-weight-bold text-grey mb-1">Тип кузову</div>
                            <div class="mb-6">
                                @foreach ($filters['types'] as $type)
                                    <div class="custom-control custom-checkbox position-relative mb-2">
                                        <input 
                                            type="checkbox" 
                                            value="{{ $type->id }}" 
                                            name="body-type-{{ $type->id }}" 
                                            class="body-type-input custom-control-input" 
                                            id="body-type-{{ $type->id }}"
                                            @if(in_array($type->id, $selectedBodyTypes)) checked @endif
                                        >
                                        <label class="custom-control-label" for="body-type-{{ $type->id }}">
                                            <span class="custom-checkbox--info">{{ $type->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if( count($filters['driverTypes']) > 0 )
                        @php
                            $selectedDriverTypes = request()->get('driverTypes') ? explode(',', request()->get('driverTypes')) : [];
                        @endphp
                        <div class="filter-item">
                            <div class="small-txt font-weight-bold text-grey mb-1">Привод</div>
                            <div class="mb-6">
                                @foreach ($filters['driverTypes'] as $driverType)
                                    <div class="custom-control custom-checkbox position-relative mb-2">
                                        <input 
                                            type="checkbox" 
                                            value="{{ $driverType->id }}" 
                                            name="dryver-type-{{ $driverType->id }}" 
                                            class="dryver-type-input custom-control-input" 
                                            id="dryver-type-{{ $driverType->id }}"
                                            @if(in_array($driverType->id, $selectedDriverTypes)) checked @endif
                                        >
                                        <label class="custom-control-label" for="dryver-type-{{ $driverType->id }}">
                                            <span class="custom-checkbox--info">{{ $driverType->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                {{-- <div class="field--help-info small-txt text-red mb-1">Вкажіть об‘єм двигуна</div> --}}
                                <div class="small-txt font-weight-bold text-grey mb-1">Об‘єм двигуна (л)</div>
                                <div class="inner">
                                    <input class="form-control engine-volume-from" @if(request()->get('engineFrom')) value="{{ request()->get('engineFrom') }}" @endif type="number" autocomplete="no-autofill-please">
                                    <input class="form-control engine-volume-to" @if(request()->get('engineTo')) value="{{ request()->get('engineTo') }}" @endif type="number" autocomplete="no-autofill-please">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-n3">
                    <a id="filter-cars-button" class="btn-filter-close btn btn-main-blue btn-default text-uppercase w-100 rounded-0"
                        data-toggle="collapse" href="#navbarFilters" aria-expanded="false"
                        aria-controls="navbarFilters">Застосувати</a>
                </div>
            </div>
        </div>
    </main>

@endsection
