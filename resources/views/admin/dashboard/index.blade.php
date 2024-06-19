@extends('admin.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Тестовая Страница</h6>

                        <x-admin.multilanguage-switch/>

                        <x-admin.multilanguage-input :label="trans('admin.name')"
                                                     :is-required="true"
                                                     field-name="test_string"
                                                     :values="[]"/>

                        <x-admin.multilanguage-input :label="trans('admin.test')"
                                                     :is-required="true"
                                                     field-name="test_string"
                                                     :values="[]"/>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection
