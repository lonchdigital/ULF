@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-head mb-20">
                            <h4 class="card-head-title">{{ trans('admin.add_new_article') }}</h4>
                        </div>

                        

                        <section class="mb-50">
                            <x-admin.multilanguage-input :label="trans('admin.title')"
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
    <script src="{{ asset('admin_src/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_src/js/settings/tinymce-settings.js') }}"></script>
@endpush
