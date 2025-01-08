<footer class="footer">
    <div class="footer--top pt-5 pt-md-13 pb-0 pb-md-5 mb-2 mb-md-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                            <div class="footer-logo mb-5">
                                @if(!empty($page->image))
                                    <img src="{{ $page->imageUrl }}" alt="{{ 'ULF' }}">
                                @else
                                    <img src="img/logo-4.svg" alt="logo">
                                @endif

                            </div>
                            <div class="row">
                                <div class="col col-lg-10 col-xl-8">
                                    <p class="mob-line font-weight-bold mb-0 text-white pb-3 mb-3 pb-md-0 mb-md-0">{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'description')->first()->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="h5 mb-3">{{ trans('web.navigation') }}</div>
                                    <ul class="footer--nav-list mob-line list-unstyled pb-3 mb-3 pb-md-0 mb-md-0">
                                        @if($pages->where('key', 'homepage')->first()->is_show_in_footer)
                                            <li><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                        @endif

                                        @if($pages->where('slug', 'catalog')->first()->is_show_in_footer)
                                            <li><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}">{{ trans('page_name.car_park') }}</a></li>
                                        @endif

                                        @if($pages->where('slug', 'customer-stories')->first()->is_show_in_footer)
                                            <li><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('clients.page') }}">{{ trans('page_name.client_history') }}</a></li>
                                        @endif

                                        @if($pages->where('slug', 'blog')->first()->is_show_in_footer)
                                            <li><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('blog.page') }}">{{ trans('page_name.blog') }}</a></li>
                                        @endif

                                        @if($pages->where('slug', 'faq')->first()->is_show_in_footer)
                                            <li><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('faq') }}">{{ trans('page_name.faqs') }}</a></li>
                                        @endif

                                        @if($pages->where('slug', 'contacts')->first()->is_show_in_footer)
                                            <li><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('contacts') }}">{{ trans('page_name.contacts') }}</a></li>
                                        @endif

                                        <li><a href="#">{{ trans('page_name.agreements') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="footer--socials mob-line socials pb-1 mb-3 pb-md-0 mb-md-0">
                                        <div class="h5">{{ trans('web.help') }}</div>
                                        <div class="row flex-md-column mt-3">
                                            <div class="col-6 col-md">
                                                <div class="d-flex flex-column h-100 justify-content-between">
                                                    <p class="font-weight-bold mb-0">{{ trans('web.talk_in_messengers') }}</p>
                                                    <ul class="list-inline mb-0 py-2">
                                                        <li class="list-inline-item">
                                                            <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'communicate_telegram')->first()->description }}" target="_blank">
                                                                <svg class="i-telegram">
                                                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}"></use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'communicate_viber')->first()->description }}" target="_blank">
                                                                <svg class="i-viber">
                                                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}"></use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md">
                                                <div class="d-flex flex-column h-100 justify-content-between">
                                                    <p class="font-weight-bold mb-0">{{ trans('web.more_info_chat_bots') }}</p>
                                                    <ul class="list-inline mb-0 py-2">
                                                        <li class="list-inline-item">
                                                            <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'bot_telegram')->first()->description }}" target="_blank">
                                                                <svg class="i-telegram">
                                                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}"></use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'bot_viber')->first()->description }}" target="_blank">
                                                                <svg class="i-viber">
                                                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}"></use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
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
                                        @forelse($page->pageBlocks()->where('block', 'phone')->get() as $phone)
                                        <li class="d-flex align-items-center">
                                            <svg class="i-phone mr-2">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-phone' }}"></use>
                                            </svg>
                                            <div class="d-flex flex-column">
                                                <a href="tel:+380 67 236 62 63">{{ $phone->title }}</a>
                                                @if($phone->description)
                                                <span class="small-txt text-light-grey">{{ $phone->description }}</span>
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
                        <li class="d-flex align-items-center mb-3">
                            <svg class="i-mail mr-2">
                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-mail' }}"></use>
                            </svg>
                            <div class="footer--email">
                                <a href="mailto:{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'email')->first()->description }}">{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'email')->first()->description }}</a>
                            </div>
                        </li>
                        <ul class="list-inline mb-0">
                            @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->description }}" target="_blank">
                                        @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->value))
                                            <img class="i-instagram" src="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->imageUrl }}" alt="instagram" style="max-width: 30px">
                                        @else
                                            <svg class="i-instagram">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}"></use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if($page->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->description)
                                <li class="list-inline-item">
                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->description }}" target="_blank">
                                        @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->value))
                                            <img class="i-tiktok" src="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->imageUrl }}" alt="tik_tok" style="max-width: 30px">
                                        @else
                                            <svg class="i-tiktok">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-tiktok' }}"></use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->description }}" target="_blank">
                                        @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->value))
                                            <img class="i-facebook" src="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->imageUrl }}" alt="facebook" style="max-width: 30px">
                                        @else
                                            <svg class="i-facebook">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}"></use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->description }}" target="_blank">
                                        @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->value))
                                            <img class="i-youtube" src="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->imageUrl }}" alt="youtube" style="max-width: 30px">
                                        @else
                                            <svg class="i-youtube">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-youtube' }}"></use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->description))
                                <li class="list-inline-item">
                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->description }}" target="_blank">
                                        @if(!empty($page->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->value))
                                            <img class="i-linkedin" src="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->imageUrl }}" alt="linkedin" style="max-width: 30px">
                                        @else
                                            <svg class="i-linkedin">
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-linkedin' }}"></use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul>
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
                @if(!is_null($policy))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a href="{{ route('page.single.page', ['slug' => $policy->slug]) }}">{{ $policy->name }}</a>
                    </div>
                @endif
                @if(!is_null($terms))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a href="{{ route('page.single.page', ['slug' => $terms->slug]) }}">{{ $terms->name }}</a>
                    </div>
                @endif
                @if(!is_null($rentalAgreement))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a href="{{ route('page.single.page', ['slug' => $rentalAgreement->slug]) }}">{{ $rentalAgreement->name }}</a>
                    </div>
                @endif
                @if(!is_null($insuranceContract))
                    <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                        <a href="{{ route('page.single.page', ['slug' => $insuranceContract->slug]) }}">{{ $insuranceContract->name }}</a>
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
            <button type="button" class="btn-default btn btn-block btn-outline-main-blue text-uppercase" data-toggle="modal" data-target="#popup-сar-selection">Тест драйв</button>
        </div>
        <div class="col toolbar-fixed--item">
            <button type="button" class="btn-default btn-default-orange btn btn-block btn-outline-red text-uppercase" data-toggle="modal" data-target="#popup-any-questions">Подати заявку</button>
        </div>
    </div>
</div>
</div>

<div class="modal modal--custom popup-сar-selection fade" id="popup-сar-selection" data-keyboard="false" tabindex="-1" aria-labelledby="popup-сar-selectionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <form class="form-popup-сar-selection" autocomplete="off">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="modal-title font-weight-bolder mb-0">Підбір авто</div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">
										<svg>
											<use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
										</svg>
									</span>
                                </button>
                            </div>
                            <p class="mb-3">Вкажи бажану марку, модель, параметри.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label" for="popup-сar-selection--car-make-model">Марка та модель авто</label>
                                <input type="text" id="popup-сar-selection--car-make-model" class="form-control mb-3" placeholder="Напр. Hyundai Santa FE" autocomplete="no-autofill-please">
                                <div class="field--help-info small-txt text-red mb-2">Введіть марку та модель авто</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label" for="popup-сar-selection--name">Ваше ім’я</label>
                                <input type="text" id="popup-сar-selection---name" class="form-control mb-3" placeholder="Введіть ім’я" autocomplete="no-autofill-please">
                                <div class="field--help-info small-txt text-red mb-2">Введіть Ваше ім’я українськими літерами (кирилицею)</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label" for="popup-сar-selection--phone">Номер телефону</label>
                                <input type="tel" id="popup-сar-selection--phone" class="form-control mb-3" placeholder="+38 000 0000000" autocomplete="no-autofill-please">
                                <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-checkbox position-relative mb-5">
                                <input type="checkbox" class="custom-control-input" id="form-popup-сar-selection">
                                <label class="custom-control-label" for="form-popup-сar-selection">
                                    <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <a href="##">персональних даних</a>.</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <button type="button" class="btn-modal-close btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">Відправити</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal modal--custom popup-any-questions fade" id="popup-any-questions" data-keyboard="false" tabindex="-1" aria-labelledby="popup-any-questionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4 px-2 p-md-5">
            <div class="modal-body p-0">
                <form class="form-popup-any-questions" id="call-back-form" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="modal-title font-weight-bolder mb-0">{{ trans('web.have_questions') }}</div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">
										<svg>
											<use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
										</svg>
									</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label" for="popup-any-questions--name_drive">{{ trans('web.your_name') }}</label>
                                <input type="text" name="name_drive" id="popup-any-questions--name_drive" class="form-control name_drive-field mb-3" placeholder="{{ trans('web.your_name') }}" autocomplete="no-autofill-please">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="field mb-3">
                                <label class="control-label" for="popup-any-questions--phone_drive">{{ trans('web.phone_number') }}</label>
                                <input type="tel" name="phone_drive" id="popup-any-questions--phone_drive" class="form-control phone-field phone_drive-field mb-3" placeholder="+380" autocomplete="no-autofill-please">
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
                                <input type="checkbox" class="custom-control-input" id="popup-any-questions--agree_drive" name="agree_drive" value="1">
                                <label class="custom-control-label agree_drive-field" for="popup-any-questions--agree_drive">
                                    <span class="custom-checkbox--info">{{ trans('web.agreement_one') }} <span class=""><a href="##">{{ trans('web.agreement_two') }}</a></span>.</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-auto">
                            <button type="submit" class="btn-modal-send btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">{{ trans('web.call_me_back') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
