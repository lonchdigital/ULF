<?php

namespace App\Http\Controllers\Admin;


use App\Models\Page;
use App\Services\Admin\CarCommonSettings\CarCommonService;
//use App\Http\Requests\Admin\HomePage\HomePageUpdateRequest;
use Illuminate\Routing\Controller;
//use App\DataClasses\InfoSectionIconClass;

class CarCommonSettingsController extends Controller
{
    private CarCommonService $service;

    /**
     * @param CarCommonService $service
     */
    public function __construct(CarCommonService $service)
    {
        $this->service = $service;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {


        return view('admin.car-common-settings.edit', [

        ]);
    }

    public function oneCar()
    {


        return view('admin.car-common-settings.one-car', [

        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param HomePageUpdateRequest $request
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    /*public function update(HomePageUpdateRequest $request)
    {
        $page = Page::where('slug', '/')->first();

        $this->service->updatePage($page, $request->all());

        return redirect()->route('admin.home-page.edit.page', $page);
    }*/
}
