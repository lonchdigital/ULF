<header class="header">
    <div class="header-main">
        <div class="container position-relative">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg flex-column p-0">
                        <div class="navbar-inner d-flex flex-wrap align-items-center justify-content-between w-100 p-3 px-lg-0">
                            <div class="d-none d-lg-block">
                                <a class="navbar-brand p-0"
                                    @if(optional(request()->route())->getName() ?? '' !== 'main.page')
                                        href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}"
                                    @endif>
                                 {{-- <img src="https://ulf.lonch.digital/static_images/main-logo.png" alt="ULF"> --}}
                                    <img
                                        @if($pages->where('slug', 'header')->first()->image ?? false)
                                            src="{{ $pages->where('slug', 'header')->first()->imageUrl }}"
                                        @else
                                            src="{{ asset('static_images/main-logo.png') }}"
                                        @endif
                                        alt="{{ config('app.name') ?? 'ULF' }}">
                                </a>
                            </div>
                            <div class="d-lg-none">
                                <a class="navbar-brand p-0"
                                    @if(optional(request()->route())->getName() !== 'main.page')
                                        href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}"
                                    @endif>
                                    <img
                                    @if($pages->where('slug', 'header')->first()->mobile_image ?? false)
                                            src="{{ $pages->where('slug', 'header')->first()->mobileImageUrl }}"
                                        @else
                                            src="{{ asset('static_images/main-logo.png') }}"
                                        @endif
                                        alt="{{ config('app.name') ?? 'ULF' }}">
                                </a>
                            </div>
                            <div class="collapse navbar-collapse justify-content-between order-last" id="navbarSupportedContent">
                                <div class="header-main--desk d-none d-lg-flex align-items-center justify-content-between w-100">
                                    <ul class="navbar-nav list-inline w-100 justify-content-center">
                                        @if($pages->where('key', 'homepage')->first()->is_show_in_header)
                                            <li class="list-inline-item list-inline-item--menu menu-for-you">
                                                <div class="nav-link">
                                                    <div class="nav-link--inner d-flex align-items-center">
                                                        <span>
                                                            <a
                                                            @if(optional(request()->route())->getName() !== 'main.page')
                                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}"
                                                            @endif
                                                        >{{ trans('page_name.index') }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if($pages->where('slug', 'catalog')->first()->is_show_in_header)
                                            <li class="list-inline-item list-inline-item--menu menu-for-you">
                                                <div class="nav-link">
                                                    <div class="nav-link--inner d-flex align-items-center">
                                                        <span><a
                                                            @if(optional(request()->route())->getName() !== 'catalog.page')
                                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}"
                                                            @endif>{{ trans('page_name.car_park') }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if($pages->where('slug', 'customer-stories')->first()->is_show_in_header)
                                            <li class="list-inline-item list-inline-item--menu menu-for-you">
                                                <div class="nav-link">
                                                    <div class="nav-link--inner d-flex align-items-center">
                                                        <span><a
                                                            @if(optional(request()->route())->getName() !== 'clients.page')
                                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('clients.page') }}"
                                                            @endif
                                                            >{{ trans('page_name.client_history') }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if($pages->where('slug', 'blog')->first()->is_show_in_header)
                                            <li class="list-inline-item list-inline-item--menu menu-for-you">
                                                <div class="nav-link">
                                                    <div class="nav-link--inner d-flex align-items-center">
                                                        <span><a
                                                            @if(optional(request()->route())->getName() !== 'blog.page')
                                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('blog.page') }}"
                                                            @endif>{{ trans('page_name.blog') }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if($pages->where('slug', 'faq')->first()->is_show_in_header)
                                            <li class="list-inline-item list-inline-item--menu menu-for-you">
                                                <div class="nav-link">
                                                    <div class="nav-link--inner d-flex align-items-center">
                                                        <span><a
                                                            @if(optional(request()->route())->getName() !== 'faq')
                                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('faq') }}"
                                                            @endif>{{ trans('page_name.faqs') }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if($pages->where('slug', 'contacts')->first()->is_show_in_header)
                                            <li class="list-inline-item list-inline-item--menu menu-for-you">
                                                <div class="nav-link">
                                                    <div class="nav-link--inner d-flex align-items-center">
                                                        <span><a
                                                            @if(optional(request()->route())->getName() !== 'contacts')
                                                                href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('contacts') }}"
                                                            @endif>{{ trans('page_name.contacts') }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="languages list-inline-item">

                                        <div class="current-lang">
                                            <div class="current-lang--inner d-flex align-items-center">
                                                <div class="language mr-1">
                                                    <span>{{ mb_strtoupper(app()->getLocale()) }}</span>
                                                </div>
                                                <svg class="i-arrow-down">
                                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-triangle' }}"></use>
                                                </svg>
                                            </div>

                                            <ul class="submenu list-unstyled mb-0 position-absolute py-2 px-3">
                                                @foreach($locationService->getAvailableLanguages() as $availableLanguage)
                                                    @if (mb_strtoupper($availableLanguage) !== mb_strtoupper(app()->getLocale()))
                                                        <li>
                                                            <div class="language d-flex align-items-center">
                                                                <a class="d-flex" href="{{ $locationService->generateLinkByLocale(url()->current(), app()->getLocale(), $availableLanguage) }}">
                                                                    <span>{{ mb_strtoupper($availableLanguage) }}</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                    <ul class="navbar-nav--other list-inline mb-0 d-none d-lg-flex align-items-center">
                                        <li class="list-inline-item"><button type="button" class="btn btn-main-blue btn-default text-uppercase" data-toggle="modal" data-target="#popup-any-questions">{{ __('web.call_me_back') }}</button></li>
                                    </ul>
                                </div>
                                <div class="header-main--mob d-lg-none">
                                    <div class="navbar-nav-wrapper">
                                        <div class="navbar-nav">
                                            <ul class="pt-3">
                                                @if($pages->where('key', 'homepage')->first()->is_show_in_header)
                                                    <li><a
                                                        @if(optional(request()->route())->getName() !== 'main.page')
                                                            href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}"
                                                        @endif>{{ trans('page_name.index') }}</a></li>
                                                @endif

                                                @if($pages->where('slug', 'catalog')->first()->is_show_in_header)
                                                    <li><a
                                                        @if(optional(request()->route())->getName() !== 'catalog.page')
                                                            href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}"
                                                        @endif>{{ trans('page_name.car_park') }}</a></li>
                                                @endif

                                                @if($pages->where('slug', 'customer-stories')->first()->is_show_in_header)
                                                    <li><a
                                                        @if(optional(request()->route())->getName() !== 'clients.page')
                                                            href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('clients.page') }}"
                                                        @endif>{{ trans('page_name.client_history') }}</a></li>
                                                @endif

                                                @if($pages->where('slug', 'blog')->first()->is_show_in_header)
                                                    <li><a
                                                        @if(optional(request()->route())->getName() !== 'blog.page')
                                                            href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('blog.page') }}"
                                                        @endif>{{ trans('page_name.blog') }}</a></li>
                                                @endif

                                                @if($pages->where('slug', 'faq')->first()->is_show_in_header)
                                                    <li><a
                                                        @if(optional(request()->route())->getName() !== 'faq')
                                                            href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('faq') }}"
                                                        @endif>{{ trans('page_name.faqs') }}</a></li>
                                                @endif

                                                @if($pages->where('slug', 'contacts')->first()->is_show_in_header)
                                                    <li><a
                                                        @if(optional(request()->route())->getName() !== 'contacts')
                                                            href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('contacts') }}"
                                                        @endif>{{ trans('page_name.contacts') }}</a></li>
                                                @endif
                                                <li><a href="#">{{ trans('page_name.agreements') }}</a></li>
                                                {{-- <li>
                                                    <ul class="navbar-nav--other list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <div class="header--socials socials">
                                                                <div class="header--head mt-5">{{ __('web.we_are_on_social_networks') }}</div>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'instagram')->first()->description }}" target="_blank">
                                                                            <svg class="i-instagram">
                                                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}"></use>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'tik_tok')->first()->description }}" target="_blank">
                                                                            <svg class="i-tiktok">
                                                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-tiktok' }}"></use>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'facebook')->first()->description }}" target="_blank">
                                                                            <svg class="i-facebook">
                                                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}"></use>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'youtube')->first()->description }}" target="_blank">
                                                                            <svg class="i-youtube">
                                                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-youtube' }}"></use>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'linkedin')->first()->description }}" target="_blank">
                                                                            <svg class="i-linkedin">
                                                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-linkedin' }}"></use>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li> --}}
                                                <li class="navbar-nav--support pb-5">
                                                    <ul class="navbar-nav--other list-inline mb-0 p-0">
                                                        <li class="list-inline-item mx-0 w-100">
                                                            <div class="header--socials socials">
                                                                <div class="header--head mt-5">{{ __('web.help') }}</div>
                                                                <div class="row mt-3">
                                                                    <div class="col-6">
                                                                        <div class="d-flex flex-column h-100 justify-content-between">
                                                                            <p class="font-weight-bold mb-0">{{ __('web.talk_in_messengers') }}</p>
                                                                            <ul class="list-inline mb-0 py-2">
                                                                                <li class="list-inline-item">
                                                                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'communicate_telegram')->first()->description }}" target="_blank">
                                                                                        <svg class="i-instagram">
                                                                                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}"></use>
                                                                                        </svg>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'communicate_viber')->first()->description }}" target="_blank">
                                                                                        <svg class="i-facebook">
                                                                                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}"></use>
                                                                                        </svg>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="col-6">
                                                                        <div class="d-flex flex-column h-100 justify-content-between">
                                                                            <p class="font-weight-bold mb-0">{{ __('web.more_info_chat_bots') }}</p>
                                                                            <ul class="list-inline mb-0 py-2">
                                                                                <li class="list-inline-item">
                                                                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'bot_telegram')->first()->description }}" target="_blank">
                                                                                        <svg class="i-telegram">
                                                                                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-telegram' }}"></use>
                                                                                        </svg>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <a href="{{ $page->pageBlocks()->where('block', 'footer')->where('key', 'bot_viber')->first()->description }}" target="_blank">
                                                                                        <svg class="i-viber">
                                                                                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-viber' }}"></use>
                                                                                        </svg>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="language-item pb-5">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="small-txt text-grey font-weight-bold pb-1">{{ __('web.language') }}</div>
                                                            <div class="languages list-inline-item w-100">
                                                                <div class="current-lang">
                                                                    <div class="current-lang--inner d-flex align-items-center justify-content-between">
                                                                        <div class="language mr-1">
                                                                            @if(mb_strtoupper(app()->getLocale()) == 'UA')
                                                                                <span>Українська</span>
                                                                            @else
                                                                                <span>Російська</span>
                                                                            @endif
                                                                        </div>
                                                                        <svg class="i-arrow-down">
                                                                            <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-triangle' }}"></use>
                                                                        </svg>
                                                                    </div>
                                                                    <ul class="submenu list-unstyled mb-0">
                                                                        <li>
                                                                            <div class="language d-flex align-items-center">
                                                                                @if(mb_strtoupper(app()->getLocale()) == 'UA')
                                                                                    <a class="d-flex" href="{{ $locationService->generateLinkByLocale(url()->current(), app()->getLocale(), 'ru') }}">
                                                                                        <span>Російська</span>
                                                                                    </a>
                                                                                @else
                                                                                    <a class="d-flex" href="{{ $locationService->generateLinkByLocale(url()->current(), app()->getLocale(), 'ua') }}">
                                                                                        <span>Українська</span>
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </li>
                                                                        {{-- <li>
                                                                            <div class="language d-flex align-items-center">
                                                                                <a class="d-flex" href="/">
                                                                                    <span>Англійська</span>
                                                                                </a>
                                                                            </div>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-block btn-call-me d-lg-none mr-6 p-0" data-toggle="modal" data-target="#popup-any-questions">
                                    <svg class="i-call">
                                        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-call' }}"></use>
                                    </svg>
                                </button>
                                <button class="navbar-toggler h-100 collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="toggleMenu">
                                    <span class="menu-burger position-relative">
                                        <span class="lines"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
