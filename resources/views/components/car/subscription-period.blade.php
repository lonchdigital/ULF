<div class="h3 font-weight-bolder mb-3 d-none d-lg-block">{{ trans('web.choose_subscription_period') }} <span class="h5 font-m text-light-grey">{{ trans('web.month') }}</span></div>
<div class="h4 font-m font-weight-bolder mb-3 d-lg-none">{{ trans('web.choose_subscription_period') }} <span class="h5 font-m text-light-grey">{{ trans('web.month') }}</span></div>
<div class="subscription-period-tab">
    <div class="row">
        <div class="col-12">
            <div class="subscription-period-nav">
                <ul class="nav nav-pills" id="subscription-period--pills-tab" role="tablist">
                    @foreach(App\DataClasses\SubscribeMonthSectionsClass::get() as $subscribeMonthSection)
                        <li class="nav-item">
                            <a class="nav-link @if( $loop->first ) active @endif" id="subscription-period--pills-2-tab" data-toggle="pill" href="#subscription-period--pills-{{ $subscribeMonthSection['id'] }}" role="tab" aria-controls="subscription-period--pills-{{ $subscribeMonthSection['id'] }}" aria-selected="true"><span class="count-mounth">{{ $subscribeMonthSection['id'] }}</span><span class="rounded-transperent-bg"></span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content" id="subscription-period--pills-tabContent">

                @foreach(App\DataClasses\SubscribeMonthSectionsClass::get() as $subscribeMonthSection)
                    <div class="tab-pane @if( $loop->first ) show active @endif" id="subscription-period--pills-{{ $subscribeMonthSection['id'] }}" role="tabpanel" aria-labelledby="subscription-period--pills-{{ $subscribeMonthSection['id'] }}-tab">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row">
                                    <div class="col-6 col-sm-auto">
                                        <div class="monthly-payment">
                                            <div class="name mb-1">{{ trans('admin.monthly_payment') }}</div>
                                            <div class="price mb-1">
                                                @if(count($car->subscribePrices) > 0)
                                                    <span class="currency">$</span>
                                                    <span class="value">{{ $car->subscribePrices->where('section_id', $subscribeMonthSection['id'])->first()['monthly_payment'] }}</span> / {{ trans('web.month') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-auto">
                                        <div class="first-payment">
                                            <div class="d-flex mb-1">
                                                <div class="name">{{ trans('admin.first_payment') }}</div>
                                                <svg class="i-info" data-toggle="tooltip" title="Включає оплату першого місяця та гарантійний платіж. Гарантійний платіж повертається після закінчення підписки.">
                                                    <use xlink:href="img/icons/icons.svg#i-info"></use>
                                                </svg>
                                            </div>
                                            <div class="price mb-1">
                                                @if(count($car->subscribePrices) > 0)
                                                    <span class="currency">$</span>
                                                    <span class="value">{{ $car->subscribePrices->where('section_id', $subscribeMonthSection['id'])->first()['first_payment'] }}</span> / {{ trans('web.month') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters btn-wrap mb-5">
                            <div class="col-12 col-sm-7 col-lg-12 col-xl-8">
                                <button type="button" class="btn btn-default-orange btn-orange btn-default text-uppercase w-100" data-toggle="modal" data-target="#popup-any-questions">{{ trans('web.submit_application') }}</button>
                            </div>
                            <div class="col">
                                <a href="##" class="btn-default btn-default-white btn btn-block btn-outline-white text-uppercase mt-0" data-toggle="modal" data-target="#popup-сar-selection">{{ trans('web.test_drive') }}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="h5 text-white font-weight-bolder mb-2">{{ trans('web.you_will_get') }}:</div>
                                <div class="row">
                                    <div class="col">
                                        <div class="subscription-period-benefits">

                                            @foreach($subscribeMonthSettings->where('section_id', $subscribeMonthSection['id']) as $item)
                                                <div class="subscription-period-benefits--item {{ ($item->is_active)? 'benefits-close': 'benefits-open' }}">{{ $item->title }}</div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn-more btn-default btn-default-white btn btn-block btn-outline-white text-center text-uppercase mt-2">{{ trans('web.all_benefits') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
