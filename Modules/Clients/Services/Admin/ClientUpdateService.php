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
            $this->updateArticle($client, $data);
        });

        return $client;
    }

    private function updateArticle(Client $client, array $data): bool
    {
        $dataToUpdate = [];

        if (isset($data['preview_image'])) {
            $imagePath = self::ARTICLE_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);

            $this->storeImage($imagePath, $data['preview_image'], 'webp');
            $this->storeImage($imagePath, $data['preview_image'], 'jpg');

            $dataToUpdate['image_path'] = $imagePath . '.webp';
            $this->deleteImage($article->image_path);
        }

        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
        }
        foreach ($data['description'] as $lang => $value) {
            $dataToUpdate[$lang]['description'] = $value;
        }
        foreach ($data['text'] as $lang => $value) {
            $dataToUpdate[$lang]['text'] = $value;
        }

        return $article->update($dataToUpdate);
    }

}
