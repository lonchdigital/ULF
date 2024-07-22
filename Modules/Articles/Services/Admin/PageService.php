<?php

namespace Modules\Articles\Services\Admin;

use Carbon\Carbon;
use App\Models\Page;
use Illuminate\Support\Str;
use Modules\Articles\app\Http\Controllers\Web\ArticlesController;
use Modules\Articles\Models\Article;
use Modules\Articles\Models\ArticlePage;

class PageService
{
    public function create(array $data): ArticlePage
    {
        $dataToUpdate = [];

        $dataToUpdate['section'] = config('articles.section');
        $dataToUpdate['slug'] = $data['slug'];
        $dataToUpdate['action'] = config('articles.new_document_action');
        $dataToUpdate['controller'] = ArticlesController::class;

        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
            $dataToUpdate[$lang]['h1'] = $value;
        }
        foreach ($data['meta_title'] as $lang => $value) {
            $dataToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($data['meta_description'] as $lang => $value) {
            $dataToUpdate[$lang]['meta_description'] = $value;
        }

        return ArticlePage::create($dataToUpdate);
    }

    public function update(ArticlePage $page, array $data)
    {
        $dataToUpdate = [];

        $dataToUpdate['slug'] = $data['slug'];

        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
            $dataToUpdate[$lang]['h1'] = $value;
        }
        foreach ($data['meta_title'] as $lang => $value) {
            $dataToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($data['meta_description'] as $lang => $value) {
            $dataToUpdate[$lang]['meta_description'] = $value;
        }

        $page->update($dataToUpdate);
    }

}
