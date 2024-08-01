<?php

namespace App\ViewComposers;

use App\Models\Automatch;
use App\Models\Page;
use Illuminate\View\View;


class AutomatchComposer
{
    public function compose(View $view)
    {
        try {
            $view->with([
                'automatches' => Automatch::active()->get(),
                'block' => Page::where('key', 'homepage')->first()->pageBlocks()->where('block', 'automatch')->first(),
            ]);
        } catch (\Exception $e){
        }
    }
}
