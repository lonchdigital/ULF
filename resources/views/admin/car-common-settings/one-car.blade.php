@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-head mb-20">
                            <h4 class="card-head-title">One Car Page</h4>
                        </div>


                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="exampleSelectGender">{{ trans('admin.status') }}</label>
                                    <select class="form-control" id="exampleSelectGender" name="status">
                                        @foreach(App\DataClasses\CarStatusesClass::get() as $status)
                                            <option value="{{ $status['id'] }}">{{ $status['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleSelectGender">{{ trans('admin.popularity') }}</label>
                                    <select class="form-control" id="exampleSelectGender" name="popularity">
                                        @foreach(App\DataClasses\CarPopularityClass::get() as $popularity)
                                            <option value="{{ $popularity['id'] }}">{{ $popularity['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleSelectGender">{{ trans('admin.sort_by_popularity') }}</label>
                                    <select class="form-control" id="exampleSelectGender" name="sort_by_popularity">
                                        @foreach(App\DataClasses\CarSortByPopularityClass::get() as $popularitySort)
                                            <option value="{{ $popularitySort['id'] }}">{{ $popularitySort['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <section class="mb-50">
                            <x-admin.multilanguage-input :label="trans('admin.tag')"
                                                         :is-required="true"
                                                         field-name="tag"
                                                         :values="[]"/>
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

                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName1">{{ trans('admin.monthly_payment') . ' $' }}</label>
                                                                        <input type="number"
                                                                               class="form-control"
                                                                               id="month-settings-{{ $subscribeMonthSection['id'] }}-monthly-payment"
                                                                               placeholder=""
                                                                               name="month_settings[{{ $subscribeMonthSection['id'] }}][monthly_payment]"
                                                                               value=""
                                                                        >
                                                                        @error('meta_title')
                                                                        <label id="firstname-error" class="error mt-2 text-danger" for="month-settings-{{ $subscribeMonthSection['id'] }}-monthly-payment">{{ $message }}</label>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName1">{{ trans('admin.first_payment') . ' $' }}</label>
                                                                        <input type="number"
                                                                               class="form-control"
                                                                               id="month-settings-{{ $subscribeMonthSection['id'] }}-first-payment"
                                                                               placeholder=""
                                                                               name="month_settings[{{ $subscribeMonthSection['id'] }}][first_payment]"
                                                                               value=""
                                                                        >
                                                                        @error('meta_title')
                                                                        <label id="firstname-error" class="error mt-2 text-danger" for="month-settings-{{ $subscribeMonthSection['id'] }}-first-payment">{{ $message }}</label>
                                                                        @enderror
                                                                    </div>
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
                                                                    :values="$faqCar->question ? $faqCar->getTranslations('question') : []"/>
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
                                                                    :values="$faqCar->answer ? $faqCar->getTranslations('answer') : []"/>
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

                        <div class="form-group">
                            <x-admin.multilanguage-text-area-rich
                                :is-required="true"
                                :label="'SEO блок'"
                                field-name="seo_data"
                                :values="[]"/>
                        </div>


                        <div class=form-group">
                            <x-admin.multilanguage-input :label="trans('admin.meta_title')"
                                                         :is-required="true"
                                                         field-name="meta_title"
                                                         :values="[]"/>
                        </div>
                        <div class=form-group">
                            <x-admin.multilanguage-text-area
                                :is-required="true"
                                :label="trans('admin.meta_description')"
                                field-name="meta_description"
                                :values="[]"/>
                        </div>

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




    <script src="{{ asset('admin_src/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_src/js/settings/tinymce-settings.js') }}"></script>

@endpush
