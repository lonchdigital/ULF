<?php


namespace Modules\Articles\Services\Web;

use Modules\Articles\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class WebService
{

    const PER_PAGE = 10;

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getLatestArticles($perPage = 10): LengthAwarePaginator
    {
        $query = Article::query()->with('page')->latest();
        return $query->paginate($perPage);
    }

    public function getFilteredPosts(Request $request): array
    {
        $query = Article::query()->with('page')->latest();

        // pagination
        $requestPage = $request['pageNumber'] !== null ? (int) $request['pageNumber'] : 1;
        $currentPage = $request->input('page', $requestPage); // Current page

        $postTypeDocuments = $query->paginate(self::PER_PAGE, ['*'], 'page', $currentPage)->onEachSide(0);
        $postTypeItems = $postTypeDocuments->items();

        $results = new LengthAwarePaginator($postTypeDocuments->items(), $postTypeDocuments->total(), self::PER_PAGE, $currentPage);
        $results->onEachSide(0);
        $results->setPath($request->fullUrl());
        $paginationHtml = $results->onEachSide(3)->links('vendor.pagination.default')->toHtml();

        $postTypeDocuments = $this->getDocumentsAdditional($postTypeItems);


        return [
            'paginationHTML' => $paginationHtml,
            'documents' => $postTypeDocuments,
        ];
    }

    private function getDocumentsAdditional($articles)
    {
        foreach ($articles as $article) {
            $article['article_additional'] = [
                'article_name' => $article->name ?? '',
                'article_url' => route('blog.single.page', ['slug' => $article->page->slug])
            ];
        }

        return $articles;
    }

}
