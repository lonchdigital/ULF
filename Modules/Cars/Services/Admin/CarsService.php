<?php

namespace Modules\Cars\Services\Admin;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Cars\Models\Car;

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

    public function updateDocument(Car $car, array $data): Car
    {
        return $this->updateService->updateCarFromDashboard($car, $data);
    }

}
