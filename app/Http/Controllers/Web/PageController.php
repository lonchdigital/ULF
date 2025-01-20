<?php


namespace App\Http\Controllers\Web;


use App\Models\Page;
use Illuminate\Http\Request;

class PageController
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            abort(404);
        }

        $url['ua'] = url('/') . '/' . $page->slug;
        $url['ru'] = url('/') . '/ru/' . $page->slug;

        return view('web.pages.page', [
            'page' => $page,
            'url' => $url,
        ]);
    }

}
