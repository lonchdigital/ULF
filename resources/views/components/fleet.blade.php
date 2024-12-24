<section class="our-fleet pb-7 pb-md-10 pb-lg-25">
    <div class="container">
        <div class="row mb-6">
            <div class="col">
                <div class="head font-weight-bolder mb-3 mb-md-10 text-center">{{ trans('web.could_be_interesting') }}</div>
                <div class="our-fleet-preview row">
                    @foreach ($fleetCars as $car)
                        @include('components.car.car-item', ['car' => $car])
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <a href="{{ route('catalog.page') }}" class="btn-default btn btn-block btn-outline-main-blue text-uppercase mt-0">{{ trans('web.to_car_park') }}</a>
            </div>
        </div>
    </div>
</section>