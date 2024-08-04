@extends('web.layout.index')

@section('title', 'Catalog')

@section('head')
    @vite(['Modules/Cars/resources/js/cars-catalog.js'])
@endsection

@section('content')
    <main class="main">
        <div class="content">
            <section class="section-top pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="{{ route('main.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="h3 font-m font-weight-bolder d-none d-lg-block">{{ trans('web.our_car_park') }} <br
                                            class="d-sm-none"><span class="text-main-blue">=</span><br class="d-sm-none">
                                        {{ trans('web.your_car_park') }}</div>
                                    <div class="h3 font-m font-weight-bolder d-lg-none">{{ trans('page_name.car_park') }}</div>
                                    <div class="filters-button ml-4">
                                        <button type="button" class="btn btn-reset">
                                            <svg class="i-sorting">
                                                <use xlink:href="img/icons/icons.svg#i-sorting"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-reset btn-filter collapsed"
                                            data-toggle="collapse" data-target="#navbarFilters"
                                            aria-controls="navbarFilters" aria-expanded="false"
                                            aria-label="Toggle navigation" id="toggleFilter">
                                            <svg class="i-filters-menu">
                                                <use xlink:href="img/icons/icons.svg#i-filters-menu"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ trans('page_name.car_park') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="our-fleet pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div id="cars-list" class="our-fleet-preview row">
                                {{-- Got from AJAX --}}


                                {{-- TODO:: use this code to display cars on homepage --}}
                                {{--@foreach ($cars as $car)
                                    <div class="content col-12 col-md-6 col-lg-4">
                                        <div class="our-fleet-preview--item">
                                            <div class="name">{{ $car->getFullName() }}</div>
                                            <div class="wrap-img">
                                                <img src="{{ $car->getMainImageUrl() }}" alt="Car image">
                                            </div>
                                            @if(count($car->subscribePrices) > 0 && !is_null($car->subscribePrices->where('section_id', 1)->first()->monthly_payment))
                                                <div class="price mb-1">
                                                    <span class="currency">$</span>
                                                    <span class="value">{{ $car->subscribePrices->where('section_id', 1)->first()->monthly_payment }}</span> / міс.
                                                </div>
                                            @endif
                                            <a href="{{ route('car.single.page', ['slug' => $car->page->slug]) }}" class="btn-arrow btn btn-block">
                                                <span>{{ $car->getShortDesc() }}</span>
                                                <span>Бензин, 2.0, Автомат, Повний привод</span>
                                            </a>
                                            @if($car->label)
                                                <div class="discount {{ ($car->label_color_id === 2) ? 'label-red': '' }}">{!! $car->label !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5 mb-lg-0">
                        <div class="col-auto mx-auto ">
                            <button id="show-more" type="button" class="btn-show-more btn btn-main-blue btn-default text-uppercase">Показати більше</button>
                        </div>
                        <div class="col-12">
                            <nav class="bg-white mt-5 mt-md-2">
                                <ul id="pagination-wrapper" class="pagination-ajax justify-content-center mb-0">
                                    {{-- Got from AJAX --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row d-lg-none our-fleet--mob">
                        <div class="our-fleet-search col">
                            <div class="our-fleet-search--inner position-relative">
                                <div class="our-fleet-preview--item bg-main-blue">
                                    <div class="name text-white text-center">Не знайшов авто мрії в нашому автопарку?</div>
                                    <div class="wrap-img">
                                        <img src="img/car-6.png" alt="Image">
                                    </div>
                                    <div class="row">
                                        <div class="col col-sm-auto mx-auto">
                                            <button type="button"
                                                class="btn-default btn-default-white btn btn-block btn-white text-uppercase font-weight-bold"
                                                data-toggle="modal" data-target="#popup-сar-selection">НА ПОШУКИ
                                                АВТО</button>
                                        </div>
                                    </div>
                                    <div class="wrap-img wrap-img--hidden">
                                        <img src="img/bg-car-preview.png" class="bg-down" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="test-drive pb-7 pb-md-10 pb-lg-22 d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="inner px-4 px-md-0 py-7">
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                                        <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Завітай на тест-драйв
                                        </div>
                                        <div class="h4 font-m font-weight-bolder mb-3 mb-md-9 text-md-center">Можеш
                                            спробувати, а потім підписатись</div>
                                        <form id="form-test-drive">
                                            <div class="row field-wrap">
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="name">Ваше ім’я</label>
                                                        <input type="text" id="name" class="form-control mb-2"
                                                            placeholder="Введіть ім’я">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваше
                                                            ім’я українськими літерами (кирилицею)</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="phone">Номер телефону</label>
                                                        <input type="tel" id="phone" class="form-control mb-2"
                                                            placeholder="+38 000 0000000">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваш
                                                            номер телефону</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-checkbox position-relative mb-5">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="form-test-drive-check">
                                                        <label class="custom-control-label" for="form-test-drive-check">
                                                            <span class="custom-checkbox--info">Я даю згоду на збір,
                                                                обробку, зберігання та використання своїх <span
                                                                    class="link-underline"><a href="##">персональних
                                                                        даних</a></span>.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-auto mx-auto">
                                                    <a href="##"
                                                        class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">ХОЧУ
                                                        ЗАТЕСТИТИ</a>
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
            <section class="seo pb-7 pb-md-10 pb-lg-22">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="spoiler">
                                <div>
                                    <h3>Автомобілі за підпискою – мінімум зобов’язань, максимум свободи</h3>
                                    <h5>Поїздки в офіс, зустрічі з партнерами, відрядження – людині, якій за день треба
                                        встигати відвідувати багато місць, не обійтися без надійного, потужного,
                                        презентабельного авто. Сьогодні в Україні можна купити транспортний засіб будь-якого
                                        класу та марки. Але така покупка – це і додаткові турботи: оформлення права
                                        власності, КАСКО, ОСЦПВ, витрата часу на техобслуговування.<br>
                                        Якщо ви бажаєте стати володарем хорошої автомашини, при цьому щоб вашою єдиною
                                        турботою було вчасно заправляти її бак, тоді сервіс підписки на автомобілі – те, що
                                        потрібно. А компанія <span class="link-bg"><a href="##">ULFAUTO</a></span>
                                        (Київ) допоможе оформити угоду швидко і на вигідних для вас умовах.
                                    </h5>
                                </div>
                                <div>
                                    <h3>Підписка на машину – порядок роботи сервісу</h3>
                                    <h5>У багатьох країнах високим попитом серед фізичних осіб користується послуга
                                        “Автомобіль за підпискою”, Україна ж донедавна була позбавлена можливості оцінити
                                        переваги цієї опції. Однак завдяки <span class="link-bg"><a
                                                href="##">ULFAUTO</a></span> сьогодні в нашій країні з’явилася перша
                                        справжня вдосконалена оренда автомобіля – за підпискою.<br>
                                        Послуга дає змогу легко взяти в тимчасове користування новий транспортний засіб або
                                        транспортний засіб, що вже побував в експлуатації, в ідеальному технічному стані,
                                        отримавши повноцінне сервісне обслуговування (ремонт, зберігання і заміна шин,
                                        підтримка в дорозі), а також деякі безкоштовні плюшки (дитяче крісло, рейлінги та
                                        ін.).<br>
                                        Щоб укласти договір, фізичній особі необхідно надати паспорт, ІПН, водійські права,
                                        внести перший платіж за місяць і гарантійний депозит. Підписку не доведеться
                                        доводити свою платоспроможність, надавати кредитну історію, шукати поручителів.<br>
                                        Користування седаном або кросовером відбувається приблизно за тим самим принципом,
                                        як у випадку з платними мобільними додатками або абонементом у спортзал. Щомісяця з
                                        рахунку фізичної особи списується певна сума, але за бажання, послугу в будь-який
                                        час можна заморозити.
                                    </h5>
                                </div>
                                <div>
                                    <h3>Як взяти машину за підпискою – етапи угоди</h3>
                                    <h5>Ми подбали про те, щоб для фізичних осіб з Києва та інших регіонів країни, яких
                                        цікавить оренда транспортного засобу, став доступним сервіс “Авто за підпискою”.<br>
                                        Щоб оформити підписку, потрібно:</h5>
                                    <ol>
                                        <li>Вибрати в каталозі відповідну марку і модель ТЗ.</li>
                                        <li>Вказати бажаний термін користування транспортом.</li>
                                        <li>Натиснути кнопку “Подати заявку”.</li>
                                    </ol>
                                    <h5>Після узгодження з менеджерами <span class="link-bg"><a
                                                href="##">ULFAUTO</a></span> транспортний засіб передається в
                                        користування своєму новому власнику.</h5>
                                </div>
                                <div>
                                    <h3>Машина за підпискою, каршерінг, лізинг – у чому відмінності?</h3>
                                    <h5>Усі три види послуг надають фізичним особам можливість користуватися транспортним
                                        засобом. Але між ними є принципові відмінності.<br>
                                        Каршерінг підходить ідеально, коли потрібен персональний транспорт на пару годин. З
                                        головних недоліків послуги – вартість, що перевищує тарифи таксі, необхідність
                                        внести заставну суму, ризик отримати в оренду авто з погано прибраним салоном.<br>
                                        Лізинг – довгострокова оренда ТЗ, яке в підсумку можна викупити. Має багато
                                        спільного з придбанням у кредит. Опція підходить тим, хто не бажає віддавати відразу
                                        повну суму за покупку, а вважає за краще виплачувати її поступово. На старті
                                        доведеться заплатити 15-30% від вартості транспортного засобу. Сервіс більш
                                        популярний серед юридичних осіб.<br>
                                        Взяти авто по підписці – новий спосіб володіння транспортним засобом. Опція
                                        розрахована на фізичних осіб, які не бажають витрачати гроші на придбання ТЗ або
                                        сковувати себе кредитними зобов’язаннями. Можливий період підписки – від 1 місяця до
                                        2 років. Користуватися транспортом і сервісним обслуговуванням можна відразу після
                                        внесення оплати за 1 місяць і гарантійного депозиту, який повертається після
                                        завершення договору.<br>
                                        Якщо говорити про такий момент, як вартість авто за підпискою, то Україна – з тих
                                        країн, де ціни суттєво варіюються залежно від моделі транспортного засобу,
                                        тривалості користування. Але головний фактор ціноутворення – якісне сервісне
                                        обслуговування, що не передбачено у звичайній оренді та каршерінгу, а в лізингу
                                        представлено лише частково.</h5>
                                </div>
                                <div>
                                    <h3>Машина за підпискою в <span class="link-bg"><a href="##">ULFAUTO</a></span> –
                                        основні переваги</h3>
                                    <h5>Компанія <span class="link-bg"><a href="##">ULFAUTO</a></span> в сегменті
                                        автопослуг працює 11 років. Своїм клієнтам ми гарантуємо:</h5>
                                    <ul>
                                        <li>Бездоганний стан автотранспорту з каталогу;</li>
                                        <li>Широкий вибір марок і моделей на різні бюджети;</li>
                                        <li>Цілодобову підтримку (працює у всіх країнах Європи);</li>
                                        <li>Швидке оформлення;</li>
                                        <li>Мінімальний перший платіж;</li>
                                        <li>Припинення договору за бажанням орендаря.</li>
                                    </ul>
                                    <h5>Нашими послугами можна скористатися в Києві, Львові та області. Здійсніть свою мрію
                                        про ідеальний автомобіль вже сьогодні – оформлюйте підписку в <span
                                            class="link-bg"><a href="##">ULFAUTO</a></span>.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="sidebar collapse" id="navbarFilters">
                <div class="d-flex justify-content-between mb-3">
                    <div class="filter-title mr-4">Фільтри</div>
                    <button type="button" class="btn-close btn btn-reset" data-toggle="collapse" href="#navbarFilters"
                        role="button" aria-expanded="false" aria-controls="navbarFilters">
                        <svg class="i-close">
                            <use xlink:href="img/icons/icons.svg#i-close"></use>
                        </svg>
                    </button>
                </div>
                <div class="sidebar-filter">
                    <div class="filter-item">
                        <button type="button"
                            class="btn-clear-filter btn-default btn-transparent btn btn-block mt-0 p-0 align-content-center mb-3">Очистити</button>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Оберіть ваше місто</div>
                                <label for="select-choose-city"
                                    class="small-txt font-weight-bold text-grey mb-1">Місто</label>
                                <div class="select-wrap">
                                    <select class="select-choose-city" name="select-choose-city">
                                        <!-- <option></option> -->
                                        <option value="1">Луцьк</option>
                                        <option value="2">Львів</option>
                                        <option value="3">Київ</option>
                                        <option value="4">Володимир</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Оберіть марку авто</div>
                                <label for="select-choose-brand" class="small-txt font-weight-bold text-grey mb-1">Марка
                                    авто</label>
                                <div class="select-wrap">
                                    <select class="select-choose-brand" name="select-choose-brand">
                                        <option></option>
                                        <option value="1">Ford</option>
                                        <option value="2">Volvo</option>
                                        <option value="3">Nissan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-6">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Вкажіть ціну</div>
                                <div class="small-txt font-weight-bold text-grey mb-1">Ціна $ / міс.</div>
                                <div class="inner">
                                    <input class="currency-first form-control" type="number" value="0"
                                        min="0" max="50000" step="1">
                                    <input class="currency-last form-control" type="number" value="50000"
                                        min="0" max="50000" step="1">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div id="currency-range-slider" class="price-slider slider-range position-relative">
                                <div class="range-bar-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-6">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Вкажіть рік випуску</div>
                                <div class="small-txt font-weight-bold text-grey mb-1">Рік випуску</div>
                                <div class="inner">
                                    <div class="datepicker">
                                        <input id="graduation-year-first" class="form-control" type="text" readonly
                                            data-input autocomplete="no-autofill-please">
                                    </div>
                                    <div class="datepicker">
                                        <input id="graduation-year-last" class="form-control" type="text" readonly
                                            data-input autocomplete="no-autofill-please">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="small-txt font-weight-bold text-grey mb-1">Тип кузову</div>
                        <div class="mb-6">
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="body-type-1">
                                <label class="custom-control-label" for="body-type-1">
                                    <span class="custom-checkbox--info">Тип 1</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="body-type-2">
                                <label class="custom-control-label" for="body-type-2">
                                    <span class="custom-checkbox--info">Тип 2</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="body-type-3">
                                <label class="custom-control-label" for="body-type-3">
                                    <span class="custom-checkbox--info">Тип 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="small-txt font-weight-bold text-grey mb-1">Коробка передач</div>
                        <div class="mb-6">
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="transmission-1">
                                <label class="custom-control-label" for="transmission-1">
                                    <span class="custom-checkbox--info">Тип 1</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="transmission-2">
                                <label class="custom-control-label" for="transmission-2">
                                    <span class="custom-checkbox--info">Тип 2</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="transmission-3">
                                <label class="custom-control-label" for="transmission-3">
                                    <span class="custom-checkbox--info">Тип 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="small-txt font-weight-bold text-grey mb-1">Тип палива</div>
                        <div class="mb-6">
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="fuel-type-1">
                                <label class="custom-control-label" for="fuel-type-1">
                                    <span class="custom-checkbox--info">Тип 1</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="fuel-type-2">
                                <label class="custom-control-label" for="fuel-type-2">
                                    <span class="custom-checkbox--info">Тип 2</span>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox position-relative mb-2">
                                <input type="checkbox" class="custom-control-input" id="fuel-type-3">
                                <label class="custom-control-label" for="fuel-type-3">
                                    <span class="custom-checkbox--info">Тип 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="field-wrap mb-3">
                            <div class="field">
                                <div class="field--help-info small-txt text-red mb-1">Вкажіть об‘єм двигуна</div>
                                <div class="small-txt font-weight-bold text-grey mb-1">Об‘єм двигуна (л)</div>
                                <div class="inner">
                                    <input class="form-control" type="number" autocomplete="no-autofill-please">
                                    <input class="form-control" type="number" autocomplete="no-autofill-please">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-n3">
                    <a class="btn-filter-close btn btn-main-blue btn-default text-uppercase w-100 rounded-0"
                        data-toggle="collapse" href="#navbarFilters" role="button" aria-expanded="false"
                        aria-controls="navbarFilters">Застосувати</a>
                </div>
            </div>
        </div>
    </main>

@endsection
