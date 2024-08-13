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
                            <h6 class="card-title mb-0">{{ trans('admin.pages_title') }}</h6>
                            {{-- <a href="{{ route('article.create') }}" class="btn btn-primary waves-effect waves-light float-right mb-3">
                                + {{ trans('admin.add_new_article') }}
                            </a> --}}
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive order-stats">
                            <table class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва документа</th>
                                        <th>Дія</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!is_null($homePage))
                                        <tr>
                                            <td>{{ $homePage->getAttribute('id') }}</td>
                                            <td>{{ $homePage->getAttribute('name') }}</td>
                                            <td>
                                                <a href="{{ route('admin.home-page-settings.edit.page') }}"
                                                    class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!is_null($articlesPage))
                                        <tr>
                                            <td>{{ $articlesPage->getAttribute('id') }}</td>
                                            <td>{{ $articlesPage->getAttribute('name') }}</td>
                                            <td>
                                                <a href="{{ route('article.index.page') }}" class="mr-2"><i
                                                        class="fa fa-edit text-info font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!is_null($carsPage))
                                        <tr>
                                            <td>{{ $carsPage->getAttribute('id') }}</td>
                                            <td>{{ $carsPage->getAttribute('name') }}</td>
                                            <td>
                                                <a href="{{ route('car.index.page') }}" class="mr-2"><i
                                                        class="fa fa-edit text-info font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!is_null($customerStories))
                                        <tr>
                                            <td>{{ $customerStories->getAttribute('id') }}</td>
                                            <td>{{ $customerStories->getAttribute('name') }}</td>
                                            <td>
                                                <a href="{{ route('page.edit', $customerStories) }}" class="mr-2"><i
                                                        class="fa fa-edit text-info font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $page->getAttribute('id') }}</td>
                                            <td>{{ $page->name ?? __('page_name.' . $page->slug) }}</td>
                                            <td>
                                                {{-- @if ($document->page)
                                            <a href="{{ route('slug.page', ['section' => $document->page->section, 'slug' => $document->page->slug]) }}" target="_blank" class="mr-2"><i class="fa fa-eye text-info font-18"></i></a>
                                            @endif --}}
                                                @if ($page->slug == 'contacts')
                                                    <a href="{{ route('page.edit-contacts') }}" class="mr-2"><i
                                                            class="fa fa-edit text-info font-18"></i></a>
                                                @else
                                                    @if ($page->slug == 'footer')
                                                        <a href="{{ route('page.edit-footer') }}" class="mr-2"><i
                                                                class="fa fa-edit text-info font-18"></i></a>
                                                    @else
                                                        <a href="{{ route('page.edit', $page) }}" class="mr-2"><i
                                                                class="fa fa-edit text-info font-18"></i></a>
                                                    @endif
                                                @endif
                                                {{-- <a href="#" class="md-trigger" data-modal="modal-{{ $article->getAttribute('id') }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                            <div class="md-modal md-effect-1" id="modal-{{ $article->getAttribute('id') }}">
                                                <div class="md-content">
                                                    <h3 class="bg-main">{{ trans('admin.attention') }}</h3>
                                                    <p class="text-center mt-4">{{ trans('admin.remove') }} "{{ $article->name }}"?</p>
                                                    <div class="d-flex art-modal-buttons">
                                                        <button class="btn md-close">{{ trans('admin.close') }}</button>
                                                        <a href="{{ route('article.destroy', $article) }}" class="btn btn-danger d-block">{{ trans('admin.remove') }}</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">
                    {{--                    {{ $articles->links('vendor.pagination.default') }} --}}
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-modal="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">Add New Customer</h5><button
                            type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="LeadName">Name</label> <input type="text"
                                            class="form-control" id="LeadName" required=""></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="LeadEmail">Email</label> <input type="email"
                                            class="form-control" id="LeadEmail" required=""></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label for="PhoneNo">Phone No</label> <input type="text"
                                            class="form-control" id="PhoneNo" required=""></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="status-select" class="mr-2">Country</label>
                                        <select class="custom-select" id="status-select">
                                            <option selected="">Select</option>
                                            <option value="1">India</option>
                                            <option value="2">USA</option>
                                            <option value="3">Japan</option>
                                            <option value="4">China</option>
                                            <option value="5">Germany</option>
                                        </select></div>
                                </div>
                            </div><button type="button" class="btn btn-sm btn-primary">Save</button> <button type="button"
                                class="btn btn-sm btn-danger">Delete</button>
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
@endpush
