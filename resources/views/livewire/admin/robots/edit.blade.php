<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <form wire:submit.prevent="save">
                    <section class="mb-50">
                        <h6 class="card-title">Редагування файлу robots.txt</h6>

                        <div class="row" id="faqs-cars">
                                <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-start" id="faq-car-id-2">
                                    <div class="border border-secondary rounded p-3 col-md-11">
                                        <div class="row justify-content-between align-items-center">

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <div class="tab-content">
                                                                    <div language="uk"
                                                                        class="multilang-content tab-pane fade active show "
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Контент файлу
                                                                            </label>
                                                                            <textarea wire:model="content"
                                                                            class="form-control" style="height: 300px"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('content')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </section>

                    <button type="submit" class="btn btn-primary mr-2 mb-3">Зберегти</button>
                </form>
            </div>
        </div>
        <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">
            {{-- {{ $this->faqs->links('vendor.pagination.default') }} --}}
        </div>
    </div>
</div>
