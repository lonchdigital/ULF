<?php

namespace Modules\Clients\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Clients\Models\Client;
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
             'clients' => $this->service->getLatestClients(self::PER_PAGE)
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
        $request->validate([
            'video' => 'nullable|mimes:mp4',
        ]);

        return redirect()->route('client.edit', [
            'client' => $this->service->createDocument($request->all())
        ])->with('success', trans('admin.document_saved'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client, Request $request)
    {
        return view('clients::admin.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Client $client, Request $request): RedirectResponse
    {
        $request->validate([
            'video' => 'nullable|mimes:mp4',
        ]);

        return redirect()->route('client.edit', [
            'client' => $this->service->updateDocument($client, $request->all())
        ])->with('success', trans('admin.document_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $this->service->removeDocument($client);

        return redirect()->route('client.index', [
            'clients' => $this->service->getLatestClients(self::PER_PAGE)
        ])->with('success', trans('admin.document_deleted'));
    }
}
