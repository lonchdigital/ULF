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
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="section-top--info nav-breadcrumb">
                            <div class="mb-2">
                                <a href="/" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">Назад</a>
                            </div>
                            <div class="h3 font-m font-weight-bolder mb-2">Контакти</div>
                            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/">Головна</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Контакти</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
