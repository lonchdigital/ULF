<?php

namespace Modules\Clients\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Clients\Services\Admin\ClientsService;

class ClientsController extends Controller
{
    /**
    * @var ClientsService
     */
   private ClientsService $service;
   private const PER_PAGE = 10;

    /**
     * ProfessionogramsController constructor.
    * @param ClientsService $service
     */
    public function __construct(ClientsService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients::admin.index', [
            // 'clients' => $this->service->getLatestClients(self::PER_PAGE)
            'clients' => []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('clients::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
