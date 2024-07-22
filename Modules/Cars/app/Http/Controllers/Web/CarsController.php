<?php

namespace Modules\Cars\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cars\Models\CarPage;
use Modules\Cars\Services\Web\WebService;


class CarsController extends Controller
{

    private WebService $service;

    public function __construct(WebService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, CarPage $page)
    {
        return view('cars::web.index', [
            'cars' => $this->service->getCarsCatalog(10)
        ]);
    }

    public function show(string $slug)
    {
        $carPage = CarPage::where('slug', $slug)->firstOrFail();

        return view('cars::web.show', [
            'page' => $carPage,
            'car' => $carPage->car
        ]);
    }
}
