<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\HomeMainBlock;
use App\Models\HomeDriveBlock;
use App\Models\HomeBenefitBlock;
use App\Services\Admin\HomePage\HomePageService;


class HomeController
{

    /**
    * @var HomePageService
     */
   private HomePageService $service;

    /**
     * HomeController constructor.
    * @param HomePageService $service
     */
    public function __construct(HomePageService $service)
    {
        $this->service = $service;
    }

    public function edit()
    {
        return view('admin.pages.home.edit', [
            'page' => Page::where('key', 'homepage')->first(),
            'homeMainBlock' => HomeMainBlock::first(),
            'homeBenefitBlock' => HomeBenefitBlock::all(),
            'homeDriveBlock' => HomeDriveBlock::first()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([]);

        $this->service->updateSettings($request->all());

        return redirect()->route('admin.home-page-settings.edit.page')
        ->with('success', trans('admin.document_updated'));
    }

}
