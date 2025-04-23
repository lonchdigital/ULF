{{-- @dd($subscriptionExtentional) --}}

<section class="gallery-car pb-4 pb-md-7 pb-lg-9">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="gallery-car--inner">
                    <!-- main slider -->
                    <div class="gallery-car--swiper mb-4 mb-xl-5">
                        <div class="swiper-wrapper">

                            @if( !is_null( $subscriptionExtentional) && !is_null( $subscriptionExtentional->youtube_link ) )
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" data-src="#gallery-car-video-2">
                                        <div class="wrap-img">
                                            <div class="video-wrap">
                                                @php
                                                    $imageVideo = optional($car->images->where('TypeId', 2)->first())->Url;
                                                @endphp
                                                <img src="{{ $imageVideo ? '/storage/' . $imageVideo : null }}" alt="img">
                                            </div>
                                        </div>
                                    </a>
                                    <div id="gallery-car-video-2" class="video-wrap" style="display:none">
                                        <div class="plyr__video-embed js-player">
                                            <iframe src="{{ $subscriptionExtentional->youtube_link }}" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @foreach ($car->images->where('TypeId', 2) as $image)
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

                            @if( !is_null( $subscriptionExtentional) && !is_null( $subscriptionExtentional->youtube_link ) )
                                <div class="swiper-slide">
                                    <div class="wrap-img">
                                        <div class="video-wrap">
                                            <img src="{{ $imageVideo ? '/storage/' . $imageVideo : null }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @foreach ($car->images->where('TypeId', 2) as $image)
                                <div class="swiper-slide">
                                    <div class="wrap-img">
                                        <img src="{{ '/storage/' . $image->Url }}" alt="img">
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
                            @if(!is_null($car->vehicle->fuelType))
                                <li>{{ $car->vehicle->fuelType->name }}</li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>