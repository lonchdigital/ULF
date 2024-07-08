<?php

namespace Modules\Articles\Services\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Articles\Models\Article;

final class ArticleCreateService extends ArticleBaseService
{
    public function make(array $data): Article|null
    {
        $article = null;

        DB::transaction(function () use ($data, &$article) {
            $article = $this->createArticle($data);
            $this->pageService->create($article, $data);
        });

        return $article;
    }

    private function createArticle(array $data): Article
    {
        $dataToUpdate = [];

        $imagePath = self::ARTICLE_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);
        $this->storeImage($imagePath, $data['preview_image'], 'webp');
        $this->storeImage($imagePath, $data['preview_image'], 'jpg');

        $dataToUpdate['image_path'] = $imagePath . '.webp';

        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
        }
        foreach ($data['description'] as $lang => $value) {
            $dataToUpdate[$lang]['description'] = $value;
        }
        foreach ($data['text'] as $lang => $value) {
            $dataToUpdate[$lang]['text'] = $value;
        }

        return Article::create($dataToUpdate);
    }

}
