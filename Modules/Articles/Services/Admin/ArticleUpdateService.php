<?php

namespace Modules\Articles\Services\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Articles\Models\Article;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

final class ArticleUpdateService extends ArticleBaseService
{
    public function make(Article $article, array $data)
    {
        DB::transaction(function () use (&$article, $data) {
            $this->updateArticle($article, $data);
            $this->pageService->update($article->page, $data);
        });

        return $article;
    }

    private function updateArticle(Article $article, array $data): bool
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
