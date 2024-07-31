<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <form wire:submit.prevent="save">
                    <section class="mb-50">
                        <h6 class="card-title">Редагування сторінки контактів</h6>

                        <div class="row" id="faqs-cars">

                            @if($this->locale == 'uk')
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
                                                                            <label for="faqs[2][question]_uk">Заголовок сторінки
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukTitle"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukTitle')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Години роботи</h5>

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
                                                                            <label for="faqs[2][question]_uk">День роботи
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukFirstDay"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukFirstDay')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Години роботи
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukFirstHours"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukFirstHours')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">День роботи
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukSecondDay"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukSecondDay')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Години роботи
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukSecondHours"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukSecondHours')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Адреса</h5>

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
                                                                            <label for="faqs[2][question]_uk">Країна та індекс
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukFirstAddress"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukFirstAddress')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Місто, вулиця
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukSecondAddress"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukSecondAddress')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Номери телефону</h5>

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
                                                                            <label for="faqs[2][question]_uk">Номер телефону 1
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukFirstPhone"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukFirstPhone')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Номер телефону 2
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukSecondPhone"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukSecondPhone')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Email</h5>

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
                                                                            <label for="faqs[2][question]_uk">Email
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukEmail"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukEmail')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Соціальні мережі</h5>

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
                                                                            <label for="faqs[2][question]_uk">Instagram
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukInstagram"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukInstagram')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Facebook
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ukFacebook"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukFacebook')
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
                            @endif

                            @if($this->locale == 'ru')
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
                                                                            <label for="faqs[2][question]_uk">Заголовок сторінки
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruTitle"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruTitle')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Години роботи</h5>

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
                                                                            <label for="faqs[2][question]_uk">День роботи
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruFirstDay"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruFirstDay')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Години роботи
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruFirstHours"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruFirstHours')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">День роботи
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruSecondDay"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruSecondDay')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Години роботи
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruSecondHours"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruSecondHours')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Адреса</h5>

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
                                                                            <label for="faqs[2][question]_uk">Країна та індекс
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruFirstAddress"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruFirstAddress')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Місто, вулиця
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruSecondAddress"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruSecondAddress')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Номери телефону</h5>

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
                                                                            <label for="faqs[2][question]_uk">Номер телефону 1
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruFirstPhone"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruFirstPhone')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Номер телефону 2
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruSecondPhone"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruSecondPhone')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Email</h5>

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
                                                                            <label for="faqs[2][question]_uk">Email
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruEmail"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruEmail')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5>Соціальні мережі</h5>

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
                                                                            <label for="faqs[2][question]_uk">Instagram
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruInstagram"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruInstagram')
                                                                    <div class="mt-1 text-danger ajaxError">
                                                                        {{ $message }}
                                                                    </div>
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
                                                                        id="faqs[2][question]-uk">
                                                                        <div class="form-group mb-1">
                                                                            <label for="faqs[2][question]_uk">Facebook
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text" wire:model="ruFacebook"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruFacebook')
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
                            @endif
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
