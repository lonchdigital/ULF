@extends('web.layout.index')

@section('title', 'Single Car!!!')

@section('head')
@endsection

@section('content')

<main class="main">
    <div class="content">
        <section class="section-top pt-5">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="section-top--info nav-breadcrumb">
                            <div class="mb-2">
                                <a href="index.html" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">Назад</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="h3 font-m font-weight-bolder d-none d-lg-block">Блог</div>
                                <div class="h3 font-m font-weight-bolder d-lg-none">Блог</div>
                                <div class="filters-button ml-4">
                                    <button type="button" class="btn btn-reset">
                                        <svg class="i-sorting">
                                            <use xlink:href="img/icons/icons.svg#i-sorting"></use>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-reset btn-filter collapsed" data-toggle="collapse" data-target="#navbarFilters" aria-controls="navbarFilters" aria-expanded="false" aria-label="Toggle navigation" id="toggleFilter">
                                        <svg class="i-filters-menu">
                                            <use xlink:href="img/icons/icons.svg#i-filters-menu"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('main.page') }}">Головна</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Блог</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-fleet pb-7 pb-md-10 pb-lg-13">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="our-fleet-preview row">
                            @foreach ($articles as $article)
                                <div class="content col-12 col-md-6 col-lg-4">
                                    <div class="our-fleet-preview--item">
                                        <div class="wrap-img">
                                            <a href="{{ route('slug.page', ['section' => $article->page->section, 'slug' => $article->page->slug]) }}">
                                                <img src="{{ $article->image_url }}" alt="Image">
                                                {{-- <span class="item-img-date">07 Травня 2024</span> --}}
                                            </a>
                                        </div>
                                        <div class="name">
                                            <a href="{{ route('slug.page', ['section' => $article->page->section, 'slug' => $article->page->slug]) }}">
                                                {{ $article->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-5 mb-lg-0">
                    {{-- <div class="col-auto mx-auto ">
                        <button type="button" class="btn-show-more btn btn-main-blue btn-default text-uppercase">Показати більше</button>
                    </div> --}}
                    <div class="col-12">
                        <nav class="bg-white mt-5 mt-md-2">
                            <ul class="pagination justify-content-center mb-0"></ul>
                        </nav>
                    </div>
                </div>
                
            </div>
        </section>
        
</main>

@endsection
