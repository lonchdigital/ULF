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
                            <h4 class="card-head-title">{{ trans('admin.edit_article') }}</h4>
                        </div>

                        <form class="forms-sample" action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class=form-group">
                                <x-admin.multilanguage-input :label="trans('admin.title')"
                                    :is-required="true"
                                    field-name="name"
                                    field-display="name"
                                    :values="$article->getTranslationsArray()"/>
                            </div>

                            <div class="form-group">
                                <label for="slug">URL</label>
                                <input type="text"
                                    class="form-control"
                                    id="slug"
                                    name="slug"
                                    value="{{ $article->page->slug }}"
                                >
                                @error('slug')
                                <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <p style="margin-bottom: 8px">{{ trans('admin.preview') . ' (250px x 100px)' }}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img @if(isset($article) && isset($article->image_url)) src="{{ $article->image_url }}" @else style="display: none;" @endif id="article_image" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="file" name="preview_image" id="preview_image_input" class="custom-input-file">
                                        <label for="preview_image_input">
                                            <i class="fa fa-upload"></i>
                                            <span>{{ trans('admin.choose_image') }}</span>
                                        </label>
                                        @error('preview_image')
                                            <label id="preview_image-error" class="error mt-2 text-danger" for="preview_image">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-admin.multilanguage-text-area
                                    :is-required="true"
                                    :label="trans('admin.desc')"
                                    field-name="description"
                                    field-display="description"
                                    :values="$article->getTranslationsArray()"/>
                            </div>

                            <div class="form-group">
                                <x-admin.multilanguage-text-area
                                    :is-required="true"
                                    :label="trans('admin.text')"
                                    field-name="text"
                                    field-display="text"
                                    :values="$article->getTranslationsArray()"/>
                            </div>


                            <div class=form-group">
                                <x-admin.multilanguage-input :label="trans('admin.meta_title')"
                                    :is-required="true"
                                    field-name="meta_title"
                                    field-display="meta_title"
                                    :values="$article->page->getTranslationsArray()"/>
                            </div>
                            <div class=form-group">
                                <x-admin.multilanguage-text-area
                                    :is-required="true"
                                    :label="trans('admin.meta_description')"
                                    field-name="meta_description"
                                    field-display="meta_description"
                                    :values="$article->page->getTranslationsArray()"/>
                            </div>

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
    <script src="{{ asset('admin_src/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_src/js/settings/tinymce-settings.js') }}"></script>

    <script type='text/javascript'>
        $(document).ready(function () {

            $('#preview_image_input').change(function () {
                const [file] = $(this).prop('files');
                if (file) {
                    $('#article_image').attr('src', URL.createObjectURL(file)).attr('style', '');
                }
            });

        });
    </script>

@endpush
