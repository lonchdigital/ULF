<footer class="footer">
    <div class="footer--top pt-5 pt-md-13 pb-0 pb-md-5 mb-2 mb-md-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                            <div class="footer-logo mb-5">
                                @if (!empty($footerPage->image))
                                    <img src="{{ $footerPage->imageUrl }}" alt="{{ 'ULF' }}">
                                @else
                                    <img src="{{ asset('static_images/logo-4.svg') }}" alt="logo">
                                @endif

                            </div>
                            <div class="row">
                                <div class="col col-lg-10 col-xl-8">
                                    <p class="mob-line font-weight-bold mb-0 text-white pb-3 mb-3 pb-md-0 mb-md-0">
                                        {{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'description')->first()->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="h5 mb-3">{{ trans('web.navigation') }}</div>
                                    <ul class="footer--nav-list mob-line list-unstyled pb-3 mb-3 pb-md-0 mb-md-0">
                                        @if ($pages->where('key', 'homepage')->first()->is_show_in_footer)
                                            <li><a
                                                    @if (optional(request()->route())->getName() ?? '' !== 'main.page') href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}" @endif>{{ trans('page_name.index') }}</a>
                                            </li>
                                        @endif

                                        @if ($pages->where('slug', 'catalog')->first()->is_show_in_footer)
                                            <li><a
                                                    @if (optional(request()->route())->getName() !== 'catalog.page') href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}" @endif>{{ trans('page_name.footer_catalog') }}</a>
                                            </li>
                                        @endif

                                        @if ($pages->where('slug', 'customer-stories')->first()->is_show_in_footer)
                                            <li><a
                                                    @if (optional(request()->route())->getName() !== 'clients.page') href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('clients.page') }}" @endif>{{ trans('page_name.client_history') }}</a>
                                            </li>
                                        @endif

                                        @if ($pages->where('slug', 'blog')->first()->is_show_in_footer)
                                            <li><a
                                                    @if (optional(request()->route())->getName() !== 'blog.page') href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('blog.page') }}" @endif>{{ trans('page_name.blog') }}</a>
                                            </li>
                                        @endif

                                        @if ($pages->where('slug', 'faq')->first()->is_show_in_footer)
                                            <li><a
                                                    @if (optional(request()->route())->getName() !== 'faq') href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('faq') }}" @endif>{{ trans('page_name.faqs') }}</a>
                                            </li>
                                        @endif

                                        @if ($pages->where('slug', 'contacts')->first()->is_show_in_footer)
                                            <li><a
                                                    @if (optional(request()->route())->getName() !== 'contacts') href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('contacts') }}" @endif>{{ trans('page_name.contacts') }}</a>
                                            </li>
                                        @endif

                                        {{-- <li><a href="#">{{ trans('page_name.agreements') }}</a></li> --}}
                                    </ul>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="footer--socials mob-line socials pb-1 mb-3 pb-md-0 mb-md-0">
                                        <div class="h5">
                                            {{-- {{ trans('web.help') }} --}}
                                            {{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'support_title')->first()->title ?? trans('web.help') }}
                                        </div>
                                        <div class="row flex-md-column mt-3">
                                            <div class="col-6 col-md">
                                                <div class="d-flex flex-column h-100 justify-content-between">
                                                    <p class="font-weight-bold mb-0">
                                                        {{-- {{ trans('web.talk_in_messengers') }} --}}
                                                        {{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'messenger_title')->first()->title ?? trans('web.talk_in_messengers') }}
                                                    </p>
                                                    <ul class="list-inline mb-0 py-2">
                                                        <li class="list-inline-item">
                                                            <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'communicate_telegram')->first()->description }}"
                                                                target="_blank">
                                                                <svg class="i-instagram">
                                                                    <use
                                                                        xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}">
                                                                    </use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'communicate_viber')->first()->description }}"
                                                                target="_blank">
                                                                <svg class="i-facebook">
                                                                    <use
                                                                        xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}">
                                                                    </use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            {{-- <div class="col-6 col-md">
                                                <div class="d-flex flex-column h-100 justify-content-between">
                                                    <p class="font-weight-bold mb-0">
                                                        {{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'bot_title')->first()->title ?? trans('web.more_info_chat_bots') }}
                                                    </p>
                                                    <ul class="list-inline mb-0 py-2">
                                                        <li class="list-inline-item">
                                                            <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'bot_telegram')->first()->description }}"
                                                                target="_blank">
                                                                <svg class="i-telegram">
                                                                    <use
                                                                        xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}">
                                                                    </use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'bot_viber')->first()->description }}"
                                                                target="_blank">
                                                                <svg class="i-viber">
                                                                    <use
                                                                        xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}">
                                                                    </use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer--main pb-md-3 mb-md-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pb-3 pb-md-0">
                    <div class="footer-contacts">
                        <div class="h5 mb-3">{{ trans('page_name.contacts') }}</div>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex flex-column flex-md-row">
                                <div class="footer-contacts--info">
                                    <ul class="list-phones list-unstyled mb-0">
                                        {{-- <li class="d-flex align-items-center">
                                            <svg class="i-phone mr-2">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-phone' }}"></use>
                                            </svg>
                                            <a href="tel:0 800 331 001">0 800 331 001</a>
                                        </li> --}}
                                        @forelse($footerPage->pageBlocks()->where('block', 'phone')->get() as $phone)
                                            <li class="d-flex align-items-center">
                                                <svg class="i-phone mr-2">
                                                    <use
                                                        xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-phone' }}">
                                                    </use>
                                                </svg>
                                                <div class="d-flex flex-column">
                                                    <a href="tel:{{ $phone->title }}">{{ $phone->title }}</a>
                                                    @if ($phone->description)
                                                        <span
                                                            class="small-txt text-light-grey">{{ $phone->description }}</span>
                                                    @endif
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="footer--socials socials mob-line pb-3 mb-3 pb-md-0 mb-md-0">
                        <div class="d-flex align-items-center mb-3">
                            <svg class="i-mail mr-2">
                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-mail' }}"></use>
                            </svg>
                            <div class="footer--email">
                                <a
                                    href="mailto:{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'email')->first()->description }}">{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'email')->first()->description }}</a>
                            </div>
                        </div>
                        {{-- <ul class="list-inline mb-0 mt-8">
                            @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->description }}"
                                        target="_blank">
                                        @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->value))
                                            <img class="i-instagram"
                                                src="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->imageUrl }}"
                                                alt="instagram" style="max-width: 30px">
                                        @else
                                            <svg class="i-instagram">
                                                <use
                                                    xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}">
                                                </use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if ($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->description)
                                <li class="list-inline-item">
                                    <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->description }}"
                                        target="_blank">
                                        @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->value))
                                            <img class="i-tiktok"
                                                src="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->imageUrl }}"
                                                alt="tik_tok" style="max-width: 30px">
                                        @else
                                            <svg class="i-tiktok">
                                                <use
                                                    xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-tiktok' }}">
                                                </use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->description }}"
                                        target="_blank">
                                        @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->value))
                                            <img class="i-facebook"
                                                src="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->imageUrl }}"
                                                alt="facebook" style="max-width: 30px">
                                        @else
                                            <svg class="i-facebook">
                                                <use
                                                    xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}">
                                                </use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->description }}"
                                        target="_blank">
                                        @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->value))
                                            <img class="i-youtube"
                                                src="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->imageUrl }}"
                                                alt="youtube" style="max-width: 30px">
                                        @else
                                            <svg class="i-youtube">
                                                <use
                                                    xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-youtube' }}">
                                                </use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->description }}"
                                        target="_blank">
                                        @if (!empty($footerPage->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->value))
                                            <img class="i-linkedin"
                                                src="{{ $footerPage->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->imageUrl }}"
                                                alt="linkedin" style="max-width: 30px">
                                        @else
                                            <svg class="i-linkedin">
                                                <use
                                                    xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-linkedin' }}">
                                                </use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer--bottom py-2 mb-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                @php
                    $policy = $footerPages->where('slug', 'policy')->first();
                    $terms = $footerPages->where('slug', 'terms')->first();
                    $rentalAgreement = $footerPages->where('slug', 'rental-agreement')->first();
                    $insuranceContract = $footerPages->where('slug', 'insurance-contract')->first();
                @endphp
                @if (!is_null($policy))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a
                            @if (request()->getRequestUri() !==
                                    App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $policy->slug])) href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $policy->slug]) }}" @endif>
                            {{-- <a href="{{ route('page.single.page', ['slug' => $policy->slug]) }}"> --}}
                            {{ $policy->name }}</a>
                    </div>
                @endif
                @if (!is_null($terms))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a
                            @if (request()->getRequestUri() !==
                                    App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $terms->slug])) href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $terms->slug]) }}" @endif>
                            {{-- <a href="{{ route('page.single.page', ['slug' => $terms->slug]) }}"> --}}
                            {{ $terms->name }}</a>
                    </div>
                @endif
                @if (!is_null($rentalAgreement))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a
                            @if (request()->getRequestUri() !==
                                    App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $rentalAgreement->slug])) href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $rentalAgreement->slug]) }}" @endif>
                            {{-- <a href="{{ route('page.single.page', ['slug' => $rentalAgreement->slug]) }}"> --}}
                            {{ $rentalAgreement->name }}</a>
                    </div>
                @endif
                @if (!is_null($insuranceContract))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a
                            @if (request()->getRequestUri() !==
                                    App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $insuranceContract->slug])) href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('page.single.page', ['slug' => $insuranceContract->slug]) }}" @endif>
                            {{ $insuranceContract->name }}
                        </a>
                    </div>
                @endif
                <div class="col-12 col-lg-auto">
                    <div class="copyright">© ULF {{ now()->year }}</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="btnTop" class="btn btn-arrow-up">
    <svg>
        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-arrow-up' }}"></use>
    </svg>
</div>
<div class="toolbar-test-drive-request py-3 d-md-none">
    <div class="row no-gutters px-3">
        <div class="col toolbar-fixed--item">
            <button type="button" class="btn-default btn btn-block btn-outline-main-blue text-uppercase"
                data-toggle="modal" data-target="#popup-сar-selection">Тест драйв</button>
        </div>
        <div class="col toolbar-fixed--item">
            <button type="button" class="btn-default btn-default-orange btn btn-block btn-outline-red text-uppercase"
                data-toggle="modal" data-target="#popup-any-questions">Подати заявку</button>
        </div>
    </div>
</div>
</div>

<div class="modal modal--custom popup-сar-selection fade" id="popup-сar-selection" data-keyboard="false" tabindex="-1"
    aria-labelledby="popup-сar-selectionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <form class="form-popup-сar-selection" id="form-сar-selection" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="modal-title font-weight-bolder mb-0">{{ __('web.car_selection') }}</div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <svg>
                                            <use
                                                xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}">
                                            </use>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <p class="mb-3">{{ __('web.specify_the_desired_brand_model_and_parameters') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-сar-selection--car-make-model">{{ __('web.car_make_and_model') }}</label>
                                <input type="text" id="popup-сar-selection--car-make-model"
                                    class="form-control mb-3" name="car" placeholder="Напр. Hyundai Santa FE"
                                    autocomplete="no-autofill-please">
                                <div class="field--help-info small-txt text-red mb-2" id="car_error_select">
                                    {{-- Введіть марку та модель авто --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-сar-selection--name">{{ __('web.your_name') }}</label>
                                <input type="text" id="popup-сar-selection---name" class="form-control mb-3"
                                    placeholder="Введіть ім’я" name="name" autocomplete="no-autofill-please">
                                <div class="field--help-info small-txt text-red mb-2" id="name_error_select">
                                    {{-- Введіть Ваше ім’я українськими літерами (кирилицею) --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-сar-selection--phone">{{ __('web.phone_number') }}</label>
                                <input type="tel" id="popup-сar-selection--phone"
                                    class="form-control phone-field mb-3" placeholder="+38 000 0000000"
                                    name="phone" autocomplete="no-autofill-please">
                                <div class="field--help-info small-txt text-red mb-2" id="phone_error_select">
                                    {{-- Введіть Ваш номер телефону --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-checkbox position-relative mb-5">
                                <input type="checkbox" class="custom-control-input" id="form-popup-сar-selection"
                                    name="approve">
                                <label class="custom-control-label" for="form-popup-сar-selection">
                                    <span
                                        class="custom-checkbox--info">{{ __('web.consent_to_the_collection_processing_storage_and_use_of_my') }}
                                        <a href="/policy">{{ __('web.personal_data') }}</a>.</span>
                                </label>
                            </div>
                            <div class="field--help-info small-txt text-red mb-2" id="approve_error_select">
                                {{-- Введіть Ваш номер телефону --}}
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <button type="submit" id="select-send-button"
                                class="btn-modal-close btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">{{ __('web.send_form') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal modal--custom popup-any-questions fade" id="popup-any-questions" data-keyboard="false"
    tabindex="-1" aria-labelledby="popup-any-questionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <form class="form-popup-any-questions" id="call-back-form" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="modal-title font-weight-bolder mb-0">{{ trans('web.have_questions') }}
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <svg>
                                            <use
                                                xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}">
                                            </use>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-any-questions--name_drive">{{ trans('web.your_name') }}</label>
                                <input type="text" name="name_drive" id="popup-any-questions--name_drive"
                                    class="form-control name_drive-field mb-3"
                                    placeholder="{{ trans('web.your_name') }}" autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-any-questions--phone_drive">{{ trans('web.phone_number') }}</label>
                                <input type="tel" name="phone_drive" id="popup-any-questions--phone_drive"
                                    class="form-control phone-field phone_drive-field mb-3" placeholder="+380"
                                    autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <input type="hidden" name="current_url" value="{{ url()->full() }}">

                        <input type="hidden" name="utm_source" value>
                        <input type="hidden" name="utm_medium" value>
                        <input type="hidden" name="utm_campaign" value>
                        <input type="hidden" name="utm_term" value>
                        <input type="hidden" name="utm_content" value>

                        <div class="col-12">
                            <div class="custom-control custom-checkbox position-relative mb-5">
                                <input type="checkbox" class="custom-control-input"
                                    id="popup-any-questions--agree_drive" name="agree_drive" value="1">
                                <label class="custom-control-label agree_drive-field"
                                    for="popup-any-questions--agree_drive">
                                    <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span
                                            class=""><a
                                                href="##">{{ trans('web.agreement_two') }}</a></span>.</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-auto">
                            <button type="submit"
                                class="btn-modal-send btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">{{ trans('web.call_me_back') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--custom popup-any-questions fade" id="popup-any-questions2" data-keyboard="false"
    tabindex="-1" aria-labelledby="popup-any-questionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <form class="form-popup-any-questions" id="call-back-form2" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="modal-title font-weight-bolder mb-0">{{ trans('web.have_questions') }}
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <svg>
                                            <use
                                                xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}">
                                            </use>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-any-questions--name_drive">{{ trans('web.your_name') }}</label>
                                <input type="text" name="name_drive" id="popup-any-questions--name_drive"
                                    class="form-control name_drive-field mb-3"
                                    placeholder="{{ trans('web.your_name') }}" autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-any-questions--phone_drive">{{ trans('web.phone_number') }}</label>
                                <input type="tel" name="phone_drive" id="popup-any-questions--phone_drive"
                                    class="form-control phone-field phone_drive-field mb-3" placeholder="+380"
                                    autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <input type="hidden" name="current_url" value="{{ url()->full() }}">

                        <input type="hidden" name="utm_source" value>
                        <input type="hidden" name="utm_medium" value>
                        <input type="hidden" name="utm_campaign" value>
                        <input type="hidden" name="utm_term" value>
                        <input type="hidden" name="utm_content" value>

                        <div class="col-12">
                            <div class="custom-control custom-checkbox position-relative mb-5">
                                <input type="checkbox" class="custom-control-input"
                                    id="popup-any-questions--agree_drive2" name="agree_drive" value="1">
                                <label class="custom-control-label agree_drive-field"
                                    for="popup-any-questions--agree_drive2">
                                    <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span
                                            class=""><a
                                                href="##">{{ trans('web.agreement_two') }}</a></span>.</span>
                                </label>
                                @error('agree_drive')
                                    <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                @enderror
                                {{-- <div class="field--help-info small-txt text-red mb-2" id="agree_drive_error_select2"> --}}
                            </div>
                        </div>

                        <div class="col-12 col-md-auto">
                            <button type="submit"
                                class="btn-modal-send btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">{{ trans('web.call_me_back') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--custom popup-any-questions fade" id="popup-test-drive" data-keyboard="false" tabindex="-1"
    aria-labelledby="popup-any-questionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <div class="h3 font-m mb-2 font-weight-bolder text-md-center">{{ trans('web.go_on_test_drive') }}</div>
                            <div class="h4 font-m font-weight-bolder mb-3 mb-md-9 text-md-center">{{ trans('web.you_can_try_than_subscribe') }}</div>
                <form id="form-test-drive2" {{-- action="{{ route('test.drive.feedback.store') }}" method="post" --}}>
                    @csrf
                    {{-- @method('POST') --}}
                    <div class="row field-wrap">
                        <div class="col-12 col-md-6">
                            <div class="field mb-2 mb-md-8">
                                <label class="control-label" for="name">{{ trans('web.your_name') }}</label>
                                <input type="text" name="name_drive" id="name" class="form-control mb-2"
                                    placeholder="{{ trans('web.enter_name') }}" value="{{ old('name_drive') }}">
                                @error('name_drive')
                                    <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                @enderror
                                {{-- <div class="field--help-info small-txt text-red mb-2"></div> --}}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="field mb-2 mb-md-8">
                                <label class="control-label" for="phone">{{ trans('web.phone_number') }}</label>
                                <input type="tel" name="phone_drive" id="phone"
                                    class="form-control phone-field mb-2" placeholder="+380"
                                    value="{{ old('phone_drive') }}">
                                @error('phone_drive')
                                    <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="page" value="Car show page">
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
                                <input type="checkbox" class="custom-control-input" id="form-test-drive-check2"
                                    name="agree_drive" value="1">
                                <label class="custom-control-label" for="form-test-drive-check2">
                                    <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span
                                            class="link-underline"><a
                                                href="/policy">{{ trans('web.agreement_two') }}</a></span>.</span>
                                </label>
                                @error('agree_drive')
                                    <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                @enderror
                                <div class="field--help-info small-txt text-red mb-2" id="agree_drive_error_select3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-auto mx-auto">
                            <button role="button" type="submit" id="test-drive-send-button"
                                class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">{{ trans('web.want_to_test') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--custom popup-any-questions fade" id="popup-any-questions3" data-keyboard="false"
    tabindex="-1" aria-labelledby="popup-any-questionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <form class="form-popup-any-questions" id="call-back-form3" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="modal-title font-weight-bolder mb-0">{{ trans('web.have_questions') }}
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <svg>
                                            <use
                                                xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}">
                                            </use>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-any-questions--name_drive">{{ trans('web.your_name') }}</label>
                                <input type="text" name="name_drive" id="popup-any-questions--name_drive2"
                                    class="form-control name_drive-field mb-3"
                                    placeholder="{{ trans('web.your_name') }}" autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label"
                                    for="popup-any-questions--phone_drive">{{ trans('web.phone_number') }}</label>
                                <input type="tel" name="phone_drive" id="popup-any-questions--phone_drive2"
                                    class="form-control phone-field phone_drive-field mb-3" placeholder="+380"
                                    autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <input type="hidden" name="current_url" value="{{ url()->full() }}">
                        <input type="hidden" name="page" value="Car show page">
                        <input type="hidden" name="utm_source" value>
                        <input type="hidden" name="utm_medium" value>
                        <input type="hidden" name="utm_campaign" value>
                        <input type="hidden" name="utm_term" value>
                        <input type="hidden" name="utm_content" value>

                        <div class="col-12">
                            <div class="custom-control custom-checkbox position-relative mb-5">
                                <input type="checkbox" class="custom-control-input"
                                    id="popup-any-questions--agree_drive3" name="agree_drive" value="1">
                                <label class="custom-control-label agree_drive-field"
                                    for="popup-any-questions--agree_drive3">
                                    <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span
                                            class=""><a
                                                href="##">{{ trans('web.agreement_two') }}</a></span>.</span>
                                </label>
                                @error('agree_drive')
                                    <div class="field--help-info small-txt text-red mb-2">{{ $message }}</div>
                                @enderror
                                {{-- <div class="field--help-info small-txt text-red mb-2" id="agree_drive_error_select_question"> --}}
                            </div>
                        </div>

                        <div class="col-12 col-md-auto">
                            <button type="submit"
                                class="btn-modal-send btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">{{ trans('web.call_me_back') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
