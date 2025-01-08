<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <form wire:submit.prevent="save">
                    <section class="mb-50">
                        <h6 class="card-title">Твій AUTOMATCH</h6>

                        <div class="row" id="faqs-cars">

                            @if ($this->locale == 'ua')
                                <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-start" id="faq-car-id-2">
                                    <div class="border border-secondary rounded p-3 col-md-12">
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
                                                                            <label for="faqs[2][question]_uk">Заголовок
                                                                                <strong>UA</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukTitle"
                                                                                id="faqs[2][question]_uk"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukTitle')
                                                                <div class="mt-1 text-danger ajaxError"
                                                                    id="error-field-faqs.2.question.*">{{ $message }}</div>
                                                                @enderror
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
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][answer]_uk">Опис
                                                                                <strong>UA</strong></label>
                                                                            <textarea wire:model="ukDescription" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukDescription')
                                                                <div class="mt-1 text-danger ajaxError"
                                                                    id="error-field-faqs.2.question.*">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @forelse($this->automatches as $index => $automatch)
                                    <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-start"
                                        id="faq-car-id-2">
                                        <div class="col-md-1">
                                            @if ($loop->iteration !== 1)
                                                <div style="cursor: pointer;"
                                                    wire:click="newPosition(-1, {{ $index }})">
                                                    <i class="fa fa-sort-up"></i>
                                                </div>
                                            @endif
                                            {{ $automatch['sort'] }}
                                            @if (!$loop->last)
                                                <div style="cursor: pointer;"
                                                    wire:click="newPosition(+1, {{ $index }})">
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
                                                                                <label for="faqs[2][question]_uk">Назва
                                                                                    <strong>UA</strong>
                                                                                </label>
                                                                                <input type="text"
                                                                                    wire:model="automatches.{{ $index }}.ua.title"
                                                                                    id="automatches[2][title]_uk"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.title.*"></div>
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
                                                                            id="faqs[2][question]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="faqs[2][question]_uk">Вартість
                                                                                </label>
                                                                                <input type="text"
                                                                                    wire:model="automatches.{{ $index }}.price"
                                                                                    id="automatches[2][price]_uk"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.title.*"></div>
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
                                                                            id="automatches[2][link]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][link]_uk">Посилання
                                                                                </label>
                                                                                <input type="text"
                                                                                    wire:model="automatches.{{ $index }}.link"
                                                                                    id="automatches[2][link]_uk"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.link.*"></div>
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
                                                                            id="automatches[2][description]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][title]_uk">Опис
                                                                                    <strong>UA</strong></label>
                                                                                <textarea wire:model="automatches.{{ $index }}.ua.description" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.description.*">
                                                                    </div>
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
                                                                            id="automatches[2][description]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][title]_uk">Коментар
                                                                                </label>
                                                                                <textarea wire:model="automatches.{{ $index }}.comment" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="checkbox d-inline">
                                                                    <input type="checkbox" name="checkbox-1"
                                                                        id="checkbox-1"
                                                                        wire:model="automatches.{{ $index }}.is_active">
                                                                    <label for="checkbox-1" class="cr">Чи активна
                                                                        картка</label>
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
                                                                            id="automatches[2][description]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][title]_uk">Зображення</label></br>
                                                                                @if (isset($this->automatches[$index]['temporaryImage']))
                                                                                    <img src="{{ $this->automatches[$index]['temporaryImage'] }}"
                                                                                        width="60"><a
                                                                                        wire:click="deleteImage('{{ $index }}')"
                                                                                        style="cursor: pointer;">
                                                                                        <i
                                                                                            class="ti-close font-weight-bold mr-2"></i>
                                                                                        Видалити зображення
                                                                                    </a>
                                                                                @else
                                                                                    @if (isset($this->automatches[$index]['image']))
                                                                                        <img src="{{ $this->automatches[$index]['image'] }}"
                                                                                            class="mb-2"
                                                                                            width="60"></br>
                                                                                    @endif

                                                                                    <input type="file"
                                                                                        wire:model="automatches.{{ $index }}.newImage">
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.description.*">
                                                                    </div>
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

                            @if ($this->locale == 'ru')
                                <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-start"
                                    id="faq-car-id-2">
                                    <div class="border border-secondary rounded p-3 col-md-12">
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
                                                                            <label for="faqs[2][question]_uk">Заголовок
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruTitle"
                                                                                id="faqs[2][question]_uk"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruTitle')
                                                                <div class="mt-1 text-danger ajaxError"
                                                                    id="error-field-faqs.2.question.*">{{ $message }}</div>
                                                                @enderror
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
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][answer]_uk">Опис
                                                                                <strong>RU</strong></label>
                                                                            <textarea wire:model="ruDescription" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruDescription')
                                                                <div class="mt-1 text-danger ajaxError"
                                                                    id="error-field-faqs.2.question.*">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @forelse($this->automatches as $index => $automatch)
                                    <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-between"
                                        id="faq-car-id-2">
                                        <div class="col-md-1">
                                            @if ($loop->iteration !== 1)
                                                <div style="cursor: pointer;"
                                                    wire:click="newPosition(-1, {{ $index }})">
                                                    <i class="fa fa-sort-up"></i>
                                                </div>
                                            @endif

                                            {{ $automatch['sort'] }}
                                            @if (!$loop->last)
                                                <div style="cursor: pointer;"
                                                    wire:click="newPosition(1, {{ $index }})">
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
                                                                            id="automatches[2][title]-ru">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][title]_uk">Назва
                                                                                    <strong>RU</strong>
                                                                                </label>
                                                                                <input type="text"
                                                                                    wire:model="automatches.{{ $index }}.ru.title"
                                                                                    id="automatches[2][title]_ru"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.title.*"></div>
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
                                                                        <div language="ru"
                                                                            class="multilang-content tab-pane fade active show "
                                                                            id="faqs[2][question]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="faqs[2][question]_uk">Вартість
                                                                                </label>
                                                                                <input type="text"
                                                                                    wire:model="automatches.{{ $index }}.price"
                                                                                    id="automatches[2][price]_uk"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.title.*"></div>
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
                                                                            id="automatches[2][link]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][link]_uk">Посилання
                                                                                </label>
                                                                                <input type="text"
                                                                                    wire:model="automatches.{{ $index }}.link"
                                                                                    id="automatches[2][link]_uk"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.link.*"></div>
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
                                                                        <div language="ru"
                                                                            class="multilang-content tab-pane fade active show "
                                                                            id="automatches[2][description]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][description]_ru">Опис
                                                                                    <strong>RU</strong></label>
                                                                                <textarea wire:model="automatches.{{ $index }}.ru.description" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.description.*">
                                                                    </div>
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
                                                                            id="automatches[2][description]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][title]_uk">Коментар
                                                                                </label>
                                                                                <textarea wire:model="automatches.{{ $index }}.comment" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="checkbox d-inline">
                                                                    <input type="checkbox" name="checkbox-1"
                                                                        id="checkbox-1"
                                                                        wire:model="automatches.{{ $index }}.is_active">
                                                                    <label for="checkbox-1" class="cr">Чи активна
                                                                        картка</label>
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
                                                                            id="automatches[2][description]-uk">
                                                                            <div class="form-group mb-1">
                                                                                <label
                                                                                    for="automatches[2][title]_uk">Зображення</label></br>
                                                                                @if (isset($this->automatches[$index]['temporaryImage']))
                                                                                    <img src="{{ $this->automatches[$index]['temporaryImage'] }}"
                                                                                        width="60"><a
                                                                                        wire:click="deleteImage('{{ $index }}')"
                                                                                        style="cursor: pointer;">
                                                                                        <i
                                                                                            class="ti-close font-weight-bold mr-2"></i>
                                                                                        Видалити зображення
                                                                                    </a>
                                                                                @else
                                                                                    @if (isset($this->automatches[$index]['image']))
                                                                                        <img src="{{ $this->automatches[$index]['image'] }}"
                                                                                            width="60">
                                                                                    @endif

                                                                                    <input type="file"
                                                                                        wire:model="automatches.{{ $index }}.newImage">
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-1 text-danger ajaxError"
                                                                        id="error-field-automatches.2.description.*">
                                                                    </div>
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
                                <a wire:click="addAutomatch" id="add-faqs-cars" class="btn mb-2 btn-secondary">
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
