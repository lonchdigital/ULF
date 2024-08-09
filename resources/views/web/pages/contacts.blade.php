@extends('web.layout.index')

@section('title', 'Contacts')

@section('head')

@endsection

@section('content')
    <main class="main">
        <div class="content">
            <section class="section-top pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="/" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">Назад</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">{{ $page->h1 ?? '' }}</div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $page->h1 ?? '' }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="contacts-wrapper">
                        <div class="contacts-left">
                            <div class="contacts-item">
                                <div class="contacts-item-title">Ми працюємо</div>
                                <p>{{ $page->pageBlocks()->where('block', 'days')->where('key', 'first')->first()->title . ' ' ?? '' }}
                                    {{ $page->pageBlocks()->where('block', 'days')->where('key', 'first')->first()->description ?? '' }}
                                    <br>
                                    {{ $page->pageBlocks()->where('block', 'days')->where('key', 'second')->first()->title . ' ' ?? '' }}
                                    {{ $page->pageBlocks()->where('block', 'days')->where('key', 'second')->first()->description ?? '' }}
                                </p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">Адреса</div>
                                <p>{{ $page->pageBlocks()->where('block', 'address')->first()->title }}<br>
                                    {{ $page->pageBlocks()->where('block', 'address')->first()->description }}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">
                                    Телефон
                                </div>
                                <p>{{ $page->pageBlocks()->where('block', 'phone')->first()->title }}<br>
                                    {{ $page->pageBlocks()->where('block', 'phone')->first()->description }}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">
                                    Email
                                </div>
                                <p>
                                    <a
                                        href="mailto:auto.online@ulf.ua">{{ $page->pageBlocks()->where('block', 'email')->first()->title }}</a>
                                </p>
                            </div>
                            <div class="contacts-social">
                                <a href="{{ $page->pageBlocks()->where('block', 'instagram')->first()->title }}"
                                    target="_blank">
                                    <svg class="i-instagram">
                                        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}">
                                        </use>
                                    </svg>
                                </a>
                                <a href="{{ $page->pageBlocks()->where('block', 'facebook')->first()->title }}"
                                    target="_blank">
                                    <svg class="i-facebook">
                                        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-facebook' }}">
                                        </use>
                                    </svg>
                                </a>
                                {{-- <a target="_blank" href="{{ $page->pageBlocks()->where('block', 'instagram')->first()->title }}">
                                <svg class="i-instagram">
                                    <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-instagram' }}"></use>
                                </svg>
                            </a>
                            <a target="_blank" href="{{ $page->pageBlocks()->where('block', 'facebook')->first()->title }}">
                                <img src="{{ asset('static_images/i-facebook1.svg') }}" alt="icon facebook">
                            </a> --}}
                            </div>
                        </div>
                        <div class="contacts-right">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d858.8882288707084!2d30.497098789744708!3d50.51822599590291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4d24028a08079%3A0xbe266778ebbad3e6!2z0J7QsdC-0LvQvtC90YHQutC40Lkg0L_RgNC-0YHQvy4sIDM1LCDQmtC40LXQsiwgMDIwMDA!5e0!3m2!1suk!2sua!4v1686135052692!5m2!1suk!2sua"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
