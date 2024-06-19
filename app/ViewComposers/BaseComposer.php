<?php

namespace App\ViewComposers;


use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\Application\ApplicationConfigService;


class BaseComposer
{
    public function compose(View $view)
    {

        // some test changes
        $applicationConfigService = new ApplicationConfigService;

        try {
            $view->with([
                'availableLanguages' => $applicationConfigService->getAvailableLanguages(),
            ]);
        } catch (\Exception $e){
        }
    }
}
