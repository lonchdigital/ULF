<?php


namespace App\Http\Controllers\Web;


use App\Models\HomeBenefitBlock;
use App\Models\HomeDriveBlock;
use App\Models\HomeMainBlock;
use App\Models\Page;
use App\Services\Web\HomePage\HomePageService;
use Illuminate\Http\Request;

class HomeController
{

    /**
//     * @var HomePageService
     */
    private HomePageService $service;

    /**
     * HomeController constructor.
     * @param HomePageService $service
     */
    public function __construct(HomePageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('web.home.show', [
            'homeMainBlock' => HomeMainBlock::first(),
            'homeBenefitBlock' => HomeBenefitBlock::all(),
            'homeDriveBlock' => HomeDriveBlock::first()
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

        $page = Page::where('action', 'faq')->firstOrFail();

        return view('web.pages.faq', compact('page', 'utmParameters'));
    }

    public function contacts()
    {
        return view('web.pages.contacts');
    }
}
