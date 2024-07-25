<?php

namespace Modules\Clients\Services\Admin;

use Modules\Clients\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClientsService extends ClientBaseService
{
    /**
     * @var ClientCreateService
     */
    private ClientCreateService $createService;
    /**
     * @var ClientUpdateService
     */
    private ClientUpdateService $updateService;

    public function __construct(ClientCreateService $createService, ClientUpdateService $updateService)
    {
        $this->createService = $createService;
        $this->updateService = $updateService;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getLatestClients($perPage = 10): LengthAwarePaginator
    {
        $query = Client::query()->latest();
        return $query->paginate($perPage);
    }

    /**
     * @param array $data
     * @return Client
     */
    public function createDocument(array $data): Client
    {
        return $this->createService->make($data);
    }

    /**
     * @param Client $client
     * @param array $data
     */
    public function updateDocument(Client $client, array $data): Client
    {
        return $this->updateService->make($client, $data);
    }

    /**
     * @param Client $document
     */
    public function removeDocument(Client $client): void
    {
        deleteImage($client->image_path);
        deleteVideo($client->video);

        $client->deleteTranslations();
        $client->delete();
    }
}
