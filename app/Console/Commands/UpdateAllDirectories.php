<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;
use Illuminate\Support\Facades\Log;

class UpdateAllDirectories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-all-directories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command updates all the directories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $carApiService = new CarApiService;
            $authService = new AuthService;
            $authService->getToken();

            $this->updateAllVehicleFuelTypes(
                $carApiService->getDictionaryByName('VehicleFuelTypes', $authService->accessToken)
            );
            $this->updateAllVehicleColorTypes(
                $carApiService->getDictionaryByName('VehicleColorType', $authService->accessToken)
            );
            $this->updateAllVehicleTypes(
                $carApiService->getDictionaryByName('VehicleBodyType', $authService->accessToken)
            );

            $this->updateAllVehicleTransmissionTypes(
                $carApiService->getDictionaryByName('VehicleTransmissionTypes', $authService->accessToken)
            );

            $this->updateAllManufacturers(
                $carApiService->getDictionaryByName('VehicleManufacturer', $authService->accessToken)
            );

            $this->updateAllVehicleDriverTypes(
                $carApiService->getDictionaryByName('VehicleDriverType', $authService->accessToken)
            );

            $this->updateAllVehicleModels(
                $carApiService->getDictionaryByName('VehicleModel', $authService->accessToken)
            );

        } catch (\Exception $e) {
            Log::error('Error!', ['error' => $e->getMessage()]);
            abort(500, 'Internal Server Error');
        }
    }
}
