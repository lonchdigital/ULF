<?php

namespace Modules\Cars\Http\Controllers\Web;

use App\Models\CarDriveBlock;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cars\Models\CarPage;
use Modules\Cars\Services\Web\WebService;
use App\Services\Admin\CarCommonSettings\CarCommonService;


class CarsController extends Controller
{
    private WebService $service;
    private CarCommonService $commonService;

    public function __construct(
        WebService $service,
        CarCommonService $commonService
    )
    {
        $this->service = $service;
        $this->commonService = $commonService;
    }

    public function index(Request $request, CarPage $page)
    {
        return view('cars::web.index', [
            'page' => CarPage::where('slug', 'cars')->first()
        ]);
    }

    public function show(string $slug)
    {
        $carPage = CarPage::where('slug', $slug)->firstOrFail();

        return view('cars::web.show', [
            'page' => $carPage,
            'car' => $carPage->car,
            'subscribeMonthSettings' => $this->commonService->getAllSubscribeSettings(),
            'subscribeBenefits' => $this->commonService->getAllSubscribeBenefits(),
            'carDriveBlock' => CarDriveBlock::first(),
            'commonFaqs' => $this->commonService->getAllCommonFaqs()
        ]);
    }

    public function filter(Request $request): array
    {
        $request->validate([]);

        return $this->service->getFilteredPosts($request);
    }
}
