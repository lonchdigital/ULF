<?php

namespace Modules\Articles\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Modules\Articles\Http\Requests\Admin\ArticleCreateRequest;
use Illuminate\Routing\Controller;
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
        // $documents = $page->getLatestDocumentsWithPaginate(10);

        return view('articles::admin.index', [
            // 'page' => $page,
            // 'documents' => $documents,
            'documents' => collect([]),
            //            'variations' => ProfessionogramVariety::all(),
        ]);
    }


    public function create()
    {
        return view('articles::admin.create', []);
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleCreateRequest $request)
    {
        return redirect()->route('samples.edit', [
            'document' => $this->service->createDocument($request->all()),
        ])->with('success', 'Докум1111111111.');
    }

    public function show(Request $request, Page $page)
    {

        dd('show admin car !!!');

        $document = $page->getAttribute('document');

        return view('professionograms::web.show', [
            'page' => $page,
            'document' => $document,
            'isFavActive' => $this->service->isFavoriteActive($document->document, $request->user()),
            'documents' => $page->getDocumentsWithLimit(5),
            'file' => $page->getAttribute('file'),
            'htmlDocument' => $this->service->getHtmlDocument($page),
            'editorDownloadLink' => $this->service->getEditorDownloadLink($document),
            'downloadDocumentLink' => $this->service->getDownloadLink($page->getAttribute('file')),
        ]);
    }


}
