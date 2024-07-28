<?php

namespace Modules\Clients\Services\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Articles\Models\Article;
use Modules\Articles\Models\ArticlePage;
use Modules\Clients\Models\Client;

final class ClientCreateService extends ClientBaseService
{
    public function make(array $data): Client|null
    {
        $client = null;

        DB::transaction(function () use ($data, &$client) {
            $client = $this->createClient($data);
        });

        return $client;
    }

    private function createClient(array $data): Client
    {
        $dataToUpdate = [];


        if(isset($data['preview_image'])) {
            $imagePath = self::CLIENT_MEDIA_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);
            storeImage($imagePath, $data['preview_image'], 'webp');
            storeImage($imagePath, $data['preview_image'], 'jpg');
            $dataToUpdate['image_path'] = $imagePath . '.webp';
        }

        if(isset($data['video'])) {
            $imagePath = self::CLIENT_MEDIA_FOLDER;
            $filename = sha1(time()) . '_' . Str::random(10) . '.' . $data['video']->getClientOriginalExtension();
            if(storeVideo($imagePath, $data['video'], $filename)) {
                $dataToUpdate['video'] = $imagePath .'/'. $filename;
            }
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

        return Client::create($dataToUpdate);
    }

}
