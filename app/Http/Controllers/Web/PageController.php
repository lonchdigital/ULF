<?php


namespace App\Http\Controllers\Web;


use App\Models\Page;
use Illuminate\Http\Request;

class PageController
{
    public function show($slug)
    {
        return view('web.pages.page',[
            'page' => Page::where('slug', $slug)->first()
        ]);
    }

}
