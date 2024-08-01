@extends('web.layout.index')

@section('title', 'Single article!!!')

@section('head')
@endsection

@section('content')

<main class="main">
    <div class="content">
        <section class="section-top pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="section-top--info nav-breadcrumb">
                            <div class="mb-2">
                                <a href="index.html" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">Назад</a>
                            </div>
                            <div class="h3 font-m font-weight-bolder mb-2">{{ $article->name }}</div>
                            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('main.page') }}">Головна</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('blog.page') }}">Блог</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $article->name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="privacy-terms pb-7 pb-md-10 pb-lg-13">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ $article->image_url }}" alt="Blog Image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="h5 font-m mb-3">
                            {!! $article->text !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main>

@endsection
