<?php

namespace Modules\Articles\Http\Controllers\Web;


use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//use Modules\Articles\Services\Web\WebService;
//use Modules\Articles\Entities\ProfessionogramVariety;


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

        dd('index !!!');

        $documents = $page->getLatestDocumentsWithPaginate(10);

        return view('professionograms::web.index', [
            'page' => $page,
            'documents' => $documents,
//            'variations' => ProfessionogramVariety::all(),
        ]);
    }

    public function show(Request $request, Page $page)
    {

        dd('show !!!');

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

    public function filter(Request $request): array
    {
        $request->validate([
            'selectedCats' => 'nullable|array',
        ]);

        return $this->service->getFilteredPosts($request);
    }
}
