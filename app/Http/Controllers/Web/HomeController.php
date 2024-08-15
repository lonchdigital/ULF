<?php


namespace App\Http\Controllers\Web;


use App\Models\HomeBenefitBlock;
use App\Models\HomeDriveBlock;
use App\Models\HomeMainBlock;
use App\Models\Page;
//use App\Services\Web\HomePage\HomePageService;
use Illuminate\Http\Request;
use Modules\Cars\Models\Car;
use Modules\Clients\Services\Web\WebService as ClientHistoriesService;

class HomeController
{

    /**
//     * @var HomePageService
     */
//    private HomePageService $service;
    private ClientHistoriesService $clientService;

    public function __construct(
//        HomePageService $service,
        ClientHistoriesService $clientService,
    )
    {
//        $this->service = $service;
        $this->clientService = $clientService;
    }

    public function index()
    {
        return view('web.home.show', [
            'page' => Page::where('key', 'homepage')->first(),
            'homeMainBlock' => HomeMainBlock::first(),
            'homeBenefitBlock' => HomeBenefitBlock::all(),
            'homeDriveBlock' => HomeDriveBlock::first(),
            'clients' => $this->clientService->getAllClientHistories(),
            'cars' => Car::latest()->limit(5)->get()
        ]);
    }

    public function faq(Request $request)
    {
        $utmParameters = $request->only([
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content'
        ]);

        $page = Page::where('key', 'faq')->firstOrFail();

        return view('web.pages.faq', compact('page', 'utmParameters'));
    }

    public function contacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('web.pages.contacts', compact('page'));
    }

    public function thanks()
    {
        return view('web.pages.thanks');
    }
}
