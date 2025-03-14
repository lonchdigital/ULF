<div class="h3 font-weight-bolder mb-5 d-none d-lg-block">{{ trans('web.about_car') }}</div>
<div class="h4 font-weight-bolder mb-5 d-lg-none text-center">{{ trans('web.car_info') }}</div>
<div class="h5 font-weight-bold mb-5"></div>{!! nl2br(e($car->description)) !!}
<div class="h4 font-weight-bolder mb-5">{{ trans('web.information') }}</div>
<div class="car-properties">
    @if(!is_null($car->vehicle->fuelType))
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.engine') }}</div>
            <div class="car-properties--mean">{{ $car->vehicle->fuelType->name . ', ' . $car->vehicle->engineVolume }}</div>
        </div>
    @endif
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.spend_100') }}</div>
        <div class="car-properties--mean">-</div>
    </div>
    @if(!is_null($car->vehicle->transmissionType))
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.transmission') }}</div>
            <div class="car-properties--mean">{{ $car->vehicle->transmissionType->name }}</div>
        </div>
    @endif
    <div class="car-properties--item">
        <div class="car-properties--name">{{ trans('web.mileage') }}</div>
        <div class="car-properties--mean">{{ $car->vehicle->mileage }}</div>
    </div>
    @if(!is_null($car->vehicle->driverType))
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.car_body') }}</div>
            <div class="car-properties--mean">{{ $car->vehicle->driverType->name }}</div>
        </div>
    @endif
    @if(!is_null($car->vehicle->colorType))
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.color') }}</div>
            <div class="car-properties--mean">{{ $car->vehicle->colorType->name }}</div>
        </div>
    @endif
    @if(!is_null($car->vehicle->equipment))
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.safety') }}</div>
            @if( $car->vehicle->equipment->HasSafeAbs )
                <div class="car-properties--mean">{{ trans('car.has_safe_abs') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSafeEsc )
                <div class="car-properties--mean">{{ trans('car.has_safe_esc') }}</div>
            @endif
        </div>
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.interior_upholstery') }}</div>
            @if( $car->vehicle->equipment->HasCloth )
                <div class="car-properties--mean">{{ trans('car.has_cloth') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasClothLeather )
                <div class="car-properties--mean">{{ trans('car.has_cloth_leather') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasLeather )
                <div class="car-properties--mean">{{ trans('car.has_leather') }}</div>
            @endif
        </div>
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.interior_color') }}</div>
            @if( $car->vehicle->equipment->HasSalonColorDark )
                <div class="car-properties--mean">{{ trans('car.has_salon_color_dark') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSalonColorLight )
                <div class="car-properties--mean">{{ trans('car.has_salon_color_light') }}</div>
            @endif
        </div>
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.driver_seat') }}</div>
            @if( $car->vehicle->equipment->HasSeatElectro )
                <div class="car-properties--mean">{{ trans('car.has_seat_electro') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSeatMemory )
                <div class="car-properties--mean">{{ trans('car.has_seat_memory') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSeatHand )
                <div class="car-properties--mean">{{ trans('car.has_seat_hand') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSeatHandHeight )
                <div class="car-properties--mean">{{ trans('car.has_seat_hand_height') }}</div>
            @endif
        </div>
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.passenger_seat') }}</div>
            @if( $car->vehicle->equipment->HasSeat2Electro )
                <div class="car-properties--mean">{{ trans('car.has_seat_2_electro') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSeat2Memory )
                <div class="car-properties--mean">{{ trans('car.has_seat_2_memory') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasSeat2Hand )
                <div class="car-properties--mean">{{ trans('car.has_seat_2_hand') }}</div>
            @endif
        </div>
        <div class="car-properties--item">
            <div class="car-properties--name">{{ trans('web.climate') }}</div>
            @if( $car->vehicle->equipment->HasClimatControl )
                <div class="car-properties--mean">{{ trans('car.has_climat_control') }}</div>
            @endif
            @if( $car->vehicle->equipment->HasClimatControl2 )
                <div class="car-properties--mean">{{ trans('car.has_climat_control_2') }}</div>
            @endif
        </div>
    @endif
</div>
