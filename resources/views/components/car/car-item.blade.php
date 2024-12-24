<div class="col-12 col-md-6 col-lg-4">
    <div class="our-fleet-preview--item">
        <a href="{{ route('car.single.page', ['slug' => $car->page->slug]) }}">
            <div class="name">{{ $car->getFullName() }}</div>
        </a>
        <div class="wrap-img">
            <a
                href="{{ route('car.single.page', ['slug' => $car->page->slug]) }}">
                <img src="{{ $car->getMainImageUrl() }}" alt="Car image">
            </a>
        </div>
        @if (count($car->subscribePrices) > 0 &&
                !is_null($car->subscribePrices->where('section_id', 1)->first()->monthly_payment))
            <div class="price mb-1">
                <span class="currency">$</span>
                <span
                    class="value">{{ $car->subscribePrices->where('section_id', 1)->first()->monthly_payment }}</span>
                / {{ trans('web.month') }}
            </div>
        @endif
        <a href="{{ route('car.single.page', ['slug' => $car->page->slug]) }}"
            class="btn-arrow btn btn-block">
            <span>{{ $car->getShortDesc() }}</span>
        </a>
        @if ($car->label)
            <div
                class="discount {{ $car->label_color_id === 2 ? 'label-red' : '' }}">
                {!! $car->label !!}</div>
        @endif
    </div>
</div>