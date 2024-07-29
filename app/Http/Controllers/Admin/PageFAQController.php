<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class PageFAQController extends Controller
{
    public function index()
    {
        return view('admin.pages-faq.index');
    }

    public function edit(Page $page)
    {
        return view('admin.pages-faq.edit', compact('page'));
    }

    public function createFaq(Page $page)
    {
        return view('admin.pages-faq.faq.create', compact('page'));
    }

    public function editFaq(Page $page, Faq $faq)
    {
        return view('admin.pages-faq.faq.edit', compact('page', 'faq'));
    }
}
