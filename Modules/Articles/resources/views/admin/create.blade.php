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

                        <form class="forms-sample" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class=form-group">
                                <x-admin.multilanguage-input :label="trans('admin.title')"
                                                            :is-required="true"
                                                            field-name="tag"
                                                            :values="[]"/>
                            </div>

                            <div class="form-group">
                                <label for="slug">URL</label>
                                <input type="text"
                                    class="form-control"
                                    id="slug"
                                    name="slug"
                                    value="{{ old('meta_title') }}"
                                >
                                @error('slug')
                                <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <p style="margin-bottom: 8px">{{ trans('admin.preview') . ' (250px x 100px)' }}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img style="display: none;" id="article_image" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="file" name="preview_image" id="preview_image_input" class="custom-input-file">
                                        <label for="preview_image_input">
                                            <i class="fa fa-upload"></i>
                                            <span>Оберіть зображення…</span>
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
