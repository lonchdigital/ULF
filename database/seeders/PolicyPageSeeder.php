<?php

namespace Database\Seeders;

use App\Http\Controllers\Web\PageController;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;

class PolicyPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'controller' => PageController::class,
            'slug' => 'policy',
            'active' => 1,
        ]);

        $text_uk = <<<EOT
        <strong>ЗГОДА-ДОЗВІЛ НА ОБРОБКУ ПЕРСОНАЛЬНИХ ДАНИХ</strong>
        <p>Підписанням цієї згоди Я, власник персональних даних (надалі – Клієнт), надаю свою згоду/дозвіл на:</p>
        <p>обробку ТОВ «УЛФ-ФІНАНС» Персональних даних (будь-якої інформації, що стосується мене, в тому числі, однак не виключно інформації щодо прізвища, власного імені, по батькові, паспортних даних, ідентифікаційного коду, дати та місця народження, громадянства, адреси проживання та реєстрації, сімейного, соціального, майнового становища, освіти, професії, доходів, номерів контактних телефонів/факсів, адреси електронної пошти, тощо (надалі – “Персональні дані”)) Власника персональних даних з метою:</p>
        <p>1) Здійснення ТОВ «УЛФ-ФІНАНС» своєї фінансово-господарської діяльності, пропонування повного кола послуг ТОВ «УЛФ-ФІНАНС» та/або третіми особами (будь-які особи, з якими ТОВ «УЛФ-ФІНАНС» перебуває в договірних відносинах та/або члени Групи «ТАС» (надалі – «Треті особи»), у тому числі шляхом здійснення прямих контактів із Власником персональних даних за допомогою засобів зв’язку, та/або надання послуг ТОВ «УЛФ-ФІНАНС» та Третіми особами, в тому числі укладення/зміни та/або виконання будь-яких договорів, укладених із ТОВ «УЛФ-ФІНАНС» та/або Третіми особами та/або у зв’язку з ними;</p>
        <p>2) Надання Третіми особами послуг ТОВ «УЛФ-ФІНАНС» для виконання ним своїх функцій та/або для виконання укладених ТОВ «УЛФ-ФІНАНС» із Третіми особами договорів, у т.ч. про відступлення права вимоги;</p>
        <p>3) Захисту ТОВ «УЛФ-ФІНАНС» своїх законних прав та інтересів, у т.ч. передача даних фінансовим установам (ураховуючи, але не виключно, страховим та факторинговим компаніям);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p>4) здійснення ТОВ «УЛФ-ФІНАНС» прав та виконання обов’язків за іншими договірними відносинами між ТОВ «УЛФ-ФІНАНС» та Клієнтом: передачу (поширення), у т.ч. транскордонну, ТОВ «УЛФ-ФІНАНС» Персональних даних Третім особам, зміну, знищення Персональних даних або обмеження доступу до них, включення Персональних даних до бази Персональних даних ТОВ «УЛФ-ФІНАНС» з метою, зазначеною в п.п.1-4 цієї згоди/дозволу та без необхідності надання Власнику персональних даних письмового повідомлення про здійснення зазначених дій.&nbsp;&nbsp;&nbsp;</p>
        <p>Я надаю та підтверджую свою згоду ПрАТ “ВФ Україна” та ПрАТ “Київстар” на обробку інформації про надання та отримання мною телекомунікаційних послуг, з метою отримання мною послуг ТОВ «УЛФ-ФІНАНС». Мені, Власнику персональних даних, роз’яснено, що ТОВ «УЛФ-ФІНАНС» виступає надавачем фінансових послуг, що діє на підставі Розпорядження Нацкомфінпослуг № 454 від 02.03.2017р.,&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p>Зазначена Згода надається на строк, який є необхідним відповідно до мети обробки Персональних даних, передбаченої цією Згодою, однак у будь-якому випадку до моменту припинення ТОВ «УЛФ-ФІНАНС» та/або його правонаступників. Підписанням цієї Згоди Власник персональних даних підтверджує, що він письмово повідомлений про володільця персональних даних, про склад та зміст зібраних ТОВ «УЛФ-ФІНАНС» персональних даних Клієнта, про включення Персональних даних до бази персональних даних ТОВ «УЛФ-ФІНАНС», про права, передбачені Законом України «Про захист персональних даних» від 01.06.2010 року N 2297-VI, про мету збору даних та осіб, яким передаються Персональні дані, засвідчує, що склад та зміст Персональних даних є відповідним визначеній вище меті обробки Персональних даних. Застереження: Термін «обробка персональних даних» визначається чинним законодавством, та означає будь-яку дію або сукупність дій, здійснених повністю або частково в інформаційній (автоматизованій) системі та/або в картотеках персональних даних, які пов’язані зі збиранням, реєстрацією, накопиченням, зберіганням, адаптуванням, зміною, поновленням, використанням і поширенням (розповсюдженням, реалізацією, передачею), знеособленням, знищенням відомостей про фізичну особу (Клієнта), володільцем яких є ТОВ «УЛФ-ФІНАНС» та/чи Треті особи. У випадку укладання між ТОВ «УЛФ-ФІНАНС» і Клієнтом Договору фінансового лізингу (далі – Договір), Клієнт надає ТОВ «УЛФ-ФІНАНС» згоду передавати третім особам будь-яку інформацію щодо персональних та інших даних Клієнта, а також використовувати її в цілях комерційних пропозицій. При порушенні Клієнтом умов Договору чи повідомлені неправдивих відомостей ТОВ «УЛФ-ФІНАНС» має право на свій розсуд розпоряджатися вищезазначеною інформацією. Цей дозвіл знімає будь-які претензії Клієнта щодо порушення ТОВ «УЛФ-ФІНАНС» положень про нерозголошення інформації щодо Клієнта, які існують у чинному законодавстві України, як впродовж дії Договору, так і в будь-який момент після закінчення строку дії Договору. Клієнт надає ТОВ «УЛФ-ФІНАНС» свою згоду на надання інформації про Клієнта до Бюро кредитних історій, а також згоду на запит ТОВ «УЛФ-ФІНАНС» інформації про Клієнта (кредитного звіту) в будь-якому Бюро кредитних історій (в т.ч. до укладення Договору). Зазначена згода діє протягом всього строку дії Договору. Обробка персональних даних фізичних осіб, отриманих від третіх осіб здійснюється на підставі згоди клієнта/потенційного клієнта та його засвідчення про надання згоди близьких осіб, представників, спадкоємців, поручителів, майнових поручителів або третіх осіб на обробку їхніх персональних даних та до передачі таких персональних даних ТОВ «УЛФ-ФІНАНС». Обробка персональних даних фізичних осіб без згоди таких осіб здійснюється виключно відповідно до законодавства України або за умови надання цими третіми особами гарантії, що така передача здійснюється ними з дотриманням вимог законодавства України і не порушує права фізичних осіб, персональні дані яких передаються ТОВ «УЛФ-ФІНАНС».</p>
        <p>Підписанням цього документу Клієнт заявляє, гарантує та підтверджує, що:</p>
        <p>а) Клієнт діє за згодою другого з подружжя або особи, з якою проживає однією сім’єю (фактичні сімейні відносини), на укладання та виконання Договору (в тому числі, укладення договору фінансового лізингу). У випадку визнання Договору чи будь-якої його частини у судовому порядку недійсним (неукладеним) з причин відсутності згоди другого з подружжя або особи, з якою проживає Клієнт однією сім’єю (фактичні сімейні відносини), останній зобов‘язаний компенсувати ТОВ «УЛФ-ФІНАНС» всі витрати та збитки, що виникли у зв‘язку з виконанням такого судового рішення;</p>
        <p>б) Клієнт не заперечує, щоб ТОВ «УЛФ-ФІНАНС» здійснив перевірку Бюро кредитних історій інформації, що надана Клієнтом ТОВ «УЛФ-ФІНАНС», на отримання останнім інформації з Бюро кредитних історій: Приватне акціонерне товариство «Перше всеукраїнське бюро кредитних історій», яке знаходиться за адресою: вул. Марини Раскової, буд.11, м. Київ, 02660; Товариство з обмеженою відповідальністю «УКРАЇНСЬКЕ БЮРО КРЕДИТНИХ ІСТОРІЙ», яке знаходиться за адресою: вул. Грушевського, 1-д, м. Київ, 01001, про Клієнта, а також на отримання інформації про Клієнта, з усіх дозволених законом джерел;</p>
        <p>в) Клієнт не заперечує, щоб ТОВ «УЛФ-ФІНАНС» перевірив надану Клієнтом інформацію та надає згоду на:&nbsp;&nbsp;</p>
        <p>– збір, зберігання, використання, поширення та передачу у повному обсязі інформації, що надана Клієнтом ТОВ «УЛФ-ФІНАНС», в тому числі зазначена в Договорі, до Бюро кредитних історій, назва і адреса якого/яких зазначена в Тарифах ТОВ «УЛФ-ФІНАНС» і доведена Клієнту ТОВ «УЛФ-ФІНАНС» (надалі – «Бюро»), з метою формування та ведення кредитної історії Клієнта як суб’єкта кредитної історії;</p>
        <p>– перевірку Бюро інформації, що надана Клієнтом ТОВ «УЛФ-ФІНАНС», на отримання ТОВ «УЛФ-ФІНАНС» з Бюро кредитної історії Клієнта, а також на отримання від Бюро додаткової інформації про Клієнта, з усіх дозволених законом джерел. Я, власник персональних даних, підтверджую, що перед укладенням Договору ТОВ «УЛФ-ФІНАНС» повідомив мене у письмовій формі про особу та місцезнаходження ТОВ «УЛФ-ФІНАНС»; умови (мету отримання послуги фінансового лізингу; форми забезпечення; наявні в ТОВ «УЛФ-ФІНАНС» умови надання послуг з коротким описом відмінностей між ними, в тому числі між зобов’язаннями Клієнта; тип відсоткової ставки; вартість послуги (перелік витрат, пов’язаних з одержанням послуги, його обслуговуванням та поверненням, зокрема таких, як комісії, витрати на страхування, юридичне оформлення, консультаційні витрати, тощо); строк, на який послуга фінансового лізингу може бути одержана; включаючи кількість платежів, їх частоту та обсяги; можливість дострокового розірвання договору та умови; відомості про те, від кого Клієнт може одержати докладнішу інформацію.</p>
        EOT;


        $text_ru = <<<EOT
        <h4><strong>СОГЛАСИЕ-РАЗРЕШЕНИЕ НА ОБРАБОТКУ ПЕРСОНАЛЬНЫХ ДАННЫХ&nbsp;</strong></h4>
        <p>Подписанием этого согласия Я, владелец персональных данных (далее – Клиент), предоставляю свое согласие/разрешение на:</p>
        <p>обработку ООО «УЛФ-ФИНАНС» Персональных данных (любой информации, касающейся меня, в том числе, однако не исключительно информации по фамилии, собственному имени, отчеству, паспортным данным, идентификационному коду, дате и месту рождения, гражданству, адресу проживания и регистрации, семейного, социального, имущественного положения, образования, профессии, доходов, номеров контактных телефонов/факсов, адреса электронной почты и т.д. (далее – “Персональные данные”)) Владельца персональных данных с целью:</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>1) Осуществление ООО «УЛФ-ФИНАНС» своей финансово-хозяйственной деятельности, предложение полного круга услуг ООО «УЛФ-ФИНАНС» и/или третьими лицами (любые лица, с которыми ООО «УЛФ-ФИНАНС» находится в договорных отношениях и/ или члены Группы «ТАС» (далее – «Третие лица»), в том числе путем осуществления прямых контактов с Владельцем персональных данных посредством средств связи, и/или предоставления услуг ООО «УЛФ-ФИНАНС» и Третьими лицами, в том числе числе заключения/изменения и/или исполнения любых договоров, заключенных с ООО «УЛФ-ФИНАНС» и/или Третьими лицами и/или в связи с ними;</p>
        <p>2) Предоставление Третьими лицами услуг ООО «УЛФ-ФИНАНС» для выполнения им своих функций и/или для выполнения заключенных ООО «УЛФ-ФИНАНС» с Третьими лицами договоров, в т.ч. об уступке права требования;</p>
        <p>3) Защиты ООО «УЛФ-ФИНАНС» своих законных прав и интересов, в т.ч. передача данных финансовым учреждениям (учитывая, но не исключительно страховым и факторинговым компаниям);&nbsp;&nbsp;</p>
        <p>4) осуществление ООО «УЛФ-ФИНАНС» прав и исполнение обязанностей по другим договорным отношениям между ООО «УЛФ-ФИНАНС» и Клиентом: передачу (распространение), в т.ч. трансграничную, ООО «УЛФ-ФИНАНС» Персональных данных Третьим лицам, изменение, уничтожение Персональных данных или ограничение доступа к ним, включение Персональных данных в базу Персональных данных ООО «УЛФ-ФИНАНС» с целью, указанной в п.п.1-4 настоящей согласия/разрешения и без необходимости предоставления Владельцу персональных данных письменного уведомления об осуществлении указанных действий.&nbsp;</p>
        <p>Я предоставляю и подтверждаю свое согласие ЧАО «ВФ Украина» и ЧАО «Киевстар» на обработку информации о предоставлении и получении мной телекоммуникационных услуг с целью получения мной услуг ООО «УЛФ-ФИНАНС». Мне, владельцу персональных данных, разъяснено, что ООО «УЛФ-ФИНАНС» выступает поставщиком финансовых услуг, действующим на основании Распоряжения Нацкомфинуслуг № 454 от 02.03.2017г.,</p>
        <p>Указанное Соглашение предоставляется на срок, необходимый в соответствии с целью обработки Персональных данных, предусмотренной настоящим Соглашением, однако в любом случае до момента прекращения ООО «УЛФ-ФИНАНС» и/или его правопреемников. Подписанием настоящего Соглашения Владелец персональных данных подтверждает, что он письменно уведомлен о владельце персональных данных, о составе и содержании собранных ООО «УЛФ-ФИНАНС» персональных данных Клиента, о включении Персональных данных в базу персональных данных ООО «УЛФ-ФИНАНС», о правах, предусмотренные Законом Украины «О защите персональных данных» от 01.06.2010 N 2297-VI, о цели сбора данных и лиц, которым передаются Персональные данные, свидетельствует, что состав и содержание Персональных данных является соответствующим определенной цели обработки Персональных данных. Предостережение: Термин «обработка персональных данных» определяется действующим законодательством, и означает любое действие или совокупность действий, совершенных полностью или частично в информационной (автоматизированной) системе и/или в картотеках персональных данных, связанных с сбором, регистрацией, накоплением , хранением, адаптированием, изменением, обновлением, использованием и распространением (распространением, реализацией, передачей), обезличиванием, уничтожением сведений о физическом лице (Клиента), владельцем которых является ООО «УЛФ-ФИНАНС» и/или Третьи лица. В случае заключения между ООО «УЛФ-ФИНАНС» и Клиентом Договора финансового лизинга (далее – Договор), Клиент дает ООО «УЛФ-ФИНАНС» согласие передавать третьим лицам любую информацию о персональных и других данных Клиента, а также использовать ее в целях коммерческих предложений. При нарушении Клиентом условий Договора или извещении ложных сведений ООО «УЛФ-ФИНАНС» имеет право по своему усмотрению распоряжаться вышеупомянутой информацией. Это разрешение снимает любые претензии Клиента к нарушению ООО «УЛФ-ФИНАНС» положений о неразглашении информации о Клиенте, существующих в действующем законодательстве Украины, как в течение действия Договора, так и в любой момент после окончания срока действия Договора. Клиент предоставляет ООО «УЛФ-ФИНАНС» свое согласие на предоставление информации о Клиенте в Бюро кредитных историй, а также согласие по запросу ООО «УЛФ-ФИНАНС» информации о Клиенте (кредитном отчете) в любом Бюро кредитных историй (в т.ч. .до заключения Договора). Указанное согласие действует в течение всего срока действия Договора. Обработка персональных данных физических лиц, полученных от третьих лиц, осуществляется на основании согласия клиента/потенциального клиента и его свидетельства о предоставлении согласия близких лиц, представителей, наследников, поручителей, имущественных поручителей или третьих лиц на обработку их персональных данных и до передачи таких персональных данных. «УЛФ-ФИНАНС». Обработка персональных данных физических лиц без согласия таких лиц осуществляется исключительно в соответствии с законодательством Украины или при предоставлении этими третьими лицами гарантии, что такая передача осуществляется ими с соблюдением требований законодательства Украины и не нарушает права физических лиц, персональные данные которых передаются ООО «УЛФ-ФИНАНС».</p>
        <p>Подписанием этого документа Клиент заявляет, гарантирует и подтверждает, что:</p>
        <p>а) Клиент действует с согласия второго супруга или лица, с которым проживает одной семьей (фактические семейные отношения), на заключение и исполнение Договора (в том числе, заключение договора финансового лизинга). В случае признания Договора или какой-либо его части в судебном порядке недействительным (незаключенным) по причине отсутствия согласия второго супруга или лица, с которым проживает Клиент одной семьей (фактические семейные отношения), последний обязан компенсировать ООО «УЛФ- ФИНАНС» все расходы и убытки, возникшие в связи с исполнением такого судебного решения;</p>
        <p>б) Клиент не возражает, чтобы ООО «УЛФ-ФИНАНС» осуществило проверку Бюро кредитных историй информации, предоставленной Клиентом ООО «УЛФ-ФИНАНС», на получение последней информации из Бюро кредитных историй: Частное акционерное общество «Первое всеукраинское бюро кредитных историй», которое находится по адресу ул. Марины Расковой, д.11, г. Киев, 02660; Общество с ограниченной ответственностью «УКРАИНСКОЕ БЮРО КРЕДИТНЫХ ИСТОРИЙ», расположенное по адресу: ул. Грушевского, 1-д, г. Киев, 01001, о Клиенте, а также на получение информации о Клиенте, из всех разрешенных законом источников;</p>
        <p>в) Клиент не возражает, чтобы ООО «УЛФ-ФИНАНС» проверил предоставленную Клиентом информацию и дает согласие на:</p>
        <p>– сбор, хранение, использование, распространение и передачу в полном объеме информации, предоставленной Клиентом ООО «УЛФ-ФИНАНС», в том числе указанного в Договоре, в Бюро кредитных историй, название и адрес которого указано в Тарифах ООО «УЛФ- ФИНАНС» и доказана Клиенту ООО «УЛФ-ФИНАНС» (далее – «Бюро»), с целью формирования и ведения кредитной истории Клиента как субъекта кредитной истории;</p>
        <p>– проверку Бюро информации, предоставленной Клиентом ООО «УЛФ-ФИНАНС», на получение ООО «УЛФ-ФИНАНС» из Бюро кредитной истории Клиента, а также на получение от Бюро дополнительной информации о Клиенте из всех разрешенных законом источников. Я, владелец персональных данных, подтверждаю, что перед заключением Договора ООО «УЛФ-ФИНАНС» уведомил меня в письменной форме о личности и местонахождении ООО «УЛФ-ФИНАНС»; условия (цель получения услуги финансового лизинга; формы обеспечения; имеющиеся в ООО «УЛФ-ФИНАНС» условия предоставления услуг с кратким описанием различий между ними, в том числе между обязательствами Клиента; тип процентной ставки; стоимость услуги (перечень расходов, связанных с получением услуги, его обслуживанием и возвратом, в частности таких, как комиссии, расходы на страхование, юридическое оформление, консультационные расходы и т.п.) срок, на который услуга финансового лизинга может быть получена, включая количество платежей, их частоту и объемы; досрочное расторжение договора и условия, сведения о том, от кого Клиент может получить более подробную информацию.</p>
        EOT;


        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Політика конфіденційності',
            'h1' => 'Політика конфіденційності',
            'text' => $text_uk,
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Политика Конфиденциальности',
            'h1' => 'Политика Конфиденциальности',
            'text' => $text_ru,
            'locale' => 'ru',
        ]);
    }
}
