<?php

namespace App\ViewComposers;


use App\Models\Page;
use App\Services\Locale\LocaleService;
use Illuminate\View\View;


class IndexComposer
{

    public function compose(View $view)
    {
        $view->with([
            'footerPage' => Page::where('slug', 'footer')->with('pageBlocks')->first(),
        ]);
    }
}
