<?php

namespace Modules\Clients\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Modules\Clients\Services\Web\WebService;

class ClientsController extends Controller
{
    /**
    * @var WebService
     */
   private WebService $service;
   private const PER_PAGE = 10;

    /**
     * ProfessionogramsController constructor.
    * @param WebService $service
     */
    public function __construct(WebService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url['ua'] = url('/') . '/customer-stories';
        $url['ru'] = url('/') . '/ru/customer-stories';

        return view('clients::web.index', [
            'clients' => $this->service->getAllClientHistories(),
            'page' => Page::where('key', 'customer-stories')->first(),
            'url' => $url,
        ]);
    }

}
