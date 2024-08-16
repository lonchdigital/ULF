<?php

namespace Modules\Clients\Services\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Clients\Models\Client;

final class ClientUpdateService extends ClientBaseService
{
    public function make(Client $client, array $data)
    {
        DB::transaction(function () use (&$client, $data) {
            $this->updateClient($client, $data);
        });

        return $client;
    }

    private function updateClient(Client $client, array $data): bool
    {
        $dataToUpdate = [];

        $dataToUpdate['youtube'] = $data['youtube'];

        if (isset($data['preview_image'])) {
            $imagePath = self::CLIENT_MEDIA_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);

            storeImage($imagePath, $data['preview_image'], 'webp');
            storeImage($imagePath, $data['preview_image'], 'jpg');

            $dataToUpdate['image_path'] = $imagePath . '.webp';
            deleteImage($client->image_path);
        }

        if(isset($data['video'])) {
            $imagePath = self::CLIENT_MEDIA_FOLDER;
            $filename = sha1(time()) . '_' . Str::random(10) . '.' . $data['video']->getClientOriginalExtension();
            if(storeVideo($imagePath, $data['video'], $filename)) {
                $dataToUpdate['video'] = $imagePath .'/'. $filename;
            }
            deleteVideo($client->video);
        }

        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
        }
        foreach ($data['history_title'] as $lang => $value) {
            $dataToUpdate[$lang]['history_title'] = $value;
        }
        foreach ($data['description'] as $lang => $value) {
            $dataToUpdate[$lang]['description'] = $value;
        }

        return $client->update($dataToUpdate);
    }

}
