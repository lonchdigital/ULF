<?php

namespace Modules\Articles\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ArticlesController extends Controller
{
    /**
//     * @var WebService
     */
//    private WebService $service;

    /**
     * ProfessionogramsController constructor.
//     * @param WebService $service
     */
    /*public function __construct(WebService $service)
    {
        $this->service = $service;
    }*/

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
        return view('articles::admin.create', [

        ]);
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
