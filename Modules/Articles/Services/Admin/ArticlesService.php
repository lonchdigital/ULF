<?php

namespace Modules\Articles\Services\Admin;

use Modules\Articles\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
}
