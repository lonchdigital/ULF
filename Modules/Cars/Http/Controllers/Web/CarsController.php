<?php

namespace Modules\Cars\Http\Controllers\Web;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CarsController extends Controller
{

    public function index(Request $request, Page $page)
    {
        dd('index Car !!!');
    }

    public function show(Request $request, Page $page)
    {
        dd('show Car !!!');
    }
}
