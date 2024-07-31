<?php

namespace Modules\Cars\Services\Admin;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Cars\Models\Car;
use Illuminate\Support\Facades\DB;
use Modules\Cars\Models\Vehicle;

class CarsService extends CarBaseService
{
    private CarCreateService $createService;
    private CarUpdateService $updateService;
    private CarTypesService $typesService;

    public function __construct(
        CarCreateService $createService,
        CarUpdateService $updateService,
        CarTypesService $typesService,
    )
    {
        $this->createService = $createService;
        $this->updateService = $updateService;
        $this->typesService = $typesService;
    }


    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getLatestCars($perPage = 10): LengthAwarePaginator
    {
        // $query = Car::query()->with('vehicle')->latest();
        $query = Car::query()->latest();
        return $query->paginate($perPage);
    }

    public function removeAllDocuments()
    {

        DB::transaction(function () {

            Vehicle::chunkById(20, function ($vehicles){
                foreach ($vehicles as $vehicle) {

                    if(!is_null($vehicle->car)) {
                        if(count($vehicle->car->images) > 0) {
                            foreach ($vehicle->car->images as $image) {
                                deleteImage($image->Url);
                            }
                        }
                    }
                    $vehicle->delete();

                }
            });

            /*Car::chunkById(20, function ($cars) {
                foreach ($cars as $car) {
                    if(count($car->images) > 0) {
                        foreach ($car->images as $image) {
                            deleteImage($image->Url);
                        }
                    }
                    $car->delete();
                }
            });*/


        });

    }

    public function updateDocument(Car $car, array $data): Car
    {
        return $this->updateService->updateCarFromDashboard($car, $data);
    }

}
