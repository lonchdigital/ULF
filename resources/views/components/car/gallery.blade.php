{{-- @dd($gallery) --}}

<section class="gallery-car pb-4 pb-md-7 pb-lg-9">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="gallery-car--inner">
                    <!-- main slider -->
                    <div class="gallery-car--swiper mb-4 mb-xl-5">
                        <div class="swiper-wrapper">

                            @foreach ($car->images as $image)
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="{{ '/storage/' . $image->Url }}">
                                        <div class="wrap-img">
                                            <img src="{{ '/storage/' . $image->Url }}" alt="img">
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination d-sm-none"></div>
                    </div>
                    <!-- thumbs slider -->
                    <div class="gallery-car-thumbs--swiper d-none d-sm-block">
                        <div class="swiper-wrapper">
                            @foreach ($car->images as $image)
                                <div class="swiper-slide">
                                    <div class="wrap-img">
                                        <img src="{{ '/storage/' . $image->Url }}" alt="img">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-2 btn-wrap d-sm-none">
                        <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                    </div>
                    <div class="d-flex d-sm-none flex-column flex-lg-row align-items-lg-center justify-content-between mb-3">
                        <div class="nav-breadcrumb">
                            <div class="h3 font-weight-bolder mb-2">{{ $car->getName() }}</div>
                            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                <ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
                                    <li class="breadcrumb-item" itemtype="https://schema.org/ListItem"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                    <li class="breadcrumb-item" itemtype="https://schema.org/ListItem"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}">{{ trans('page_name.car_park') }}</a></li>
                                    <li class="breadcrumb-item active" itemtype="https://schema.org/ListItem" aria-current="page">{{ $car->getName() }}</li>
                                </ol>
                            </nav>
                        </div>
                        <ul class="list-unstyled mb-0 car-properties-preview">
                            <li>{{ $car->vehicle->manufacturedYear }}</li>
                            <li>{{ $car->vehicle->fuelType->name }}</li> {{-- Бензин, 2.0 --}}
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
