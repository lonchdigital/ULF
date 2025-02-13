<?php

namespace Modules\Cars\Http\Controllers\Web;

use App\Models\CarDriveBlock;
use App\Models\Page;
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
        $url['ua'] = url('/') . '/catalog';
        $url['ru'] = url('/') . '/ru/catalog';

        return view('cars::web.index', [
            // 'page' => CarPage::where('slug', 'cars')->first(),
            'page' => Page::where('slug', 'catalog')->first(),
            'filters' => $this->commonService->getAllFiltersForCatalogPage(),
            'url' => $url
        ]);
    }

    public function show(string $slug)
    {
        $carPage = CarPage::where('slug', $slug)->firstOrFail();

        $url['ua'] = url('/') . '/product/' . $carPage->slug;
        $url['ru'] = url('/') . '/ru/product/' . $carPage->slug;

        return view('cars::web.show', [
            'page' => $carPage,
            'car' => $carPage->car,
            'subscribeMonthSettings' => $this->commonService->getAllSubscribeSettings(),
            'subscribeBenefits' => $this->commonService->getAllSubscribeBenefits(),
            'carDriveBlock' => CarDriveBlock::first(),
            'commonFaqs' => $this->commonService->getAllCommonFaqs(),
            'commonCarSettings' => $this->commonService->getAllCommonCarSettings(),
            'url' => $url,
            'fleetCars' => $this->commonService->getFleetCars($carPage->car->id),
        ]);
    }

    public function filter(Request $request): array
    {
        $filters = $request->input('filters', []);
        $filters = $this->service->prepareFilterData($filters);

        $request->merge(['filters' => $filters]); // update request
        $request->validate([
            'filters.manufacturer' => 'nullable|integer',
            'filters.model' => 'nullable|integer',
            'filters.priceMin' => 'nullable|numeric|min:0',
            'filters.priceMax' => 'nullable|numeric|min:0|gte:filters.priceMin',
            'filters.yearFrom' => 'nullable|integer|min:1900|max:' . date('Y'),
            'filters.yearTo' => 'nullable|integer|min:1900|max:' . date('Y') . '|gte:filters.yearFrom',
            'filters.engineFrom' => 'nullable|numeric|min:0',
            'filters.engineTo' => 'nullable|numeric|min:0|gte:filters.engineFrom',
            'filters.fuelType' => 'nullable|integer',
            'filters.bodyTypes' => 'nullable|array',
            'filters.bodyTypes.*' => 'integer',
            'filters.driverTypes' => 'nullable|array',
            'filters.driverTypes.*' => 'integer',
            'filters.orderValue' => 'nullable|string|in:price_up,price_down,popularity_up,popularity_down',
            'pageNumber' => 'nullable|integer|min:1',
        ]);

        return $this->service->getFilteredPosts($request);
    }
}
