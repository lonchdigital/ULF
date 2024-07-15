<?php

namespace Modules\Cars\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cars\Models\Car;
use Modules\Cars\Services\Admin\CarsService;


class CarsController extends Controller
{
    /**
    * @var CarsService
     */
   private CarsService $service;
   private const PER_PAGE = 10;

    public function __construct(CarsService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Page $page)
    {
        return view('cars::admin.index', [
            // 'articles' => $this->service->getLatestArticles(self::PER_PAGE)
        ]);
    }


}
