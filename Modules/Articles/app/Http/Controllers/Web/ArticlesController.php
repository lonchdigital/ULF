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
   const PER_PAGE = 9;

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
            'page' => $page,
            'articles' => $this->service->getLatestArticles(self::PER_PAGE)
            // 'page' => $page,
            // 'documents' => $documents,
//            'variations' => ProfessionogramVariety::all(),
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

}
