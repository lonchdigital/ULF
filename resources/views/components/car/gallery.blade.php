{{-- @dd($gallery) --}}

<section class="gallery-car pb-4 pb-md-7 pb-lg-9">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="gallery-car--inner">
                    <!-- main slider -->
                    <div class="gallery-car--swiper mb-4 mb-xl-5">
                        <div class="swiper-wrapper">
                            
                            @foreach ($gallery as $slide)
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="{{ '/storage/' . $slide->Url }}">
                                        <div class="wrap-img">
                                            <img src="{{ '/storage/' . $slide->Url }}" alt="img">
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

                            @foreach ($gallery as $slide)
                                <div class="swiper-slide">
                                    <div class="wrap-img">
                                        <img src="{{ '/storage/' . $slide->Url }}" alt="img">
                                    </div>
                                </div>
                            @endforeach

                    </div>
                    <div class="mb-2 btn-wrap d-sm-none">
                        <a href="##" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">Назад</a>
                    </div>
                    <div class="d-flex d-sm-none flex-column flex-lg-row align-items-lg-center justify-content-between mb-3">
                        <div class="nav-breadcrumb">
                            <div class="h3 font-weight-bolder mb-2">Hyundai Tucson</div>
                            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="##">Головна</a></li>
                                    <li class="breadcrumb-item"><a href="##">Автопарк</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Hyundai Tucson</li>
                                </ol>
                            </nav>
                        </div>
                        <ul class="list-unstyled mb-0 car-properties-preview">
                            <li>2023</li>
                            <li>Бензин, 2.0</li>
                            <li>Автомат</li>
                            <li>Повний привод</li>
                            <li>Київ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
