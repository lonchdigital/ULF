<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;
use Modules\Cars\Services\Admin\CarTypesService;
use Modules\Cars\Services\Admin\CarUpdateService;

class UpdateCarsDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api-cars:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets all Cars data by API';


    protected $authService;
    protected $carApiService;
    protected $carTypesService;
    protected $carUpdateService;

    public function __construct(
        AuthService $authService,
        CarApiService $carApiService,
        carTypesService $carTypesService,
        CarUpdateService $carUpdateService,
    )
    {
        parent::__construct();
        $this->authService = $authService;
        $this->carApiService = $carApiService;
        $this->carTypesService = $carTypesService;
        $this->carUpdateService = $carUpdateService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Getting token...');
        $this->authService->getToken();

        $this->info('Updating vehicleFuelTypes...');
        $this->carTypesService->updateAllVehicleFuelTypes(
            $this->carApiService->getDictionaryByName('VehicleFuelTypes', $this->authService->accessToken)
        );
        $this->info('Updating vehicleColorTypes...');
        $this->carTypesService->updateAllVehicleColorTypes(
            $this->carApiService->getDictionaryByName('VehicleColorType', $this->authService->accessToken)
        );
        $this->info('Updating vehicleTypes...');
        $this->carTypesService->updateAllVehicleTypes(
            $this->carApiService->getDictionaryByName('VehicleBodyType', $this->authService->accessToken)
        );
        $this->info('Updating vehicleTransmissionTypes...');
        $this->carTypesService->updateAllVehicleTransmissionTypes(
            $this->carApiService->getDictionaryByName('VehicleTransmissionTypes', $this->authService->accessToken)
        );
        $this->info('Updating vehicleManufacturer...');
        $this->carTypesService->updateAllManufacturers(
            $this->carApiService->getDictionaryByName('VehicleManufacturer', $this->authService->accessToken)
        );
        $this->info('Updating vehicleModel...');
        $this->carTypesService->updateAllVehicleModels(
            $this->carApiService->getDictionaryByName('VehicleModel', $this->authService->accessToken)
        );


        // Not implemented
        // $this->info('Updating vehicleDriverTypes...');
        // $this->carTypesService->updateAllVehicleDriverTypes(
        //     $this->carApiService->getDictionaryByName('VehicleDriverType', $this->authService->accessToken)
        // );

        $this->info('Getting lotsList...');
        $carLotsInfo = $this->carApiService->getLotsList($this->authService->accessToken, 5);

        $this->info('Updating Cars...');
        $this->carUpdateService->updateCars(
            $this->carApiService->getLotInfo($this->authService->accessToken, $carLotsInfo['lotIds'])['value']
        );


        $this->info('All done!');
    }
}
