<?php


namespace Modules\Articles\Services\Web;

use Modules\Articles\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WebService
{
    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getLatestArticles($perPage = 10): LengthAwarePaginator
    {
        $query = Article::query()->with('page')->latest();
        return $query->paginate($perPage);
    }
    
}
