<?php

namespace App\Http\Controllers\Admin;


use App\Models\Page;
use App\Services\Admin\CarCommonSettings\CarCommonService;
use App\Http\Requests\Admin\CarCommonSettings\CarCommonSettingsUpdateRequest;
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
            'subscribeBenefits' => $this->service->getAllSubscribeBenefits()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param CarCommonSettingsUpdateRequest $request
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CarCommonSettingsUpdateRequest $request)
    {
        $this->service->updatePage($request->all());

        return redirect()->route('admin.car-common-settings.edit.page');
    }

    public function oneCar()
    {


        return view('admin.car-common-settings.one-car', [

        ]);
    }
}
