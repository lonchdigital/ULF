<?php

namespace Modules\Articles\app\Http\Controllers\Web;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Articles\Models\ArticlePage;
use Modules\Articles\Services\Web\WebService;

class ArticlesController extends Controller
{
    /**
    * @var WebService
     */
   private WebService $service;

    /**
     * ProfessionogramsController constructor.
    * @param WebService $service
     */
    public function __construct(WebService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, ArticlePage $page)
    {
        return view('articles::web.index', [
            'page' => ArticlePage::where('slug', 'articles')->first(),
        ]);
    }

    public function show(string $slug)
    {
        $articlePage = ArticlePage::where('slug', $slug)->firstOrFail();

        return view('articles::web.show', [
            'page' => $articlePage,
            'article' => $articlePage->article
        ]);
    }


    public function filter(Request $request): array
    {
        $request->validate([]);

        return $this->service->getFilteredPosts($request);
    }

}
