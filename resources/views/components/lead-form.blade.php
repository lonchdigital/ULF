<section id="feedBackForm" class="any-questions pb-7 pb-md-10 pb-lg-{{ $pbLg }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="inner px-4 px-md-0 py-7">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                            <div class="h3 font-m mb-2 font-weight-bolder text-md-center">{{ trans('web.have_questions') }}</div>
                            <form id="form-any-questions"
                            {{-- action="{{ route('feedback.store') }}" method="post" --}}
                            >
                                @csrf
                                {{-- @method('POST') --}}
                                <div class="row field-wrap">
                                    <div class="col-12 col-md-6">
                                        <div class="field mb-2 mb-md-8">
                                            <label class="control-label" for="any-questions-name">{{ trans('web.your_name') }}</label>
                                            <input type="text" id="any-questions-name" name="name_lead" class="form-control mb-2" placeholder="{{ trans('web.enter_name') }}" value="{{ old('name_lead') }}">
                                            @error('name_lead')
                                                <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="field mb-2 mb-md-8">
                                            <label class="control-label" for="any-questions-phone">{{ trans('web.phone_number') }}</label>
                                            <input type="tel" id="any-questions-phone" name="phone_lead" class="form-control phone-field mb-2" placeholder="+380" value="{{ old('phone_lead') }}">
                                            @error('phone_lead')
                                            <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                            @enderror

                                            <input type="hidden" name="page" value="{{ $page }}">
                                            <input type="hidden" name="current_url" value="{{ url()->full() }}">

                                            <input type="hidden" name="utm_source" value>
                                            <input type="hidden" name="utm_medium" value>
                                            <input type="hidden" name="utm_campaign" value>
                                            <input type="hidden" name="utm_term" value>
                                            <input type="hidden" name="utm_content" value>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox position-relative mb-5">
                                            <input type="checkbox" class="custom-control-input" id="form-any-questions-check" name="agree_lead" value="1">
                                            <label class="custom-control-label" for="form-any-questions-check">
                                                <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span class="link-underline"><a href="/policy">{{ trans('web.agreement_two') }}</a></span>.</span>
                                            </label>
                                            @error('agree_lead')
                                            <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                            @enderror
                                            <div class="field--help-info small-txt text-red mb-2" id="agree_lead_error_select"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-auto mx-auto">
                                        <button role="button" type="submit" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">{{ trans('web.call_me_back') }}</button>
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
