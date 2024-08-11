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

        return view('web.pages.page', [
            'page' => $page
        ]);
    }

}
