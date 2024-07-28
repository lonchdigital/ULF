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
                            <h4 class="card-head-title">Home Page</h4>
                        </div>

                        <form class="forms-sample" action="{{ route('admin.home-page-settings.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <section>
                                <div class="card-head mb-20">
                                    <h6 class="card-head-title">Hero header</h6>
                                </div>

                                <div class="form-group">
                                    <p style="margin-bottom: 8px">{{ trans('admin.bg_image') . ' (250px x 100px)' }}</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img @if(isset($homeMainBlock) && isset($homeMainBlock->image)) src="{{ '/storage/' . $homeMainBlock->image }}" @else style="display: none;" @endif id="home_hero_image" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="file" name="hero[bg_image]" id="bg_image_input" class="custom-input-file">
                                            <label for="bg_image_input">
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
                                    <label for="video">Video</label>
                                    <input type="text"
                                        class="form-control"
                                        id="video"
                                        name="hero[video]"
                                        value="{{ (!is_null($homeMainBlock)) ? $homeMainBlock->video: '' }}"
                                    >
                                    @error('video')
                                    <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <x-admin.multilanguage-input :label="trans('admin.title')"
                                        :is-required="false"
                                        field-name="hero[title]"
                                        field-display="title"
                                        :values="(!is_null($homeMainBlock)) ? $homeMainBlock->getTranslationsArray(): []"/>
                                </div>

                                <div class="form-group art-running-text">
                                    <x-admin.multilanguage-text-area
                                        :is-required="false"
                                        :label="trans('admin.running_text')"
                                        field-name="hero[running_text]"
                                        field-display="running_text"
                                        :values="(!is_null($homeMainBlock)) ? $homeMainBlock->getTranslationsArray(): []"/>
                                </div>

                                <div class="form-group">
                                    <x-admin.multilanguage-input :label="trans('admin.description')"
                                        :is-required="false"
                                        field-name="hero[description]"
                                        field-display="description"
                                        :values="(!is_null($homeMainBlock)) ? $homeMainBlock->getTranslationsArray(): []"/>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.button_one')"
                                                :is-required="false"
                                                field-name="hero[button_one]"
                                                field-display="button_one"
                                                :values="(!is_null($homeMainBlock)) ? $homeMainBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.button_two')"
                                                :is-required="false"
                                                field-name="hero[button_two]"
                                                field-display="button_two"
                                                :values="(!is_null($homeMainBlock)) ? $homeMainBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>

                                </div>
                            </section>

                            <hr class="my-5">

                            <section class="mb-50">
                                <div class="card-head mb-20">
                                    <h6 class="card-head-title">{{ trans('admin.benefits') }}</h6>
                                </div>

                                <p><b>Row one</b></p>
                                <div class="row home-benefits-row" id="home-benefits-row-one">
                                    @if(count($homeBenefitBlock) > 0)
                                        @foreach($homeBenefitBlock->where('row', 1) as $benefit)
                                            <div class="col-md-4 home-benefit-row-one pb-1 mb-4" id="home-benefit-id-{{ $benefit->id }}">
                                                <div>
                                                    <div class="border border-secondary rounded p-3">
                                                        <div class="row justify-content-between align-items-center">

                                                            <div class="col-md-12">
                                                                <div class="row" id="benefit-item-{{ $benefit->id }}">
                                                                    <div class="col-md-12">
                                                                        <x-admin.multilanguage-input
                                                                            :is-required="false"
                                                                            :label="trans('admin.item')"
                                                                            field-name="home-benefit[1][{{ $benefit->id }}][title]"
                                                                            field-display="title"
                                                                            :values="$benefit->getTranslationsArray()"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-5">
                                                                <a href="#" onclick="artRemoveHomeBenefitRowOne(event, {{ $benefit->id }})">
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
                                        <a href="#" id="add-subscribe-benefit-row-one" class="btn mb-2 btn-secondary">
                                            <span class="ti-plus font-weight-bold"></span>
                                            {{ trans('admin.add_item') }}
                                        </a>
                                    </div>
                                </div>


                                <p><b>Row two</b></p>
                                <div class="row home-benefits-row" id="home-benefits-row-two">
                                    @if(count($homeBenefitBlock) > 0)
                                        @foreach($homeBenefitBlock->where('row', 2) as $benefit)
                                            <div class="col-md-4 home-benefit-row-two pb-1 mb-4" id="home-benefit-id-{{ $benefit->id }}">
                                                <div>
                                                    <div class="border border-secondary rounded p-3">
                                                        <div class="row justify-content-between align-items-center">

                                                            <div class="col-md-12">
                                                                <div class="row" id="benefit-item-{{ $benefit->id }}">
                                                                    <div class="col-md-12">
                                                                        <x-admin.multilanguage-input
                                                                            :is-required="false"
                                                                            :label="trans('admin.item')"
                                                                            field-name="home-benefit[2][{{ $benefit->id }}][title]"
                                                                            field-display="title"
                                                                            :values="$benefit->getTranslationsArray()"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-5">
                                                                <a href="#" onclick="artRemoveHomeBenefitRowTwo(event, {{ $benefit->id }})">
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
                                        <a href="#" id="add-subscribe-benefit-row-two" class="btn mb-2 btn-secondary">
                                            <span class="ti-plus font-weight-bold"></span>
                                            {{ trans('admin.add_item') }}
                                        </a>
                                    </div>
                                </div>


                            </section>

                            <hr class="my-5">

                            <section>
                                <div class="card-head mb-20">
                                    <h6 class="card-head-title">Ready to drive?</h6>
                                </div>

                                <div class="form-group">
                                    <p style="margin-bottom: 8px">{{ trans('admin.image') . ' (250px x 100px)' }}</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img @if(isset($homeDriveBlock) && isset($homeDriveBlock->image)) src="{{ '/storage/' . $homeDriveBlock->image }}" @else style="display: none;" @endif id="home_drive_image" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="file" name="drive[image]" id="drive_image_input" class="custom-input-file">
                                            <label for="drive_image_input">
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
                                    <x-admin.multilanguage-input :label="trans('admin.title')"
                                        :is-required="false"
                                        field-name="drive[title]"
                                        field-display="title"
                                        :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                </div>

                                <div class="form-group">
                                    <x-admin.multilanguage-text-area :label="trans('admin.description')"
                                        :is-required="false"
                                        field-name="drive[description]"
                                        field-display="description"
                                        :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.step_one')"
                                                :is-required="false"
                                                field-name="drive[step_one]"
                                                field-display="step_one"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.step_two')"
                                                :is-required="false"
                                                field-name="drive[step_two]"
                                                field-display="step_two"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.step_three')"
                                                :is-required="false"
                                                field-name="drive[step_three]"
                                                field-display="step_three"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.step_four')"
                                                :is-required="false"
                                                field-name="drive[step_four]"
                                                field-display="step_four"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.step_five')"
                                                :is-required="false"
                                                field-name="drive[step_five]"
                                                field-display="step_five"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.button_one')"
                                                :is-required="false"
                                                field-name="drive[button_one]"
                                                field-display="button_one"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-admin.multilanguage-input :label="trans('admin.button_two')"
                                                :is-required="false"
                                                field-name="drive[button_two]"
                                                field-display="button_two"
                                                :values="(!is_null($homeDriveBlock)) ? $homeDriveBlock->getTranslationsArray(): []"/>
                                        </div>
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

            $('#bg_image_input').change(function () {
                const [file] = $(this).prop('files');
                if (file) {
                    $('#home_hero_image').attr('src', URL.createObjectURL(file)).attr('style', '');
                }
            });
            $('#drive_image_input').change(function () {
                const [file] = $(this).prop('files');
                if (file) {
                    $('#home_drive_image').attr('src', URL.createObjectURL(file)).attr('style', '');
                }
            });

            /* add subscribe benefit */
            $('#add-subscribe-benefit-row-one').click(function (event) {
                event.preventDefault();
                let highestBenefitRowOneId = 0;
                $('.home-benefit-row-one').each(function () {
                    const id = parseInt($(this).attr('id').replace('home-benefit-id-', ''));
                    if (id >= highestBenefitRowOneId) {
                        highestBenefitRowOneId = id;
                    }
                });

                highestBenefitRowOneId++;
                addHomeBenefitRowOne(highestBenefitRowOneId);
            });
            $('#add-subscribe-benefit-row-two').click(function (event) {
                event.preventDefault();
                let highestBenefitRowTwoId = 0;
                $('.home-benefit-row-two').each(function () {
                    const id = parseInt($(this).attr('id').replace('home-benefit-id-', ''));
                    if (id >= highestBenefitRowTwoId) {
                        highestBenefitRowTwoId = id;
                    }
                });

                highestBenefitRowTwoId++;
                addHomeBenefitRowTwo(highestBenefitRowTwoId);
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


        function addHomeBenefitRowOne(id) {
            $('#home-benefits-row-one').append(`
                <div class="col-md-4 home-benefit-row-one pb-1 mb-4" id="home-benefit-id-${id}">
                    <div>
                        <div class="border border-secondary rounded p-3">
                            <div class="row justify-content-between align-items-center">

                                <div class="col-md-12">
                                    <div class="row" id="benefit-item-${id}">
                                        <div class="col-md-12">
                                            <x-admin.multilanguage-input
                                                :is-required="false"
                                                :label="trans('admin.item')"
                                                field-name="home-benefit[1][${id}][title]"
                                                field-display="title"
                                                :values="[]"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <a href="#" onclick="artRemoveHomeBenefitRowOne(event, ${id})">
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
        function artRemoveHomeBenefitRowOne(event, id) {
            event.preventDefault();

            $(`#home-benefits-row-one #home-benefit-id-${id}`).remove();
        }


        function addHomeBenefitRowTwo(id) {
            $('#home-benefits-row-two').append(`
                <div class="col-md-4 home-benefit-row-two pb-1 mb-4" id="home-benefit-id-${id}">
                    <div>
                        <div class="border border-secondary rounded p-3">
                            <div class="row justify-content-between align-items-center">

                                <div class="col-md-12">
                                    <div class="row" id="benefit-item-${id}">
                                        <div class="col-md-12">
                                            <x-admin.multilanguage-input
                                                :is-required="false"
                                                :label="trans('admin.item')"
                                                field-name="home-benefit[2][${id}][title]"
                                                field-display="title"
                                                :values="[]"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <a href="#" onclick="artRemoveHomeBenefitRowTwo(event, ${id})">
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
        function artRemoveHomeBenefitRowTwo(event, id) {
            event.preventDefault();

            $(`#home-benefits-row-two #home-benefit-id-${id}`).remove();
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
                                            :is-required="false"
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
                                            :is-required="false"
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
