<?php

namespace Modules\Articles\Services\Admin;

use Modules\Articles\Entities\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

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
