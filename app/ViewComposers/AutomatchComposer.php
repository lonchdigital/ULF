<?php

namespace App\ViewComposers;

use App\Models\Automatch;
use Illuminate\View\View;


class AutomatchComposer
{
    public function compose(View $view)
    {
        try {
            $view->with([
                'automatches' => Automatch::active()->get(),
            ]);
        } catch (\Exception $e){
        }
    }
}
