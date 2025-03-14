<section class="gallery-cars bg-dark-black py-7 py-md-10 py-lg-22 mb-7 mb-md-10 mb-lg-22">
    <div class="container-wrap">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="horizontal-scoll-wrapper scroll-gallery-cars--swiper">
                        <div class="scroll-gallery-cars row flex-nowrap swiper-wrapper">
                            @foreach($car->images->chunk(2) as $imagePair)
                                <div class="scroll-gallery-cars--item swiper-slide col-10 col-sm-6">
                                    <div class="row combine flex-column">
                                        @foreach($imagePair as $image)
                                            <div class="col">
                                                <div class="inner h-100 position-relative">
                                                    <div class="scroll-gallery-cars--img">
                                                        <a data-fancybox="gallery-scroll" href="{{ '/storage/' . $image->Url }}">
                                                            <div class="wrap-img">
                                                                <img class="bg-down" src="{{ '/storage/' . $image->Url }}" alt="img">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
