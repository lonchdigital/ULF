<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <div class="d-flex justify-content-between align-items-center mb-20">
                    <h6 class="card-title mb-0">Список сторінок</h6>
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
                                <th>Назва сторінки</th>
                                <th style="text-align: right">Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($this->pages as $page)
                            <tr>
                                <td>{{ $page->title ?? __('page_name.' . ($page->key ?? $page->slug)) }}</td>
                                <td style="text-align: right">
                                    {{-- @if($document->page)
                                    <a href="{{ route('slug.page', ['section' => $document->page->section, 'slug' => $document->page->slug]) }}" target="_blank" class="mr-2"><i class="fa fa-eye text-info font-18"></i></a>
                                    @endif --}}

                                    <a href="{{ route('admin.pages.edit', $page) }}" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
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
