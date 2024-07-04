<?php

namespace Modules\Articles\Services\Admin;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\Articles\Entities\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

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
