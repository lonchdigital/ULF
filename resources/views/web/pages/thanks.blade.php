@extends('web.layout.index')

@section('head')
    @if(!empty($page->meta_title))
        <title>{{ $page->meta_title ?? config('app.name') }}</title>
        {{-- <meta name="title" content="{{ $page->meta_title ?? config('app.name') }}"> --}}
    @endif

    @if(!empty($page->meta_description))
        <meta name="description" content="{{ $page->meta_description ?? config('app.name') }}">
    @endif

    @if(!empty($page->meta_keywords))
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif

    @section('OG')
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="{{ config('app.name') }}" />
        <meta name="twitter:creator" content="{{ config('app.name') }}" />

        <meta property="og:title" content="{{ $page->meta_title ?? config('app.name') }}" />
        <meta property="og:description" content="{{ $page->meta_description ?? config('app.name') }}" />
        <meta property="og:type" content="page" />
        <meta property="og:url" content="{{ request()->url() }}" />
    {{-- <meta property="og:image" content="" /> --}}
    @endsection
@endsection

@section('content')
    <main class="main">
        <div class="content">
            <section class="not-found pb-22 pt-18">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="not-found--title mb-3 mb-lg-5">{{ __('web.thank') }}</div>
                            <div class="h5 font-m mb-3 mb-lg-7">{{ __('web.your_request_successful_send') }}</div>
                            <div class="row">
                                <div class="col col-sm-auto mx-auto">
                                    <a href="/"
                                        class="btn-default btn btn-block btn-main-blue text-uppercase">{{ __('web.return_to_main_page') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <section class="tinder py-sm-5 py-md-8 py-lg-13 mb-7 mb-md-10 mb-lg-35">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="inner p-3 p-sm-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-white">Твій
                                            AUTOMATCH</div>
                                        <div class="h5 font-m font-weight-bold mb-6 mb-md-9 text-center text-white">Свайпай
                                            ліворуч, якщо не твоє, праворуч — якщо побачив авто мрії</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8 mb-3 mb-md-0">
                                        <div class="tinder-cards">
                                            <div class="card">
                                                <div class="is-like">LIKE</div>
                                                <div class="card--info">
                                                    <div class="name">Toyota GR86 | 2023</div>
                                                    <div class="w-100">
                                                        <div class="price mb-1"><span class="currency">$</span> <span
                                                                class="value">1 080</span> / міс.</div>
                                                        <div class="btn-arrow btn btn-block">
                                                            <span class="car-properties-preview">Бензин, Автомат, Передній
                                                                привод</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-img">
                                                    <img class="bg-down" src="img/scroll-gallery-car-1.jpeg" alt="img">
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="is-like">LIKE</div>
                                                <div class="card--info">
                                                    <div class="name">Toyota GR86 | 2023</div>
                                                    <div class="w-100">
                                                        <div class="price mb-1"><span class="currency">$</span> <span
                                                                class="value">1 080</span> / міс.</div>
                                                        <div class="btn-arrow btn btn-block">
                                                            <span class="car-properties-preview">Бензин, Автомат, Передній
                                                                привод</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-img">
                                                    <img class="bg-down" src="img/scroll-gallery-car-2.jpeg" alt="img">
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="is-like">LIKE</div>
                                                <div class="card--info">
                                                    <div class="name">Toyota GR86 | 2023</div>
                                                    <div class="w-100">
                                                        <div class="price mb-1"><span class="currency">$</span> <span
                                                                class="value">1 080</span> / міс.</div>
                                                        <div class="btn-arrow btn btn-block">
                                                            <span class="car-properties-preview">Бензин, Автомат, Передній
                                                                привод</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-img">
                                                    <img class="bg-down" src="img/scroll-gallery-car-3.jpeg" alt="img">
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="is-like">LIKE</div>
                                                <div class="card--info">
                                                    <div class="name">Toyota GR86 | 2023</div>
                                                    <div class="w-100">
                                                        <div class="price mb-1"><span class="currency">$</span> <span
                                                                class="value">1 080</span> / міс.</div>
                                                        <div class="btn-arrow btn btn-block">
                                                            <span class="car-properties-preview">Бензин, Автомат, Передній
                                                                привод</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-img">
                                                    <img class="bg-down" src="img/scroll-gallery-car-4.jpeg" alt="img">
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="is-like">LIKE</div>
                                                <div class="card--info">
                                                    <div class="name">Toyota GR86 | 2023</div>
                                                    <div class="w-100">
                                                        <div class="price mb-1"><span class="currency">$</span> <span
                                                                class="value">1 080</span> / міс.</div>
                                                        <div class="btn-arrow btn btn-block">
                                                            <span class="car-properties-preview">Бензин, Автомат, Передній
                                                                привод</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-img">
                                                    <img class="bg-down" src="img/scroll-gallery-car-5.jpeg"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="is-like">LIKE</div>
                                                <div class="card--info">
                                                    <div class="name">Toyota GR86 | 2023</div>
                                                    <div class="w-100">
                                                        <div class="price mb-1"><span class="currency">$</span> <span
                                                                class="value">1 080</span> / міс.</div>
                                                        <div class="btn-arrow btn btn-block">
                                                            <span class="car-properties-preview">Бензин, Автомат, Передній
                                                                привод</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-img">
                                                    <img class="bg-down" src="img/scroll-gallery-car-6.jpeg"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-4">
                                        <div
                                            class="icons h-100 d-flex align-items-center justify-content-center justify-content-md-start">
                                            <div
                                                class="tinder-buttons d-flex flex-md-column flex-lg-row align-items-center">
                                                <button type="button" class="i-dislike">
                                                    <svg>
                                                        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-dislike' }}"></use>
                                                    </svg>
                                                </button>
                                                <button type="button" class="i-favorite" data-toggle="modal"
                                                    data-target="#popup-tinder">
                                                    <svg>
                                                        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-favorite' }}"></use>
                                                    </svg>
                                                </button>
                                                <button type="button" class="i-like">
                                                    <svg>
                                                        <use xlink:href="{{ Vite::asset(config('app.icons_path')) . '#i-like' }}"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
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
            </section> --}}
        </div>
    </main>
@endsection
