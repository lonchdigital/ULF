<section id="testDriveForm" class="test-drive pb-md-10 pb-lg-{{ $pbLg }} order-last order-md-first">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="inner px-4 px-md-0 py-7">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                            <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Завітай на тест-драйв</div>
                            <div class="h4 font-m font-weight-bolder mb-3 mb-md-9 text-md-center">Можеш спробувати, а потім підписатись</div>
                            <form id="form-test-drive"  action="{{ route('test.drive.feedback.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row field-wrap">
                                    <div class="col-12 col-md-6">
                                        <div class="field mb-2 mb-md-8">
                                            <label class="control-label" for="name">Ваше ім’я</label>
                                            <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Введіть ім’я">
                                            @error('name')
                                            <div class="field--help-info small-txt text-red mb-2">Введіть Ваше
                                                ім’я українськими літерами (кирилицею)</div>
                                            @enderror
                                        </div>
                                        @error('name')
                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваше
                                            ім’я українськими літерами (кирилицею)</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="field mb-2 mb-md-8">
                                            <label class="control-label" for="phone">Номер телефону</label>
                                            <input type="tel" name="phone" id="phone" class="form-control phone-field mb-2" value="{{ old('phone') ?? '+380' }}">
                                            <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="page"
                                           value="{{ $page }}">

                                    @foreach(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'] as $utm)
                                        <input type="hidden" name="{{ $utm }}" value="{{ request($utm) }}">
                                    @endforeach

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox position-relative mb-5">
                                            <input type="checkbox" class="custom-control-input" id="form-test-drive-check">
                                            <label class="custom-control-label" for="form-test-drive-check">
                                                <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <span class="link-underline"><a href="##">персональних даних</a></span>.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-md-auto mx-auto">
                                        <button role="button" type="submit" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">ХОЧУ ЗАТЕСТИТИ</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
