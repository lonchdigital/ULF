<?php

namespace Modules\Articles\Services\Admin;

use Modules\Articles\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Articles\Models\ArticlePage;

class ArticlesService extends ArticleBaseService
{
    /**
     * @var ArticleCreateService
     */
    private ArticleCreateService $createService;
    /**
     * @var ArticleUpdateService
     */
    private ArticleUpdateService $updateService;

    public function __construct(ArticleCreateService $createService, ArticleUpdateService $updateService)
    {
        $this->createService = $createService;
        $this->updateService = $updateService;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getLatestArticles($perPage = 10): LengthAwarePaginator
    {
        $query = Article::query()->latest();
        return $query->paginate($perPage);
    }

    /**
     * @param array $data
     * @return Article
     */
    public function createDocument(array $data): Article
    {
        return $this->createService->make($data);
    }

    /**
     * @param Article $article
     * @param array $data
     */
    public function updateDocument(Article $article, array $data): Article
    {
        return $this->updateService->make($article, $data);
    }

    /**
     * @param Article $document
     */
    public function removeDocument(Article $article): void
    {
        $page = $article->page;

        $this->deleteImage($article->image_path);

        $page->deleteTranslations();
        $page->delete();

        $article->deleteTranslations();
        $article->delete();
    }

    public function updateArticleIndex(ArticlePage $page, array $request): ArticlePage
    {
        $dataPageToUpdate = [];
        foreach ($request['seo_data'] as $lang => $value) {
            $dataPageToUpdate[$lang]['seo_text'] = $value;
        }
        foreach ($request['meta_title'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($request['meta_description'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_description'] = $value;
        }
        foreach ($request['meta_keywords'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_keywords'] = $value;
        }
        $page->update($dataPageToUpdate);

        return $page;
    }
}
