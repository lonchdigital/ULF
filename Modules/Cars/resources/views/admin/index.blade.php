@extends('admin.layouts.index')

@push('head')
    <link rel="stylesheet" href="{{ asset('admin_src/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_src/css/default-assets/daterange-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_src/css/default-assets/modal.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-30">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center mb-20">
                            <h6 class="card-title mb-0">{{ trans('admin.cars_title') }}</h6>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        

                        <div class="table-responsive art-cars-list">
                            <table class="table table-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ trans('admin.image') }}</th>
                                    <th>{{ trans('admin.cars_title') }}</th>
                                    <th>Lot ID</th>
                                    <th>{{ trans('admin.year') }}</th>
                                    <th>{{ trans('admin.status') }}</th>
                                    <th>{{ trans('admin.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{ $car->getAttribute('id') }}</td>
                                        <td class="image-preview-td"><img src="{{ $car->getMainImageUrl() }}" class="art-car-image-preview" alt="Car image"></td>
                                        <td><a href="{{ route('car.edit', $car) }}">{{ $car->getFullName() }}</a></td>
                                        <td>{{ $car->getAttribute('lot_id') }}</td>
                                        <td>{{ $car->vehicle->getAttribute('manufacturedYear') }}</td>
                                        <td>{{ App\DataClasses\CarStatusesClass::get($car->status_id)['name'] }}</td>
                                        <td>
                                            {{-- @if($document->page)
                                            <a href="{{ route('slug.page', ['section' => $document->page->section, 'slug' => $document->page->slug]) }}" target="_blank" class="mr-2"><i class="fa fa-eye text-info font-18"></i></a>
                                            @endif --}}

                                            <a href="{{ route('car.edit', $car) }}" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">
                    {{-- {{ $articles->links('vendor.pagination.default') }} --}}
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_src/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin_src/js/default-assets/daterange-picker.js') }}"></script>

    <script src="{{ asset('admin_src/js/default-assets/modal-classes.js') }}"></script>
    <script src="{{ asset('admin_src/js/default-assets/modaleffects.js') }}"></script>

    <script>
        document.getElementById('document_type').addEventListener('change', function () {
            document.getElementById('filterForm').submit();
        });
    </script>
@endpush
