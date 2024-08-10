@extends('web.layout.index')

@section('title', 'Single Car!!!')

@section('head')
@endsection

@section('content')

    <main class="main">
        <div class="content">
            <section class="section-top pt-5 d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="section-top--info nav-breadcrumb">
                                <div class="mb-2">
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">{{ $car->getName() }}</div>
                                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between mb-3">
                                    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3 mb-lg-0">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                            <li class="breadcrumb-item"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('catalog.page') }}">{{ trans('page_name.car_park') }}</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $car->getName() }}</li>
                                        </ol>
                                    </nav>
                                    <ul class="list-unstyled mb-0 car-properties-preview">
                                        <li>{{ $car->vehicle->manufacturedYear }}</li>
                                        <li>{{ $car->vehicle->fuelType->name }}</li> {{-- Бензин, 2.0 --}}
{{--                                        <li>Автомат</li>--}}
{{--                                        <li>Повний привод</li>--}}
{{--                                        <li>Київ</li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <x-car.gallery :car="$car" />

            <section class="car-content pb-4 pb-md-7 pb-lg-9">
                <div class="container">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-12 col-lg-6">
                            <x-car.info :car="$car" />
                        </div>
                        <div class="col-12 col-lg-6 mb-7 mb-lg-0">
                            <x-car.subscription-period :car="$car" :subscribeMonthSettings="$subscribeMonthSettings" />
                        </div>
                    </div>
                </div>
            </section>

            <x-subscription-benefits :subscribeBenefits="$subscribeBenefits" />

            <x-gallery-cars :car="$car" />

            <x-service-steps />

            <x-callback-form />

            <x-fleet />

            <x-f-a-qs />


            <section class="any-questions pb-7 pb-md-10 pb-lg-13">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="inner px-4 px-md-0 py-7">
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                                        <div class="h3 font-m mb-2 font-weight-bolder text-md-center">Залишились питання?</div>
                                        <form id="form-any-questions">
                                            <div class="row field-wrap">
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="any-questions-name">Ваше ім’я</label>
                                                        <input type="text" id="any-questions-name" class="form-control mb-2" placeholder="Введіть ім’я">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваше ім’я українськими літерами (кирилицею)</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="field mb-2 mb-md-8">
                                                        <label class="control-label" for="any-questions-phone">Номер телефону</label>
                                                        <input type="tel" id="any-questions-phone" class="form-control mb-2" placeholder="+38 000 0000000">
                                                        <div class="field--help-info small-txt text-red mb-2">Введіть Ваш номер телефону</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-checkbox position-relative mb-5">
                                                        <input type="checkbox" class="custom-control-input" id="form-any-questions-check">
                                                        <label class="custom-control-label" for="form-any-questions-check">
                                                            <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <span class="link-underline"><a href="##">персональних даних</a></span>.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-auto mx-auto">
                                                    <a href="##" class="btn-default btn-default-orange btn btn-block btn-orange text-uppercase">Передзвоніть мені</a>
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
                                    <h5>Поїздки в офіс, зустрічі з партнерами, відрядження – людині, якій за день треба встигати відвідувати багато місць, не обійтися без надійного, потужного, презентабельного авто. Сьогодні в Україні можна купити транспортний засіб будь-якого класу та марки. Але така покупка – це і додаткові турботи: оформлення права власності, КАСКО, ОСЦПВ, витрата часу на техобслуговування.<br>
                                        Якщо ви бажаєте стати володарем хорошої автомашини, при цьому щоб вашою єдиною турботою було вчасно заправляти її бак, тоді сервіс підписки на автомобілі – те, що потрібно. А компанія <span class="link-bg"><a href="##">ULFAUTO</a></span> (Київ) допоможе оформити угоду швидко і на вигідних для вас умовах.
                                    </h5>
                                </div>
                                <div>
                                    <h3>Підписка на машину – порядок роботи сервісу</h3>
                                    <h5>У багатьох країнах високим попитом серед фізичних осіб користується послуга “Автомобіль за підпискою”, Україна ж донедавна була позбавлена можливості оцінити переваги цієї опції. Однак завдяки <span class="link-bg"><a href="##">ULFAUTO</a></span> сьогодні в нашій країні з’явилася перша справжня вдосконалена оренда автомобіля – за підпискою.<br>
                                        Послуга дає змогу легко взяти в тимчасове користування новий транспортний засіб або транспортний засіб, що вже побував в експлуатації, в ідеальному технічному стані, отримавши повноцінне сервісне обслуговування (ремонт, зберігання і заміна шин, підтримка в дорозі), а також деякі безкоштовні плюшки (дитяче крісло, рейлінги та ін.).<br>
                                        Щоб укласти договір, фізичній особі необхідно надати паспорт, ІПН, водійські права, внести перший платіж за місяць і гарантійний депозит. Підписку не доведеться доводити свою платоспроможність, надавати кредитну історію, шукати поручителів.<br>
                                        Користування седаном або кросовером відбувається приблизно за тим самим принципом, як у випадку з платними мобільними додатками або абонементом у спортзал. Щомісяця з рахунку фізичної особи списується певна сума, але за бажання, послугу в будь-який час можна заморозити.
                                    </h5>
                                </div>
                                <div>
                                    <h3>Як взяти машину за підпискою – етапи угоди</h3>
                                    <h5>Ми подбали про те, щоб для фізичних осіб з Києва та інших регіонів країни, яких цікавить оренда транспортного засобу, став доступним сервіс “Авто за підпискою”.<br>
                                        Щоб оформити підписку, потрібно:</h5>
                                    <ol>
                                        <li>Вибрати в каталозі відповідну марку і модель ТЗ.</li>
                                        <li>Вказати бажаний термін користування транспортом.</li>
                                        <li>Натиснути кнопку “Подати заявку”.</li>
                                    </ol>
                                    <h5>Після узгодження з менеджерами <span class="link-bg"><a href="##">ULFAUTO</a></span> транспортний засіб передається в користування своєму новому власнику.</h5>
                                </div>
                                <div>
                                    <h3>Машина за підпискою, каршерінг, лізинг – у чому відмінності?</h3>
                                    <h5>Усі три види послуг надають фізичним особам можливість користуватися транспортним засобом. Але між ними є принципові відмінності.<br>
                                        Каршерінг підходить ідеально, коли потрібен персональний транспорт на пару годин. З головних недоліків послуги – вартість, що перевищує тарифи таксі, необхідність внести заставну суму, ризик отримати в оренду авто з погано прибраним салоном.<br>
                                        Лізинг – довгострокова оренда ТЗ, яке в підсумку можна викупити. Має багато спільного з придбанням у кредит. Опція підходить тим, хто не бажає віддавати відразу повну суму за покупку, а вважає за краще виплачувати її поступово. На старті доведеться заплатити 15-30% від вартості транспортного засобу. Сервіс більш популярний серед юридичних осіб.<br>
                                        Взяти авто по підписці – новий спосіб володіння транспортним засобом. Опція розрахована на фізичних осіб, які не бажають витрачати гроші на придбання ТЗ або сковувати себе кредитними зобов’язаннями. Можливий період підписки – від 1 місяця до 2 років. Користуватися транспортом і сервісним обслуговуванням можна відразу після внесення оплати за 1 місяць і гарантійного депозиту, який повертається після завершення договору.<br>
                                        Якщо говорити про такий момент, як вартість авто за підпискою, то Україна – з тих країн, де ціни суттєво варіюються залежно від моделі транспортного засобу, тривалості користування. Але головний фактор ціноутворення – якісне сервісне обслуговування, що не передбачено у звичайній оренді та каршерінгу, а в лізингу представлено лише частково.</h5>
                                </div>
                                <div>
                                    <h3>Машина за підпискою в <span class="link-bg"><a href="##">ULFAUTO</a></span> – основні переваги</h3>
                                    <h5>Компанія <span class="link-bg"><a href="##">ULFAUTO</a></span> в сегменті автопослуг працює 11 років. Своїм клієнтам ми гарантуємо:</h5>
                                    <ul>
                                        <li>Бездоганний стан автотранспорту з каталогу;</li>
                                        <li>Широкий вибір марок і моделей на різні бюджети;</li>
                                        <li>Цілодобову підтримку (працює у всіх країнах Європи);</li>
                                        <li>Швидке оформлення;</li>
                                        <li>Мінімальний перший платіж;</li>
                                        <li>Припинення договору за бажанням орендаря.</li>
                                    </ul>
                                    <h5>Нашими послугами можна скористатися в Києві, Львові та області. Здійсніть свою мрію про ідеальний автомобіль вже сьогодні – оформлюйте підписку в <span class="link-bg"><a href="##">ULFAUTO</a></span>.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection
