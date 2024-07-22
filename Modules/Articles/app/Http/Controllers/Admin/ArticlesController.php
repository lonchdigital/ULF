<?php

namespace Modules\Articles\app\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Articles\app\Http\Requests\Admin\ArticleCreateRequest;
use Modules\Articles\app\Http\Requests\Admin\ArticleUpdateRequest;
use Modules\Articles\Models\Article;
use Modules\Articles\Services\Admin\ArticlesService;


class ArticlesController extends Controller
{
    /**
    * @var ArticlesService
     */
   private ArticlesService $service;
   private const PER_PAGE = 10;

    /**
     * ProfessionogramsController constructor.
    * @param ArticlesService $service
     */
    public function __construct(ArticlesService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Page $page)
    {
        return view('articles::admin.index', [
            'articles' => $this->service->getLatestArticles(self::PER_PAGE)
        ]);
    }

    public function create()
    {
        return view('articles::admin.create', []);
    }

    public function store(ArticleCreateRequest $request)
    {
        return redirect()->route('article.edit', [
            'article' => $this->service->createDocument($request->all())
        ])->with('success', trans('admin.document_saved'));
    }

    public function edit(Article $article)
    {
        return view('articles::admin.edit', [
            'article' => $article->load('page')
        ]);
    }

    public function update(Article $article, ArticleUpdateRequest $request)
    {
        return redirect()->route('article.edit', [
            'article' => $this->service->updateDocument($article, $request->all())
        ])->with('success', trans('admin.document_updated'));
    }

    public function destroy(Article $article)
    {
        $this->service->removeDocument($article);

        return redirect()->route('article.index', [
            'articles' => $this->service->getLatestArticles(self::PER_PAGE)
        ])->with('success', trans('admin.document_deleted'));
    }

}
