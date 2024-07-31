<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $allPages = Page::all();

        return view('admin.pages.index', [
            'homePage' => $allPages->where('key', 'homepage')->first(),
            'pages' => $allPages->where('key', null)
        ]);
    }

    public function edit(Page $page)
    {
        dd('page edit', $page->name);
    }

    public function editContacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('admin.pages.edit-contacts', compact('page'));
    }
}
