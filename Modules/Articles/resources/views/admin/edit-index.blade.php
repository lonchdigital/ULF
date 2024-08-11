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
                            <h4 class="card-head-title">{{ $articlesPage->name }}</h4>
                        </div>

                        <form class="forms-sample" action="{{ route('article.index.page.update', ['page' => $articlesPage]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                                        :values="$articlesPage->getTranslationsArray()"/>
                                </div>
                                <div class=form-group">
                                    <x-admin.multilanguage-input
                                        :label="trans('admin.meta_title')"
                                        :is-required="false"
                                        field-name="meta_title"
                                        field-display="meta_title"
                                        :values="$articlesPage->getTranslationsArray()"/>
                                </div>
                                <div class=form-group">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="trans('admin.meta_description')"
                                        field-name="meta_description"
                                        field-display="meta_description"
                                        :values="$articlesPage->getTranslationsArray()"/>
                                </div>
                                <div class=form-group">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="trans('admin.meta_keywords')"
                                        field-name="meta_keywords"
                                        field-display="meta_keywords"
                                        :values="$articlesPage->getTranslationsArray()"/>
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
