<?php

namespace Modules\Cars\Services\Admin;

use Modules\Cars\Models\Car;

class CarUpdateService extends CarBaseService
{

    public function updateCars($allLots)
    {
        foreach($allLots as $lot){
            $page = $this->pageService->updateFromApi([]);
            $vehicle = $this->carVehicleService->updateFromApi($lot['vehicle']);

            $dataToUpdate = [];
            $dataToUpdate['vehicle_id'] = $vehicle->id;
            $dataToUpdate['car_page_id'] = $page->id;
            $dataToUpdate['lot_id'] = $lot['id'];
            $dataToUpdate['subscription_category'] = $lot['SubscriptionCategory'];
            // TODO:: get more about these fields
            // $dataToUpdate['subscription_period_id'] = null;
            // $dataToUpdate['subscription_extentional_id'] = null;
            // $dataToUpdate['advertisement_city_id'] = null;
            $dataToUpdate['uk']['description'] = $lot['description_ua'];
            $dataToUpdate['ru']['description'] = $lot['description_ru'];

            $car = Car::create($dataToUpdate);

            if(!is_null($lot['images'])){
                $this->updateCarImagesApi($lot['images'], $car);
            }
        }

    }

}
