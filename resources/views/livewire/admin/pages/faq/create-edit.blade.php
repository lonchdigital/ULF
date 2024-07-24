<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <div class="d-flex justify-content-between align-items-center mb-20">
                    <h6 class="card-title mb-0">
                        @if ($faq->id)
                            Редагування блоку FAQ
                        @else
                            Додавання блоку FAQ
                        @endif
                    </h6>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group mb-3">
                                <label for="simpleinput">Ua питання</label>
                                <input type="text" id="simpleinput" class="form-control" wire:model="uaQuestion">

                                @error('uaQuestion')
                                    <div style="color: tomato">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">

                            <div class="form-group mb-3">
                                <label for="example-textarea">Ua відповідь</label>
                                <textarea class="form-control" id="example-textarea" rows="5" wire:model="uaAnswer"></textarea>

                                @error('uaAnswer')
                                    <div style="color: tomato">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div> <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group mb-3">
                                <label for="simpleinput">Ru питання</label>
                                <input type="text" id="simpleinput" class="form-control" wire:model="ruQuestion">
                                @error('ruQuestion')
                                    <div style="color: tomato">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">

                            <div class="form-group mb-3">
                                <label for="example-textarea">Ru відповідь</label>
                                <textarea class="form-control" id="example-textarea" rows="5" wire:model="ruAnswer"></textarea>
                                @error('ruAnswer')
                                    <div style="color: tomato">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div> <!-- end col -->
                    </div>

                    <button type="submit" class="btn btn-primary mr-2 mb-3">Submit</button>
                </form>
            </div>
        </div>
        <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">
            {{-- {{ $this->faqs->links('vendor.pagination.default') }} --}}
        </div>
    </div>
</div>
