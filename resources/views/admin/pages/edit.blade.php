@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-head mb-20">
                            <h4 class="card-head-title">{{ $page->name }}</h4>
                        </div>

                        <form class="forms-sample" action="{{ route('page.update', ['page' => $page]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <section>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="tab-content">
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox"
                                                        @if($page->is_show_in_header) checked @endif
                                                        id="checkbox-1"
                                                        name="is_show_in_header">
                                                        <label for="checkbox-1" class="cr">Чи показувати в меню</label>
                                                </div>
                                            </div>
                                            <div class="mt-1 text-danger ajaxError" id="error-field-is-show-in-header"></div>
                                            @error('is-show-in-header')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="tab-content">
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox"
                                                    @if($page->is_show_in_footer) checked @endif
                                                        id="checkbox-2"
                                                        name="is_show_in_footer">
                                                    <label for="checkbox-2" class="cr">Чи показувати в футері</label>
                                                </div>
                                            </div>
                                            <div class="mt-1 text-danger ajaxError" id="error-field-is-show-in-footer"></div>
                                            @error('is-show-in-footer')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="card-head mb-20">
                                    <h6 class="card-head-title">Text</h6>
                                </div>
                                <div class="form-group">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="'Content'"
                                        field-name="text"
                                        field-display="text"
                                        :values="$page->getTranslationsArray()"/>
                                </div>
                            </section>

                            <hr class="my-5">

                            <section>
                                <div class="card-head mb-20">
                                    <h6 class="card-head-title">SEO</h6>
                                </div>
                                <div class="form-group">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="'SEO блок'"
                                        field-name="seo_data"
                                        field-display="seo_text"
                                        :values="$page->getTranslationsArray()"/>
                                </div>
                                <div class=form-group">
                                    <x-admin.multilanguage-input
                                        :label="trans('admin.meta_title')"
                                        :is-required="false"
                                        field-name="meta_title"
                                        field-display="meta_title"
                                        :values="$page->getTranslationsArray()"/>
                                </div>
                                <div class=form-group">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="trans('admin.meta_description')"
                                        field-name="meta_description"
                                        field-display="meta_description"
                                        :values="$page->getTranslationsArray()"/>
                                </div>
                                <div class=form-group">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="trans('admin.meta_keywords')"
                                        field-name="meta_keywords"
                                        field-display="meta_keywords"
                                        :values="$page->getTranslationsArray()"/>
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
