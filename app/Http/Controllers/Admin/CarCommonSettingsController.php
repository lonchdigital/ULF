<?php

namespace App\Http\Controllers\Admin;


use App\Models\CarDriveBlock;
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
            'commonCarSettings' => $this->service->getAllCommonCarSettings(),
            'subscribeBenefits' => $this->service->getAllSubscribeBenefits(),
            'carDriveBlock' => CarDriveBlock::first(),
            'faqsCars' => $this->service->getAllCommonFaqs(),
            'subscribeMonthSettings' => $this->service->getAllSubscribeSettings()
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

        return redirect()->route('admin.car-common-settings.edit.page')
        ->with('success', trans('admin.document_updated'));
    }
}
