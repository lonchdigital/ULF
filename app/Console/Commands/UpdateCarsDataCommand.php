<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;
use Modules\Cars\Services\Admin\CarTypesService;

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

    public function __construct(
        AuthService $authService,
        CarApiService $carApiService,
        carTypesService $carTypesService,
        )
    {
        parent::__construct();
        $this->authService = $authService;
        $this->carApiService = $carApiService;
        $this->carTypesService = $carTypesService;
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

        // Not implemented
        // $this->info('Updating vehicleDriverTypes...');
        // $this->carTypesService->updateAllVehicleDriverTypes(
        //     $this->carApiService->getDictionaryByName('VehicleDriverType', $this->authService->accessToken)
        // );


        $this->info('All done!');
    }
}
