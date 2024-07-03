<?php

namespace Modules\Articles\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Modules\Articles\Http\Requests\Admin\ArticleCreateRequest;
use Illuminate\Routing\Controller;
use Modules\Articles\Entities\Article;
use Modules\Articles\Services\Admin\ArticlesService;


class ArticlesController extends Controller
{
    /**
    * @var ArticlesService
     */
   private ArticlesService $service;

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
            'articles' => $this->service->getLatestArticles(10),
        ]);
    }

    public function create()
    {
        return view('articles::admin.create', []);
    }

    public function store(ArticleCreateRequest $request)
    {
        return redirect()->route('article.edit', [
            'article' => $this->service->createDocument($request->all()),
        ])->with('success', trans('admin.document_saved'));
    }

    public function edit(Article $article)
    {
        // dd('edit!!!', $article);

        return view('articles::admin.edit', [
            'article' => $article,
            // 'document' => $document->load('page'),
        ]);
    }

    public function update(Article $article)
    {
        dd('update!!!', $article);

        $this->service->updateDocument($document, $request->all());

        return redirect()->route('samples.edit', $document)->with('success', 'Документ успішно оновлено.');
    }

    public function destroy(Article $article)
    {
        dd('destroy!!!', $article);

        $this->service->removeDocument($document);

        return response()->redirectToRoute('samples.index')->with([
            'documents' => $this->service->getDocuments(),
        ]);
    }

}
