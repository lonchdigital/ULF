<?php

namespace Modules\Cars\Services\Admin;

use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;
use Modules\Cars\Models\Type;
use Modules\Cars\Models\Model;
use Modules\Cars\Models\FuelType;
use Modules\Cars\Models\ColorType;
use Modules\Cars\Models\DriverType;
use Modules\Cars\Models\TransmissionType;
use Modules\Cars\Models\ModelManufacturer;
use Illuminate\Support\Facades\Log;

class CarTypesService
{
    private $langs = ['ua', 'ru'];


    public function updateAllVehicleTypes(array $data)
    {
        $dataToUpdate = [];

        foreach($data as $item) {
            $dataToUpdate['type_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];

            foreach($this->langs as $lang){
                $dataToUpdate[$lang]['name'] = $item['name'];
            }

            $existingItem = Type::where('type_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                Type::create($dataToUpdate);
            }
        }
    }

    public function updateAllVehicleFuelTypes(array $data)
    {
        $dataToUpdate = [];

        foreach($data as $item) {
            $dataToUpdate['fuel_type_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];

            foreach($this->langs as $lang){
                $dataToUpdate[$lang]['name'] = $item['name'];
            }

            $existingItem = FuelType::where('fuel_type_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                FuelType::create($dataToUpdate);
            }
        }
    }

    public function updateAllVehicleTransmissionTypes(array $data)
    {
        $dataToUpdate = [];

        foreach($data as $item) {
            $dataToUpdate['transmission_type_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];

            foreach($this->langs as $lang){
                $dataToUpdate[$lang]['name'] = $item['name'];
            }

            $existingItem = TransmissionType::where('transmission_type_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                TransmissionType::create($dataToUpdate);
            }
        }
    }

    public function updateAllVehicleDriverTypes($data)
    {
        $dataToUpdate = [];

        foreach($data as $item) {
            $dataToUpdate['driver_type_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];

            foreach($this->langs as $lang){
                $dataToUpdate[$lang]['name'] = $item['name'];
            }

            $existingItem = DriverType::where('driver_type_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                DriverType::create($dataToUpdate);
            }
        }
    }

    public function updateAllVehicleColorTypes(array $data)
    {
        foreach($data as $item) {
            $dataToUpdate = [];

            $dataToUpdate['color_type_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];

            foreach($this->langs as $lang){
                $dataToUpdate[$lang]['name'] = $item['name'];
            }

            $existingItem = ColorType::where('color_type_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                ColorType::create($dataToUpdate);
            }
        }
    }

    public function updateAllManufacturers(array $data)
    {
        foreach($data as $item) {
            $dataToUpdate = [];

            $dataToUpdate['model_manufacturer_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];
            $dataToUpdate['name'] = $item['name'];

            $existingItem = ModelManufacturer::where('model_manufacturer_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                ModelManufacturer::create($dataToUpdate);
            }
        }
    }

    public function updateAllVehicleModels(array $data)
    {
        foreach($data as $item) {
            $dataToUpdate = [];

            $dataToUpdate['model_id'] = $item['id'];
            $dataToUpdate['autoria_id'] = $item['autoRiaId'];
            $dataToUpdate['name'] = $item['name'];

            $modelManufacturer = ModelManufacturer::where('model_manufacturer_id', $item['manufacturerId'])->first();
            $dataToUpdate['model_manufacturer_id'] = ($modelManufacturer) ? $modelManufacturer->id : null;

            $existingItem = Model::where('model_id', $item['id'])->first();
            if($existingItem) {
                $existingItem->update($dataToUpdate);
            } else {
                Model::create($dataToUpdate);
            }
        }
    }

    public function updateDirectoriesByKey(array $directoriesList)
    {
        try {
            $carApiService = new CarApiService;
            $authService = new AuthService;
            $authService->getToken();

            if($directoriesList['VehicleFuelTypes']) {
                $this->updateAllVehicleFuelTypes(
                    $carApiService->getDictionaryByName('VehicleFuelTypes', $authService->accessToken)
                );
            }
            if($directoriesList['VehicleColorType']) {
                $this->updateAllVehicleColorTypes(
                    $carApiService->getDictionaryByName('VehicleColorType', $authService->accessToken)
                );
            }
            if($directoriesList['VehicleBodyType']) {
                $this->updateAllVehicleTypes(
                    $carApiService->getDictionaryByName('VehicleBodyType', $authService->accessToken)
                );
            }
            if($directoriesList['VehicleTransmissionTypes']) {
                $this->updateAllVehicleTransmissionTypes(
                    $carApiService->getDictionaryByName('VehicleTransmissionTypes', $authService->accessToken)
                );
            }
            if($directoriesList['VehicleManufacturer']) {
                $this->updateAllManufacturers(
                    $carApiService->getDictionaryByName('VehicleManufacturer', $authService->accessToken)
                );
            }
            if($directoriesList['VehicleDriverType']) {
                $this->updateAllVehicleDriverTypes(
                    $carApiService->getDictionaryByName('VehicleDriverType', $authService->accessToken)
                );
            }
            if($directoriesList['VehicleModel']) {
                $this->updateAllVehicleModels(
                    $carApiService->getDictionaryByName('VehicleModel', $authService->accessToken)
                );
            }

        } catch (\Exception $e) {
            Log::error('Error!', ['error' => $e->getMessage()]);
            abort(500, 'Internal Server Error');
        }
    }
}
