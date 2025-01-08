<section id="testDriveForm" class="test-drive pb-md-10 pb-lg-{{ $pbLg }} order-last order-md-first">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="inner px-4 px-md-0 py-7">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                            <div class="h3 font-m mb-2 font-weight-bolder text-md-center">{{ trans('web.go_on_test_drive') }}</div>
                            <div class="h4 font-m font-weight-bolder mb-3 mb-md-9 text-md-center">{{ trans('web.you_can_try_than_subscribe') }}</div>
                            <form id="form-test-drive"  action="{{ route('test.drive.feedback.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row field-wrap">
                                    <div class="col-12 col-md-6">
                                        <div class="field mb-2 mb-md-8">
                                            <label class="control-label" for="name">{{ trans('web.your_name') }}</label>
                                            <input type="text" name="name_drive" id="name" class="form-control mb-2" placeholder="{{ trans('web.enter_name') }}" value="{{ old('name_drive') }}">
                                            @error('name_drive')
                                                <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="field mb-2 mb-md-8">
                                            <label class="control-label" for="phone">{{ trans('web.phone_number') }}</label>
                                            <input type="tel" name="phone_drive" id="phone" class="form-control phone-field mb-2" placeholder="+380" value="{{ old('phone_drive') }}">
                                            @error('phone_drive')
                                                <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="page" value="{{ $page }}">
                                    <input type="hidden" name="current_url" value="{{ url()->full() }}">

                                    <input type="hidden" name="utm_source" value>
                                    <input type="hidden" name="utm_medium" value>
                                    <input type="hidden" name="utm_campaign" value>
                                    <input type="hidden" name="utm_term" value>
                                    <input type="hidden" name="utm_content" value>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox position-relative mb-5">
                                            <input type="checkbox" class="custom-control-input" id="form-test-drive-check" name="agree_drive" value="1">
                                            <label class="custom-control-label" for="form-test-drive-check">
                                                <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span class="link-underline"><a href="/policy">{{ trans('web.agreement_two') }}</a></span>.</span>
                                            </label>
                                            @error('agree_drive')
                                            <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-md-auto mx-auto">
                                        <button role="button" type="submit" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">{{ trans('web.want_to_test') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
