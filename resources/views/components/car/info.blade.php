<div class="h3 font-weight-bolder mb-5 d-none d-lg-block">{{ trans('web.about_car') }}</div>
<div class="h4 font-weight-bolder mb-5 d-lg-none text-center">{{ trans('web.car_info') }}</div>
<div class="h5 font-weight-bold mb-5">{{ $car->description }}</div>
<div class="h4 font-weight-bolder mb-5">{{ trans('web.information') }}</div>
<div class="car-properties">
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.engine') }}</div>
        <div class="car-properties--mean">{{ $car->vehicle->fuelType->name }}</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.spend_100') }}</div>
{{--        <div class="car-properties--mean">12.8</div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.transmission') }}</div>
        <div class="car-properties--mean">{{ $car->vehicle->transmissionType->name }}</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.mileage') }}</div>
        <div class="car-properties--mean">{{ $car->vehicle->mileage }}</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.car_body') }}</div>
        <div class="car-properties--mean">{{ $car->vehicle->type->name }}</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.color') }}</div>
        <div class="car-properties--mean">{{ $car->vehicle->colorType->name }}</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.safety') }}</div>
        {{--<div class="car-properties--mean">
            Антиблокувальна<br>
            система (ABS)<br>
            Парктронік
        </div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.safety_pillow') }}</div>
        {{--<div class="car-properties--mean">
            Передні<br>
            Водія та пассажира
        </div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.interior_upholstery') }}</div>
{{--        <div class="car-properties--mean">Шкіра</div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.interior_color') }}</div>
{{--        <div class="car-properties--mean">Темний</div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.driver_seat') }}</div>
{{--        <div class="car-properties--mean">З електро регулюванням</div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.passenger_seat') }}</div>
{{--        <div class="car-properties--mean">Електро регулювання</div>--}}
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.comfort') }}</div>
        <div class="car-properties--mean">-</div>
    </div>
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.climate') }}</div>
{{--        <div class="car-properties--mean">Зональний</div>--}}
        <div class="car-properties--mean">-</div>
    </div>
</div>
