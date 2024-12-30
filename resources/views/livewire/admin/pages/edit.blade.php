<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <form wire:submit.prevent="save">
                    <section class="mb-50">
                        <h6 class="card-title">Список FAQ</h6>

                        <div class="row" id="faqs-cars">

                            @if($this->locale == 'ua')
                                @forelse($this->faqs as $index => $faq)
                                    <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-start" id="faq-car-id-2">
                                        <div class="col-md-1">
                                            @if ($loop->iteration !== 1)
                                                <div style="cursor: pointer;" wire:click="newPosition(-1, {{ $index }})">
                                                    <i class="fa fa-sort-up"></i>
                                                </div>
                                            @endif
                                            {{ $faq['sort'] }}
                                            @if (!$loop->last)
                                                <div style="cursor: pointer;" wire:click="newPosition(+1, {{ $index }})">
                                                    <i class="fa fa-sort-desc"></i>
                                                </div>
                                            @endif
                                        </div>

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
                                                                                <label for="faqs[2][question]_uk">Питання
                                                                                    <strong>UA</strong>
                                                                                </label>
                                                                                <input type="text" wire:model="faqs.{{ $index }}.ua.question"
                                                                                    id="faqs[2][question]_uk" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-faqs.2.question.*"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row mb-3">
                                                                <div class="col-md-12">
                                                                    <div class="tab-content">
                                                                        <div language="uk"
                                                                            class="multilang-content tab-pane fade active show "
                                                                            id="faqs[2][answer]-uk">
                                                                            <div class="form-group mb-1" wire:ignore>
                                                                                <label for="faqs[2][answer]_uk">Відповідь
                                                                                    <strong>UA</strong></label>
                                                                                {{-- <textarea wire:model="faqs.{{ $index }}.ua.answer" name="faqs.{{ $index }}.ua.answer"
                                                                                data-quill-editor class="form-control"></textarea> --}}
                                                                                    <div
                                                                                        data-quill-editor
                                                                                        data-name="faqs.{{ $index }}.ua.answer"
                                                                                        data-value="{{ $faqs[$index]['ua']['answer'] }}"
                                                                                        class="editor">
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-faqs.2.answer.*"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <a wire:click="removeElement('{{ $index }}')">
                                                        <i class="ti-close font-weight-bold mr-2"></i>
                                                        Видалити
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            @endif

                            @if($this->locale == 'ru')
                                @forelse($this->faqs as $index => $faq)
                                    <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-between" id="faq-car-id-2">
                                        <div class="col-md-1">
                                            @if ($loop->iteration !== 1)
                                                <div style="cursor: pointer;" wire:click="newPosition(-1, {{ $index }})">
                                                    <i class="fa fa-sort-up"></i>
                                                </div>
                                            @endif
                                            {{ $faq['sort'] }}
                                            @if (!$loop->last)
                                                <div style="cursor: pointer;" wire:click="newPosition(1, {{ $index }})">
                                                    <i class="fa fa-sort-desc"></i>
                                                </div>
                                            @endif
                                        </div>

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
                                                                            id="faqs[2][question]-ru">
                                                                            <div class="form-group mb-1">
                                                                                <label for="faqs[2][question]_uk">Питання
                                                                                    <strong>RU</strong>
                                                                                </label>
                                                                                <input type="text" wire:model="faqs.{{ $index }}.ru.question"
                                                                                    id="faqs[2][question]_ru" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-faqs.2.question.*"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row mb-3">
                                                                <div class="col-md-12">
                                                                    <div class="tab-content">
                                                                        <div language="uk"
                                                                            class="multilang-content tab-pane fade active show "
                                                                            id="faqs[2][answer]-uk">
                                                                            <div class="form-group mb-1" wire:ignore.self>
                                                                                <label for="faqs[2][answer]_ru">Відповідь
                                                                                    <strong>RU</strong></label>
                                                                                {{-- <textarea wire:model="faqs.{{ $index }}.ru.answer" data-quill-editor
                                                                                    wire:model="faqs.{{ $index }}.ru.answer" class="form-control"></textarea> --}}
                                                                                    <div wire:ignore>
                                                                                        <div
                                                                                            data-quill-editor
                                                                                            data-name="faqs.{{ $index }}.ru.answer"
                                                                                            data-value="{{ $faqs[$index]['ru']['answer'] }}"
                                                                                            class="editor">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-faqs.2.answer.*"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <a wire:click="removeElement('{{ $index }}')">
                                                        <i class="ti-close font-weight-bold mr-2"></i>
                                                        Видалити
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            @endif
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12 text-center">
                                <a wire:click="addFaq" id="add-faqs-cars" class="btn mb-2 btn-secondary">
                                    <span class="ti-plus font-weight-bold"></span>
                                    Додати
                                </a>
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

{{-- @push('scripts')
    <script src="{{ asset('admin_src/js/default-assets/quill-init.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('livewire:load', () => {
            initQuillEditors();
        });

        document.addEventListener('livewire:update', () => {
            initQuillEditors();
        });

        function initQuillEditors() {
            const textareas = document.querySelectorAll('textarea[data-quill-editor]');
            textareas.forEach((textarea) => {
                if (!textarea.dataset.quillInitialized) {
                    textarea.dataset.quillInitialized = true;

                    const quill = new Quill(textarea, {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline', 'strike'],        // Formatting buttons
                                [{ 'list': 'ordered' }, { 'list': 'bullet' }],   // Lists
                                [{ 'align': [] }],                               // Alignment options
                                ['clean']                                       // Remove formatting
                            ],
                        },
                    });

                    quill.on('text-change', () => {
                        @this.set(textarea.name, quill.root.innerHTML);
                    });

                    quill.root.innerHTML = textarea.value;
                }
            });
        }
    </script>
@endpush --}}
{{-- @push('scripts')
    <script src="{{ asset('admin_src/js/default-assets/quill-init.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('livewire:load', () => {
            console.log(123);
            initQuillEditors();
        });

        document.addEventListener('livewire:update', () => {
            console.log(456);
            initQuillEditors();
        });

        function initQuillEditors() {
            console.log(789);
            const textareas = document.querySelectorAll('textarea[data-quill-editor]');
            console.log(textareas);
            textareas.forEach((textarea) => {
                if (!textarea.dataset.quillInitialized) {
                    textarea.dataset.quillInitialized = true;

                    const quill = new Quill(textarea, {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline', 'strike'],        // Formatting buttons
                                [{ 'list': 'ordered' }, { 'list': 'bullet' }],   // Lists
                                [{ 'align': [] }],                               // Alignment options
                                ['clean']                                       // Remove formatting
                            ],
                        },
                    });

                    quill.on('text-change', () => {
                        @this.set(textarea.name, quill.root.innerHTML);
                    });

                    // Set initial content
                    quill.root.innerHTML = textarea.value;
                }
            });
        }
    </script>
@endpush --}}
@push('scripts')
    <script src="{{ asset('admin_src/js/default-assets/quill-init.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('livewire:load', () => {
            console.log('Livewire loaded');
            setTimeout(() => {
                initQuillEditors();
            }, 20);
        });

        document.addEventListener('livewire:update', () => {
            console.log('Livewire updated');
            setTimeout(() => {
                initQuillEditors();
            }, 50);
        });

        function initQuillEditors() {
            console.log('Initializing Quill editors...');
            const editors = document.querySelectorAll('div[data-quill-editor]');
            console.log(editors);

            editors.forEach((editor) => {
                if (!editor.dataset.quillInitialized) {
                    editor.dataset.quillInitialized = true;

                    const quill = new Quill(editor, {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline', 'strike'],        // Formatting buttons
                                [{ 'list': 'ordered' }, { 'list': 'bullet' }],   // Lists
                                [{ 'align': [] }],                               // Alignment options
                                ['clean']                                       // Remove formatting
                            ],
                        },
                    });

                    quill.on('text-change', () => {
                        @this.set(editor.getAttribute('data-name'), quill.root.innerHTML);
                    });

                    // Set initial content
                    const initialValue = editor.getAttribute('data-value');
                    if (initialValue) {
                        quill.root.innerHTML = initialValue;
                    }
                }
            });
        }
    </script>
@endpush
