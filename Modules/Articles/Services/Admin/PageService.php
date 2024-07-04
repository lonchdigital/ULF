<?php


namespace Modules\Articles\Services\Admin;


use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Modules\Articles\Entities\Article;
use Modules\Articles\Http\Controllers\Web\ArticlesController;

class PageService
{
    public function create(Article $article, array $data): void
    {
        $dataToUpdate = [];

        $dataToUpdate['pageable_id'] = $article->id;
        $dataToUpdate['section'] = config('articles.section');
        $dataToUpdate['slug'] = $data['slug'];
        $dataToUpdate['pageable_type'] = Article::class;
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

        $page = Page::create($dataToUpdate);
        $page->articles()->attach($article->id);
    }

    public function update(Page $page, array $data)
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
