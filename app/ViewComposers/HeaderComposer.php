<?php

namespace App\ViewComposers;


use App\Models\Page;
use App\Services\Locale\LocaleService;
use Illuminate\View\View;


class HeaderComposer
{

    public function compose(View $view)
    {
        $view->with([
            'locationService' =>app()->make(LocaleService::class),
            'pages' => Page::whereNotIn('slug', ['footer'])->get(),
            'page' => Page::where('slug', 'footer')->with('pageBlocks')->first(),
        ]);
    }
}
