@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-head mb-20">
                            <h4 class="card-head-title">{{ trans('admin.car_common_settings') }}</h4>
                            <x-admin.multilanguage-switch/>
                        </div>


                        {{--<x-admin.multilanguage-input :label="trans('admin.name')"
                                                     :is-required="true"
                                                     field-name="test_string"
                                                     :values="[]"/>--}}



                        <section>
                            <h6 class="card-title">{{ trans('admin.subscribe_benefits') }}</h6>

                            <div class="row" id="subscribe-benefits">
                                @if(isset($subscribeBenefits))
                                    @foreach($subscribeBenefits as $subscribeBenefit)
                                        <div class="col-md-4 subscribe-benefit-row pb-1 mb-4" id="subscribe-benefit-id-{{ $subscribeBenefit->id }}">
                                            <div>
                                                <div class="border border-secondary rounded p-3">
                                                    <div class="row justify-content-between align-items-center">

                                                        <div class="col-md-12">
                                                            <div class="row" id="faq-name-{{ $subscribeBenefit->id }}">
                                                                <div class="col-md-12">
                                                                    <x-admin.multilanguage-input
                                                                        :is-required="true"
                                                                        :label="trans('admin.item')"
                                                                        field-name="faqs[{{ $subscribeBenefit->id }}][question]"
                                                                        :values="$subscribeBenefit->question ? $subscribeBenefit->getTranslations('question') : []"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <a href="#" class="btn btn-danger"
                                                               onclick="artRemoveSubscribeBenefit(event, {{ $subscribeBenefit->id }})">
                                                                <span class="ti-close font-weight-bold mr-2"></span>
                                                                {{ trans('admin.delete_item') }}
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



                        <h6 class="card-title">{{ trans('admin.subscribes_month_settings') }}</h6>


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
            let highestFAQsId = 0;
            $('.subscribe-benefit-row').each(function () {
                const id = parseInt($(this).attr('id').replace('subscribe-benefit-id-', ''));
                if (id >= highestFAQsId) {
                    highestFAQsId = id;
                }

            });

            $('#add-subscribe-benefit').click(function (event) {
                event.preventDefault();

                highestFAQsId++;
                addSubscribeBenefit(highestFAQsId);
            });
            /* add FAQs END */

        });


        function addSubscribeBenefit(id) {
            $('#subscribe-benefits').append(`
                <div class="col-md-4 subscribe-benefit-row pb-1 mb-4" id="subscribe-benefit-id-${id}">
                    <div>
                        <div class="border border-secondary rounded p-3">
                            <div class="row justify-content-between align-items-center">

                                <div class="col-md-12">
                                    <div class="row" id="faq-name-${id}">
                                        <div class="col-md-12">
                                            <x-admin.multilanguage-input
                                                :is-required="true"
                                                :label="trans('admin.item')"
                                                field-name="faqs[${id}][question]"
                                                :values="[]"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <a href="#" class="btn btn-danger"
                                       onclick="artRemoveSubscribeBenefit(event, ${id})">
                                        <span class="ti-close font-weight-bold mr-2"></span>
                                        {{ trans('admin.delete_item') }}
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

    </script>

@endpush
