<?php

namespace Modules\Cars\Services\Admin;

use Illuminate\Support\Str;
use Modules\Cars\Models\CarPage;
use Modules\Cars\Http\Controllers\Web\CarsController;

class PageService
{

    public function updateFromApi(array $data, $vehicle, $lotID): ?CarPage
    {
        $dataToUpdate = [];
        $carName = $vehicle->model->manufacturer->name .' '. $vehicle->model->name .' '. $vehicle->manufacturedYear;
        $carSlug = Str::slug($vehicle->model->manufacturer->name .'-'. $vehicle->model->name .'-'. $lotID);

        $dataToUpdate['section'] = config('cars.section');
        $dataToUpdate['slug'] = $carSlug;
        $dataToUpdate['action'] = config('cars.new_document_action');
        $dataToUpdate['controller'] = CarsController::class;

        $data['name'] = ['uk' => $carName, 'ru' => $carName];
        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
            $dataToUpdate[$lang]['h1'] = $value;
        }


        if(!is_null($vehicle->car)) {
            $vehicle->car->page->update($dataToUpdate);
            return $vehicle->car->page;
        } else {
            return CarPage::create($dataToUpdate);
        }
    }

}
