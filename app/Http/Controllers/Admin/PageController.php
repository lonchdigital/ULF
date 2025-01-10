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
            'faq' => $allPages->where('key', 'faq')->first(),
            'pages' => $allPages->where('key', null),
            'articlesPage' => ArticlePage::where('slug', 'articles')->first(),
            'carsPage' => CarPage::where('slug', 'cars')->first(),
            'customerStories' => $allPages->where('key', 'customer-stories')->first()
        ]);
    }

    public function editFaq(Page $page)
    {
        return view('admin.pages.edit-faq', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    public function update(Page $page, Request $request)
    {
        $data = $request->all();

        if(isset($data['is_show_in_header'])) {
            $data['is_show_in_header'] = true;
        } else {
            $data['is_show_in_header'] = false;
        }

        if(isset($data['is_show_in_footer'])) {
            $data['is_show_in_footer'] = true;
        } else {
            $data['is_show_in_footer'] = false;
        }

        return redirect()->route('page.edit', [
            'page' => $this->service->updateDocument($page, $data)
        ])->with('success', trans('admin.document_updated'));
    }

    public function updateFaq(Page $page, Request $request)
    {
        $data = $request->all();

        $data['text'] = [];
        $data['seo_data'] = [];
        $data['meta_keywords'] = [];
        $data['ua'] = [
            'name' => 'FAQ'
        ];
        $data['ru'] = [
            'name' => 'FAQ'
        ];

        if(isset($data['is_show_in_header'])) {
            $data['is_show_in_header'] = true;
        } else {
            $data['is_show_in_header'] = false;
        }

        if(isset($data['is_show_in_footer'])) {
            $data['is_show_in_footer'] = true;
        } else {
            $data['is_show_in_footer'] = false;
        }

        $page->update([
            'ua' => [
                'name' => 'FAQ'
            ],
            'ru' => [
                'name' => 'FAQ'
            ]
        ]);

        return redirect()->route('page.edit-faq', [
            'page' => $this->service->updateDocument($page, $data)
        ])->with('success', trans('admin.document_updated'));
    }


    public function editContacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('admin.pages.edit-contacts', compact('page'));
    }

    public function editFooter()
    {
        $page = Page::where('slug', 'footer')->firstOrFail();

        return view('admin.pages.edit-footer', compact('page'));
    }
}
