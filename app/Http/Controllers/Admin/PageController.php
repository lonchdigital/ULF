<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use App\Services\Admin\Page\PageService;
use Illuminate\Http\Request;
use Modules\Articles\Models\ArticlePage;
use Modules\Cars\Models\CarPage;

class PageController extends Controller
{
    private PageService $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $allPages = Page::all();

        return view('admin.pages.index', [
            'homePage' => $allPages->where('key', 'homepage')->first(),
            'pages' => $allPages->where('key', null),
            'articlesPage' => ArticlePage::where('slug', 'articles')->first(),
            'carsPage' => CarPage::where('slug', 'cars')->first(),
            'customerStories' => $allPages->where('key', 'customer-stories')->first()
        ]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    public function update(Page $page, Request $request)
    {
        return redirect()->route('page.edit', [
            'page' => $this->service->updateDocument($page, $request->all())
        ])->with('success', trans('admin.document_updated'));
    }


    public function editContacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('admin.pages.edit-contacts', compact('page'));
    }
}
