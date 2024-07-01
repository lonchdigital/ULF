<?php

namespace Modules\Cars\Http\Controllers\Web;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cars\Services\Web\WebService;


class CarsController extends Controller
{

    private WebService $service;

    public function __construct(WebService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Page $page)
    {
        dd('index Car !!! ' . $this->service->test());
    }

    public function show(Request $request, Page $page)
    {
        dd('show Car !!!');
    }
}
