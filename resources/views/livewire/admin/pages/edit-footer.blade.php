<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body pb-0">
                <form wire:submit.prevent="save">
                    <section class="mb-50">
                        <h6 class="card-title">Редагування сторінки контактів</h6>

                        <div class="row" id="faqs-cars">

                            @if ($this->locale == 'uk')
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
                                                                            <label for="faqs[2][question]_uk">Опис
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="ukDescription"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukDescription')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на телеграм
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="telegramLink"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('telegramLink')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на вайбер
                                                                            </label>
                                                                            <input type="text" wire:model="viberLink"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('viberLink')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на телеграм бот
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="botTelegram"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('botTelegram')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на вайбер бот
                                                                            </label>
                                                                            <input type="text" wire:model="botViber"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('botViber')
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
                                                                            <label for="faqs[2][question]_uk">Email
                                                                            </label>
                                                                            <input type="text" wire:model="email"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('email')
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
                                                                            <label for="faqs[2][question]_uk">Номер
                                                                                телефону 1
                                                                            </label>
                                                                            <input type="text" wire:model="phone1"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('phone1')
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
                                                                            <label for="faqs[2][question]_uk">Номер
                                                                                телефону 2
                                                                            </label>
                                                                            <input type="text" wire:model="phone2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('phone2')
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
                                                                            <label for="faqs[2][question]_uk">Опис
                                                                                номеру телефону 2
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="ukPhone2Desck"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ukPhone2Desck')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на instagram
                                                                            </label>
                                                                            <input type="text" wire:model="inst"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('inst')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на tik tok
                                                                            </label>
                                                                            <input type="text" wire:model="tikTok"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('tikTok')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на facebook
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="facebook"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('facebook')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на youtube
                                                                            </label>
                                                                            <input type="text" wire:model="youtube"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('youtube')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на linkedin
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="linkedin"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('linkedin')
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

                            @if ($this->locale == 'ru')
                                <div class="col-12 faq-car-row pb-1 mb-4 d-flex justify-content-start"
                                    id="faq-car-id-2">
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
                                                                            <label for="faqs[2][question]_uk">Опис
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="ruDescription"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruDescription')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на телеграм
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="telegramLink"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('telegramLink')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на вайбер
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="viberLink"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('viberLink')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на телеграм бот
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="botTelegram"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('botTelegram')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на вайбер бот
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="botViber"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('botViber')
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
                                                                            <label for="faqs[2][question]_uk">Email
                                                                            </label>
                                                                            <input type="text" wire:model="email"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('email')
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
                                                                            <label for="faqs[2][question]_uk">Номер
                                                                                телефону 1
                                                                            </label>
                                                                            <input type="text" wire:model="phone1"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('phone1')
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
                                                                            <label for="faqs[2][question]_uk">Номер
                                                                                телефону 2
                                                                            </label>
                                                                            <input type="text" wire:model="phone2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('phone2')
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
                                                                            <label for="faqs[2][question]_uk">Опис
                                                                                номеру телефону 2
                                                                                <strong>RU</strong>
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="ruPhone2Desck"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('ruPhone2Desck')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на instagram
                                                                            </label>
                                                                            <input type="text" wire:model="inst"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('inst')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на tik tok
                                                                            </label>
                                                                            <input type="text" wire:model="tikTok"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('tikTok')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на facebook
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="facebook"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('facebook')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на youtube
                                                                            </label>
                                                                            <input type="text" wire:model="youtube"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('youtube')
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
                                                                            <label for="faqs[2][question]_uk">Посилання
                                                                                на linkedin
                                                                                <strong>UK</strong>
                                                                            </label>
                                                                            <input type="text"
                                                                                wire:model="linkedin"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('linkedin')
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