@extends('web.layout.index')

@section('title', 'FAQ')

@section('head')
    @if ($page->meta_title)
        <title>{{ $page->meta_title }}</title>
        <meta name="title" content="{{ $page->meta_title }}">
    @endif

    @if ($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if ($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif

    @if (isset($url['ua']) && isset($url['ru']))
        <link rel="canonical" href="{{ $url[app()->getLocale()] }}">
        <meta property="og:url" content="{{ $url[app()->getLocale()] }}" />

        <link rel="alternate" href="{{ $url['ua'] }}" hreflang="uk-UA">
        <link rel="alternate" href="{{ $url['ru'] }}" hreflang="ru-UA">
        <link rel="alternate" href="{{ $url['ua'] }}" hreflang="x-default">
    @endif
@endsection

@section('OG')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="{{ config('app.name') }}" />
    <meta name="twitter:creator" content="{{ config('app.name') }}" />

    <meta property="og:title" content="{{ $page->meta_title }}" />
    <meta property="og:description" content="{{ $page->meta_description }}" />
    <meta property="og:type" content="page" />
    <meta property="og:url" content="{{ request()->url() }}" />
    {{-- <meta property="og:image" content="" /> --}}
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
                                    <a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}" class="btn-ahead btn btn-block rounded-0 p-0 ml-0">{{ trans('web.back') }}</a>
                                </div>
                                <div class="h3 font-m font-weight-bolder mb-2">{{ trans('page_name.faqs') }}</div>
                                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ App\Helpers\MultiLangRoute::getMultiLangRoute('main.page') }}">{{ trans('page_name.index') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ trans('page_name.faqs') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if($page->faqs->count())
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "FAQPage",
                    "mainEntity": [
                    @foreach($page->faqs()->orderBy('sort', 'ASC')->get() as $faq)
                        {
                            "@type": "Question",
                            "name": "{{ $faq->question }}",
                            "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "<p>{{ $faq->answer }}</p>"
                            }
                        },
                    @endforeach
                    ]
                }
                </script>
            @endif
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
                                                <div class="card-body art-rich-editor">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
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

            @include('components.lead-form', ['page' => 'FAQ page', 'pbLg' => 13])

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

@endsection
