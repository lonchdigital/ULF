<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <div class="d-flex justify-content-between align-items-center mb-20">
                    <h6 class="card-title mb-0">Список FAQs</h6>
                    <a href="{{ route('admin.pages.create-faq', ['page' => $page]) }}" id="add-subscribe-benefit" class="btn mb-2 btn-secondary">
                        <span class="ti-plus font-weight-bold"></span>
                        Додати FAQ
                    </a>
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
                                <th>Запитання</th>
                                <th>Відповідь</th>
                                <th style="text-align: right">Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($this->faqs as $faq)
                            <tr>
                                <td>{{ $faq->question ?? '' }}</td>
                                <td>{{ $faq->answer ?? '' }}</td>
                                <td style="text-align: right">
                                    {{-- @if($document->page)
                                    <a href="{{ route('slug.page', ['section' => $document->page->section, 'slug' => $document->page->slug]) }}" target="_blank" class="mr-2"><i class="fa fa-eye text-info font-18"></i></a>
                                    @endif --}}

                                    <a href="{{ route('admin.pages.edit-faq', ['page' => $page, 'faq' => $faq]) }}" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">
            {{ $this->faqs->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
