@extends('web.layout.index')

@section('title', 'FAQ')

@section('head')
@endsection

@section('content')
    <main class="main">
        <div class="content">
            <section class="section-top pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-10 mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="index.html" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">Назад</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">Часті питання</div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Часті питання</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="questions" class="questions position-relative pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-10 mx-auto">
                            <div class="row accordion" id="accordion-questions">
                                @forelse($page->faqs()->orderBy('sort', 'ASC')->get() as $faq)
                                <div class="col-12 content">
                                    <div class="card">
                                        <div class="card-header p-0" id="heading-accordion-question-{{ $loop->iteration }}">
                                            <div class="h4 mb-0">
                                                <div class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse-accordion-question-{{ $loop->iteration }}" aria-expanded="false"
                                                    aria-controls="collapse-accordion-question-{{ $loop->iteration }}">{{ $faq->question }}</div>
                                            </div>
                                        </div>
                                        <div id="collapse-accordion-question-{{ $loop->iteration }}" class="collapse"
                                            aria-labelledby="heading-accordion-question-{{ $loop->iteration }}"
                                            data-parent="#accordion-questions">
                                            <div class="card-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($page->faqs()->count() > 10)
                        <div class="row">
                            <div class="col">
                                <nav class="bg-white mt-6 mt-md-2">
                                    <ul class="pagination justify-content-center mb-0"></ul>
                                </nav>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            <section class="any-questions pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="inner px-4 px-md-0 py-7">
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                                        <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Залишились питання?
                                        </div>
                                        <form id="form-any-questions" action="{{ route('feedback.store') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <div class="row field-wrap">
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="any-questions-name">Ваше
                                                            ім’я</label>
                                                        <input type="text" id="any-questions-name" name="name"
                                                            class="form-control mb-2" placeholder="Введіть ім’я" value="{{ old('name') }}">
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
                                                        <label class="control-label" for="any-questions-phone">Номер
                                                            телефону</label>
                                                        <input type="tel" id="any-questions-phone" name="phone"
                                                            class="form-control mb-2" placeholder="+38 000 0000000" value="{{ old('phone') ?? '+380' }}">
                                                        @error('phone')
                                                            <div class="field--help-info small-txt text-red mb-2">Введіть Ваш
                                                                номер телефону</div>
                                                        @enderror

                                                        <input type="hidden" name="page"
                                                            value="сторінка FAQ">

                                                        @foreach(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'] as $utm)
                                                            <input type="hidden" name="{{ $utm }}" value="{{ request($utm) }}">
                                                        @endforeach
                                                    </div>
                                                    @error('phone')
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваш
                                                            номер телефону</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-checkbox position-relative mb-5">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="form-any-questions-check">
                                                        <label class="custom-control-label"
                                                            for="form-any-questions-check">
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
                                                    <button role="button" type="submit"
                                                        class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">Передзвоніть
                                                        мені</button>
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
            <section class="seo pb-7 pb-md-10 pb-lg-13">
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
        </div>
    </main>
    <div class="modal modal--custom popup-сar-selection fade" id="popup-сar-selection" data-keyboard="false" tabindex="-1" aria-labelledby="popup-сar-selectionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content py-4 px-2 p-md-5">
                <div class="modal-body p-0">
                    <form class="form-popup-сar-selection" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="modal-title font-weight-bolder mb-0">Підбір авто</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <svg>
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <p class="mb-3">Вкажи бажану марку, модель, параметри.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-сar-selection--car-make-model">Марка та модель авто</label>
                                    <input type="text" id="popup-сar-selection--car-make-model" class="form-control mb-3" placeholder="Напр. Hyundai Santa FE" autocomplete="no-autofill-please">
                                    <div class="field--help-info small-txt text-red mb-2">Введіть марку та модель авто</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-сar-selection--name">Ваше ім’я</label>
                                    <input type="text" id="popup-сar-selection---name" class="form-control mb-3" placeholder="Введіть ім’я" autocomplete="no-autofill-please">
                                    <div class="field--help-info small-txt text-red mb-2">Введіть Ваше ім’я українськими літерами (кирилицею)</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-сar-selection--phone">Номер телефону</label>
                                    <input type="tel" id="popup-сar-selection--phone" class="form-control mb-3" placeholder="+38 000 0000000" autocomplete="no-autofill-please">
                                    <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox position-relative mb-5">
                                    <input type="checkbox" class="custom-control-input" id="form-popup-сar-selection">
                                    <label class="custom-control-label" for="form-popup-сar-selection">
                                        <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <a href="##">персональних даних</a>.</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-auto">
                                <button type="button" class="btn-modal-close btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">Відправити</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="modal modal--custom popup-any-questions fade" id="popup-any-questions" data-keyboard="false" tabindex="-1" aria-labelledby="popup-any-questionsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content py-4 px-2 p-md-5">
                <div class="modal-body p-0">
                    <form class="form-popup-any-questions" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="modal-title font-weight-bolder mb-0">Залишились питання?</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <svg>
                                                <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-close' }}"></use>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-any-questions--name">Ваше ім’я</label>
                                    <input type="text" id="popup-any-questions---name" class="form-control mb-3" placeholder="Введіть ім’я" autocomplete="no-autofill-please">
                                    <div class="field--help-info small-txt text-red mb-2">Введіть Ваше ім’я українськими літерами (кирилицею)</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-any-questions--phone">Номер телефону</label>
                                    <input type="tel" id="popup-any-questions--phone" class="form-control mb-3" placeholder="+38 000 0000000" autocomplete="no-autofill-please">
                                    <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox position-relative mb-5">
                                    <input type="checkbox" class="custom-control-input" id="form-popup-any-questions">
                                    <label class="custom-control-label" for="form-popup-any-questions">
                                        <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <a href="##">персональних даних</a>.</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-auto">
                                <button type="button" class="btn-modal-close btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">Передзвоніть мені</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
