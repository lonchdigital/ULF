<?php

namespace Modules\Cars\Services\Admin;

use Modules\Cars\Models\Car;
use Modules\Cars\Models\CarPage;
use Modules\Cars\Models\Vehicle;
use Modules\Cars\Models\CarImage;
use Illuminate\Support\Facades\DB;
use Modules\Cars\Models\CarsAvailability;
use Modules\Cars\Models\SubscriptionExtentional;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;
use Illuminate\Support\Facades\Log;

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
                                $image->delete();
                            }
                        }

                        $vehicle->car->page->delete();
                    }
                    $vehicle->delete();

                }
            });
        });

        CarImage::truncate();
    }

    public function removeOneCar(int $lotId)
    {
        $car = Car::where('lot_id', $lotId)->first();
        
        if (!$car) {
            abort(500, 'Internal Server Error');
            return;
        }

        $vehicle = $car->vehicle;

        DB::transaction(function () use ($vehicle, $lotId) {
            if (!is_null($vehicle->car)) {
                if ($vehicle->car->images->isNotEmpty()) {
                    foreach ($vehicle->car->images as $image) {
                        deleteImage($image->Url);
                        $image->delete();
                    }
                }

                if ($vehicle->car->page) {
                    $vehicle->car->page->delete();
                }
            }

            $subscriptionExtentional = SubscriptionExtentional::where('lot_id', $lotId)->first();
            if($subscriptionExtentional) {
                $subscriptionExtentional->delete();
            }

            $vehicle->delete();
        });
    }

    public function updateDocument(Car $car, array $data): Car
    {
        return $this->updateService->updateCarFromDashboard($car, $data);
    }
    public function addCarFromApi(array $data)
    {
        $this->updateService->addOneCar($data);
    }

    public function updateCarIndex(CarPage $page, array $request): CarPage
    {
        $dataPageToUpdate = [];
        foreach ($request['seo_data'] as $lang => $value) {
            $dataPageToUpdate[$lang]['seo_text'] = $value;
        }
        foreach ($request['meta_title'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($request['meta_description'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_description'] = $value;
        }
        foreach ($request['meta_keywords'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_keywords'] = $value;
        }
        $page->update($dataPageToUpdate);

        return $page;
    }

    public function addNoteToCarsAvailability( int $carId, string $email)
    {
        $exists = CarsAvailability::where('car_id', $carId)
            ->where('email', $email)
            ->exists();
    
        if (!$exists) {
            CarsAvailability::create([
                'car_id' => $carId,
                'email' => $email
            ]);
        }
    }

    public function updateAllDirectories(array $directoriesList)
    {
        Log::info('=== Updating directories started ===', ['date' => now()->format('d-m-Y H:i:s')]);

        $this->typesService->updateDirectoriesByKey($directoriesList);
        
        Log::info('=== Updating directories finished ===');
    }

    public function updateAllCars()
    {
        Log::info('=== Updating cars started ===', ['date' => now()->format('d-m-Y H:i:s')]);

        try {
            $carApiService = new CarApiService;
            $authService = new AuthService;
            $authService->getToken();
        } catch (\Exception $e) {
            Log::error('Error!', ['error' => $e->getMessage()]);
            abort(500, 'Internal Server Error');
        }
        
        $limit = 5;
        $offset = 0;
        $apiCarIds = [];
        
        do {
            $carLotsInfo = $carApiService->getLotsList($authService->accessToken, $limit, $offset);
        
            if (!empty($carLotsInfo['value'])) {
                $carsWithData = $carApiService->getLotInfo($authService->accessToken, $carLotsInfo['value'])['value'];

                foreach($carsWithData as $car) {
                    $result = $this->updateService->addOneCar($car); // create/update ONE car

                    if ($result && !empty($car['id'])) {
                        $apiCarIds[] = $car['id'];
                    }
                }
        
                $offset += $limit;
            }
        
        } while (!empty($carLotsInfo['value']));


        $this->deleteCarsNotInApi($apiCarIds);

        Log::info('=== Updating cars finished ===');
    }


    private function deleteCarsNotInApi(array $apiCarIds)
    {
        if (empty($apiCarIds)) {
            Log::info('There are no cars to delete!');
            return;
        }

        // get list of lot_id NOT in API
        $carsToDelete = Car::whereNotIn('lot_id', $apiCarIds)->pluck('lot_id');

        if ($carsToDelete->isEmpty()) {
            Log::info('No cars found to delete.');
            return;
        }

        foreach ($carsToDelete as $lotId) {
            $this->removeOneCar($lotId);
        }

        Log::info('Some cars were deleted.', ['count' => count($carsToDelete)]);
    }
}
