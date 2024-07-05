@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-head mb-20">
                            <h4 class="card-head-title">{{ trans('admin.car_common_settings') }}</h4>
                        </div>

                        <form class="forms-sample" action="{{ route('admin.car-common-settings.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <section class="mb-50">
                                <x-admin.multilanguage-input :label="trans('admin.first_payment_note')"
                                                             :is-required="true"
                                                             field-name="first_payment_note"
                                                             :values="[]"/>
                            </section>

                            <section class="mb-50">
                                <h6 class="card-title">{{ trans('admin.subscribe_benefits') }}</h6>

                                <div class="row" id="subscribe-benefits">

                                    @if(isset($subscribeBenefits))
                                        @foreach($subscribeBenefits as $subscribeBenefit)
                                            <div class="col-md-4 subscribe-benefit-row pb-1 mb-4" id="subscribe-benefit-id-{{ $subscribeBenefit->id }}">
                                                <div>
                                                    <div class="border border-secondary rounded p-3">
                                                        <div class="row justify-content-between align-items-center">

                                                            <div class="col-md-12">
                                                                <div class="row" id="benefit-item-{{ $subscribeBenefit->id }}">
                                                                    <div class="col-md-12">
                                                                        <x-admin.multilanguage-input
                                                                            :is-required="true"
                                                                            :label="trans('admin.item')"
                                                                            field-name="subscribe-benefit[{{ $subscribeBenefit->id }}][title]"
                                                                            field-display="title"
                                                                            :values="$subscribeBenefit->getTranslationsArray()"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-5">
                                                                <a href="#" onclick="artRemoveSubscribeBenefit(event, {{ $subscribeBenefit->id }})">
                                                                    <i class="ti-close font-weight-bold mr-2"></i>
                                                                    {{ trans('admin.delete') }}
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-12 text-center">
                                        <a href="#" id="add-subscribe-benefit" class="btn mb-2 btn-secondary">
                                            <span class="ti-plus font-weight-bold"></span>
                                            {{ trans('admin.add_item') }}
                                        </a>
                                    </div>
                                </div>
                            </section>

                            <section class="mb-50">
                                <h6 class="card-title">{{ trans('admin.subscribes_month_settings') }}</h6>

                                <div class="row">
                                    <div class="col-12 col-md-7">
                                        <div class="profile-crm-area">
                                            <div class="card mb-30">
                                                <div class="card-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs profile-tab" id="myTab" role="tablist">
                                                        @foreach(App\DataClasses\SubscribeMonthSectionsClass::get() as $subscribeMonthSection)
                                                            <li class="nav-item">
                                                                <a class="nav-link @if( $loop->first ) active show @endif" id="basic-tab" data-toggle="tab" href="#months-{{ $subscribeMonthSection['id'] }}" role="tab" aria-controls="basic" aria-selected="true">{{ $subscribeMonthSection['id'] }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        @foreach(App\DataClasses\SubscribeMonthSectionsClass::get() as $subscribeMonthSection)
                                                            <div class="tab-pane fade @if( $loop->first ) active show @endif" id="months-{{ $subscribeMonthSection['id'] }}" role="tabpanel" aria-labelledby="basic-tab">
                                                                <div class="card-body">

                                                                    @foreach($subscribeMonthSettings->where('section_id', $subscribeMonthSection['id']) as $item)

                                                                        <div class="month-setting-item" id="month-setting-item-id-{{ $item->id }}">
                                                                            <div class="checkbox checkbox-primary d-inline">
                                                                                <input type="checkbox" name="subscribe-settings[{{ $subscribeMonthSection['id'] }}][{{ $item->id }}][is_active]" id="checkbox-{{ $subscribeMonthSection['id'] }}-{{ $item->id }}" @if($item->is_active) checked @endif>
                                                                                <label for="checkbox-{{ $subscribeMonthSection['id'] }}-{{ $item->id }}" class="cr"></label>
                                                                            </div>
                                                                            <div class="art-input-field">
                                                                                <x-admin.multilanguage-input
                                                                                    :is-required="true"
                                                                                    :label="trans('admin.item')"
                                                                                    field-name="subscribe-settings[{{ $subscribeMonthSection['id'] }}][{{ $item->id }}][title]"
                                                                                    field-display="title"
                                                                                    :values="$item->getTranslationsArray()"/>
                                                                            </div>
                                                                            <div class="art-remove-button">
                                                                                <a href="#" onclick="artRemoveSubscribeMonthSetting(event, {{ $subscribeMonthSection['id'] }}, {{ $item->id }})">
                                                                                    <i class="ti-close font-weight-bold ml-10"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    @endforeach

                                                                </div>
                                                                <div class="row pt-3">
                                                                    <div class="col-md-12 text-center">
                                                                        <a href="#" id="add-subscribe-month-setting-{{ $subscribeMonthSection['id'] }}" class="btn mb-2 btn-secondary" data-tab-id="{{ $subscribeMonthSection['id'] }}">
                                                                            <span class="ti-plus font-weight-bold"></span>
                                                                            {{ trans('admin.add_item') }}
                                                                        </a>
                                                                    </div>
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

                            <section class="mb-50">
                                <h6 class="card-title">{{ trans('admin.faqs_cars') }}</h6>

                                <div class="row" id="faqs-cars">
                                    @if(isset($faqsCars))
                                        @foreach($faqsCars as $faqCar)

                                            <div class="col-12 faq-car-row pb-1 mb-4" id="faq-car-id-{{ $faqCar->id }}">
                                                <div class="border border-secondary rounded p-3">
                                                    <div class="row justify-content-between align-items-center">

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <x-admin.multilanguage-input
                                                                        :is-required="true"
                                                                        :label="trans('admin.question')"
                                                                        field-name="faqs[{{ $faqCar->id }}][question]"
                                                                        field-display="question"
                                                                        :values="$faqCar->getTranslationsArray()"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <x-admin.multilanguage-text-area
                                                                        :is-required="true"
                                                                        :label="trans('admin.answer')"
                                                                        field-name="faqs[{{ $faqCar->id }}][answer]"
                                                                        field-display="answer"
                                                                        :values="$faqCar->getTranslationsArray()"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <a href="#" onclick="artRemoveFaqsCarsRow(event, {{ $faqCar->id }})">
                                                                <i class="ti-close font-weight-bold mr-2"></i>
                                                                {{ trans('admin.delete') }}
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-12 text-center">
                                        <a href="#" id="add-faqs-cars" class="btn mb-2 btn-secondary">
                                            <span class="ti-plus font-weight-bold"></span>
                                            {{ trans('admin.add') }}
                                        </a>
                                    </div>
                                </div>
                            </section>

                            <button type="submit" class="btn btn-primary mr-2">{{ trans('admin.save') }}</button>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection

@push('scripts')

    <script type='text/javascript'>
        $(document).ready(function () {

            /* add subscribe benefit */
            $('#add-subscribe-benefit').click(function (event) {
                event.preventDefault();
                let highestSubscribeBenefitId = 0;
                $('.subscribe-benefit-row').each(function () {
                    const id = parseInt($(this).attr('id').replace('subscribe-benefit-id-', ''));
                    if (id >= highestSubscribeBenefitId) {
                        highestSubscribeBenefitId = id;
                    }
                });

                highestSubscribeBenefitId++;
                addSubscribeBenefit(highestSubscribeBenefitId);
            });


            /* add subscribe Month Settings */
            $(document).on('click', '[id^="add-subscribe-month-setting-"]', function(event) {
                event.preventDefault();
                let tabID = $(this).data('tab-id');
                let highestSettingID = 0;

                $('#months-' + tabID + ' .card-body .month-setting-item').each(function () {
                    const id = parseInt($(this).attr('id').replace('month-setting-item-id-', ''));
                    if (id >= highestSettingID) {
                        highestSettingID = id;
                    }
                });
                highestSettingID++;

                addSubscribeMonthSetting(tabID, highestSettingID);
            });


            /* add FAQs */
            $('#add-faqs-cars').click(function (event) {
                event.preventDefault();
                let highestFAQsId = 0;
                $('.faq-car-row').each(function () {
                    const id = parseInt($(this).attr('id').replace('faq-car-id-', ''));
                    if (id >= highestFAQsId) {
                        highestFAQsId = id;
                    }
                });
                highestFAQsId++;


                addFaqsCarsRow(highestFAQsId);
            });

        });


        function addSubscribeBenefit(id) {
            $('#subscribe-benefits').append(`
                <div class="col-md-4 subscribe-benefit-row pb-1 mb-4" id="subscribe-benefit-id-${id}">
                    <div>
                        <div class="border border-secondary rounded p-3">
                            <div class="row justify-content-between align-items-center">

                                <div class="col-md-12">
                                    <div class="row" id="benefit-item-${id}">
                                        <div class="col-md-12">
                                            <x-admin.multilanguage-input
                                                :is-required="true"
                                                :label="trans('admin.item')"
                                                field-name="subscribe-benefit[${id}][title]"
                                                :values="[]"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <a href="#" onclick="artRemoveSubscribeBenefit(event, ${id})">
                                        <i class="ti-close font-weight-bold mr-2"></i>
                                        {{ trans('admin.delete') }}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            `);

        }
        function artRemoveSubscribeBenefit(event, id) {
            event.preventDefault();

            $(`#subscribe-benefit-id-${id}`).remove();
        }

        function addSubscribeMonthSetting(tabID, id) {
            $('#months-' + tabID + ' .card-body').append(`
                <div class="month-setting-item" id="month-setting-item-id-${id}">
                    <div class="checkbox checkbox-primary d-inline">
                        <input type="checkbox" name="subscribe-settings[${tabID}][${id}][is_active]" id="checkbox-${tabID}-${id}">
                        <label for="checkbox-${tabID}-${id}" class="cr"></label>
                    </div>
                    <div class="art-input-field">
                        <x-admin.multilanguage-input
                            :is-required="true"
                            :label="trans('admin.item')"
                            field-name="subscribe-settings[${tabID}][${id}][title]"
                            :values="[]"/>
                    </div>
                    <div class="art-remove-button">
                        <a href="#" onclick="artRemoveSubscribeMonthSetting(event, ${tabID}, ${id})">
                            <i class="ti-close font-weight-bold ml-10"></i>
                        </a>
                    </div>
                </div>
            `);
        }
        function artRemoveSubscribeMonthSetting(event, tabID, id) {
            event.preventDefault();

            $(`#months-${tabID} .card-body #month-setting-item-id-${id}`).remove();
        }

        function addFaqsCarsRow($id) {
            $('#faqs-cars').append(`
                <div class="col-12 faq-car-row pb-1 mb-4" id="faq-car-id-${$id}">
                    <div class="border border-secondary rounded p-3">
                        <div class="row justify-content-between align-items-center">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-admin.multilanguage-input
                                            :is-required="true"
                                            :label="trans('admin.question')"
                                            field-name="faqs[${$id}][question]"
                                            :values="[]"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-admin.multilanguage-text-area
                                            :is-required="true"
                                            :label="trans('admin.answer')"
                                            field-name="faqs[${$id}][answer]"
                                            :values="[]"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <a href="#" onclick="artRemoveFaqsCarsRow(event, ${$id})">
                                    <i class="ti-close font-weight-bold mr-2"></i>
                                    {{ trans('admin.delete') }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            `);
        }
        function artRemoveFaqsCarsRow(event, id) {
            event.preventDefault();

            $(`#faq-car-id-${id}`).remove();
        }

    </script>

@endpush
