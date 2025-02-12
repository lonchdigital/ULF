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
        $request->validate([
            'hero' => ['nullable', 'array'],
            'hero.is_video' => ['nullable', 'string', 'in:on'],
            'hero.delete_video' => ['nullable', 'integer', 'in:0,1'],
            'hero.title' => ['nullable', 'array'],
            'hero.title.*' => ['nullable', 'string', 'max:255'],
            'hero.running_text' => ['nullable', 'array'],
            'hero.description' => ['nullable', 'array'],
            'hero.button_one' => ['nullable', 'array'],
            'hero.button_two' => ['nullable', 'array'],

            'home-benefit' => ['nullable', 'array'],

            'drive' => ['nullable', 'array'],
            'drive.delete_video' => ['nullable', 'integer', 'in:0,1'],
            'drive.youtube' => ['nullable', 'string'],
            'drive.title' => ['nullable', 'array'],
            'drive.description' => ['nullable', 'array'],
            'drive.step_one' => ['nullable', 'array'],
            'drive.step_two' => ['nullable', 'array'],
            'drive.step_three' => ['nullable', 'array'],
            'drive.step_four' => ['nullable', 'array'],
            'drive.step_five' => ['nullable', 'array'],
            'drive.button_one' => ['nullable', 'array'],
            'drive.button_two' => ['nullable', 'array'],

            'seo_data' => ['nullable', 'array'],
            'meta_title' => ['nullable', 'array'],
            'meta_description' => ['nullable', 'array'],
            'meta_keywords' => ['nullable', 'array'],
        ]);

        $this->service->updateSettings($request->all());

        return redirect()->route('admin.home-page-settings.edit.page')
        ->with('success', trans('admin.document_updated'));
    }

}
