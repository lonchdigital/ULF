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
                            <h6 class="card-title mb-0">{{ trans('admin.blog') }}</h6>
                            <a href="{{ route('article.create') }}" class="btn btn-primary waves-effect waves-light float-right mb-3">
                                + {{ trans('admin.add_new_article') }}
                            </a>
                        </div>
                            

                        <div class="table-responsive order-stats">
                            <table class="table table-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Назва документа</th>
                                    <th>Дія</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    <tr>
                                        <td>{{ $document->id ?? '' }}</td>
                                        <td>
                                            {{ $document->name ?? '' }}
                                        </td>
                                        <td>
                                            @if($document->page)
                                            <a href="{{ route('slug.page', ['section' => $document->page->section, 'slug' => $document->page->slug]) }}" target="_blank" class="mr-2"><i class="fa fa-eye text-info font-18"></i></a>
                                            @endif
                                            <a href="#" class="md-trigger" data-modal="modal-{{ $document->getAttribute('id') }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                            <div class="md-modal md-effect-1" id="modal-{{ $document->getAttribute('id') }}">
                                                <div class="md-content">
                                                    <h3 class="bg-main">Увага!</h3>
                                                    <p class="text-center mt-4">Видалити "{{ $document->getAttribute('name') }}"?</p>
                                                    <div class="d-flex art-modal-buttons">
                                                        <button class="btn md-close">Закрити</button>
                                                        <a href="{{ route('samples.destroy', $document) }}" class="btn btn-danger d-block">Видалити</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('samples.edit', $document) }}" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">
                    {{-- {{ $documents->links('vendor.pagination.default') }} --}}
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">Add New Customer</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="LeadName">Name</label> <input type="text" class="form-control" id="LeadName" required=""></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="LeadEmail">Email</label> <input type="email" class="form-control" id="LeadEmail" required=""></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="PhoneNo">Phone No</label> <input type="text" class="form-control" id="PhoneNo" required=""></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="status-select" class="mr-2">Country</label> <select class="custom-select" id="status-select">
                                            <option selected="">Select</option>
                                            <option value="1">India</option>
                                            <option value="2">USA</option>
                                            <option value="3">Japan</option>
                                            <option value="4">China</option>
                                            <option value="5">Germany</option>
                                        </select></div>
                                </div>
                            </div><button type="button" class="btn btn-sm btn-primary">Save</button> <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
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