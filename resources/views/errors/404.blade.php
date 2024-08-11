@extends('web.layout.index')

@section('title', 'Homepage')

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
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="not-found pb-22 pt-18">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="not-found--title mb-3 mb-lg-5">404</div>
                            <div class="h5 font-m mb-3 mb-lg-7">{{ trans('web.page_not_found') }}.</div>
                            <div class="row">
                                <div class="col col-sm-auto mx-auto">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}" class="btn-default btn btn-block btn-main-blue text-uppercase">{{ trans('web.return_to_homepage') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="section-order d-flex flex-column">
                @include('components.automatch')
                <section class="our-fleet our-fleet--mob pb-7 pb-md-10 pb-lg-13 d-md-none">
                    <div class="container">
                        <div class="row">
                            <div class="our-fleet-search col">
                                <div class="our-fleet-search--inner position-relative">
                                    <div class="our-fleet-preview--item bg-main-blue">
                                        <div class="name text-white text-center">Не знайшов авто мрії в нашому автопарку?</div>
                                        <div class="wrap-img">
                                            <img src="img/car-6.png" alt="Image">
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-auto mx-auto">
                                                <button type="button" class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold" data-toggle="modal" data-target="#popup-сar-selection">НА ПОШУКИ АВТО</button>
                                            </div>
                                        </div>
                                        <div class="wrap-img wrap-img--hidden">
                                            <img src="img/bg-car-preview.png" class="bg-down" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
