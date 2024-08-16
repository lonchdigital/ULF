@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-head mb-20">
                            <h4 class="card-head-title">{{ trans('admin.edit_history') }}</h4>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="forms-sample" action="{{ route('client.update', ['client' => $client]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class=form-group">
                                <x-admin.multilanguage-input :label="trans('admin.name')"
                                     :is-required="false"
                                     field-name="name"
                                     field-display="name"
                                     :values="$client->getTranslationsArray()"/>
                            </div>

                            <div class=form-group">
                                <x-admin.multilanguage-input :label="trans('admin.history_title')"
                                     :is-required="false"
                                     field-name="history_title"
                                     field-display="history_title"
                                     :values="$client->getTranslationsArray()"/>
                            </div>

                            <div class="form-group">
                                <x-admin.multilanguage-text-area
                                    :is-required="false"
                                    :label="trans('admin.desc')"
                                    field-name="description"
                                    field-display="description"
                                    :values="$client->getTranslationsArray()"/>
                            </div>

                            <div class="form-group">
                                <p style="margin-bottom: 8px">{{ trans('admin.preview') . ' (760px x 1084px)' }}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img @if(isset($client) && isset($client->image_url)) src="{{ $client->image_url }}" style="width: 300px" @else style="display: none;" @endif id="article_image" alt="">
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
                                <label for="video">video (MP4)</label>
                                <input type="file" class="form-control" name="video" accept="video/mp4">
                                {{ $client->video }}

                                @error('video')
                                <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="video">YouTube</label>
                                <input type="text" class="form-control" name="youtube" value="{{ $client->youtube }}">
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
