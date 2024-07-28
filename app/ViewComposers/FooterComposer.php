<?php

namespace App\ViewComposers;


use App\Models\Page;
use Illuminate\View\View;


class FooterComposer
{

    public function compose(View $view)
    {
        $slugs = ['policy', 'terms', 'rental-agreement', 'insurance-contract'];

        $view->with([
            'footerPages' => Page::whereIn('slug', $slugs)->get()
        ]);
    }
}
