<?php

namespace Modules\Articles\Http\Controllers\Web;


use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Articles\Services\Web\WebService;
//use Modules\Articles\Entities\ProfessionogramVariety;


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

    public function index(Request $request, Page $page)
    {
        return view('articles::web.index', [
            'page' => $page,
            'articles' => $this->service->getLatestArticles(self::PER_PAGE)
            // 'page' => $page,
            // 'documents' => $documents,
//            'variations' => ProfessionogramVariety::all(),
        ]);
    }

    public function show(Request $request, Page $page)
    {
        return view('articles::web.show', [
            'page' => $page,
            'article' => $page->articles->first()
        ]);
    }

}
