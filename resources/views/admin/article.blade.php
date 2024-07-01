@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-head mb-20">
                            <h4 class="card-head-title">One Article Page</h4>
                        </div>

                        

                        <section class="mb-50">
                            <x-admin.multilanguage-input :label="trans('admin.tag')"
                                                         :is-required="true"
                                                         field-name="tag"
                                                         :values="[]"/>
                        </section>




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
