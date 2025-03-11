<?php

namespace Modules\Cars\Services\Admin;

use Modules\Cars\Models\Type;
use Modules\Cars\Models\Model;
use Modules\Cars\Models\Vehicle;
use Modules\Cars\Models\FuelType;
use Modules\Cars\Models\ColorType;
use Modules\Cars\Models\Equipment;
use Modules\Cars\Models\TransmissionType;

use Modules\Cars\Models\Car;
use Illuminate\Support\Str;
use Modules\Cars\Models\CarImage;
use Illuminate\Support\Facades\Http;
use Modules\Cars\Models\DriverType;

class CarVehicleService
{

    public function createFromApi(array $data): Vehicle
    {
        $dataToUpdate = [];

        $dataToUpdate['vin'] = $data['vin'];
        $dataToUpdate['manufacturedYear'] = $data['manufacturedYear'];
        $dataToUpdate['engineVolume'] = $data['engineVolume'];
        $dataToUpdate['mileage'] = $data['mileage'];

        $dataToUpdate = array_merge($dataToUpdate, $this->updateVehicleTypes($data));

        dd('create Vehicle', $dataToUpdate);

        $vehicle = Vehicle::create($dataToUpdate);

        if(!is_null($data['equipment'])){
            $equipmentData = [];
            foreach($data['equipment'] as $key => $value){
                $equipmentData[$key] = $value;
            }
            $equipmentData['vehicle_id'] = $vehicle->id;
            Equipment::create($equipmentData);
        }

        return $vehicle;
    }

    public function updateFromApi(array $data, $car): Vehicle
    {
        $dataToUpdate = [];

        $dataToUpdate['vin'] = $data['vin'];
        $dataToUpdate['manufacturedYear'] = $data['manufacturedYear'];
        $dataToUpdate['engineVolume'] = $data['engineVolume'];
        $dataToUpdate['mileage'] = $data['mileage'];

        $dataToUpdate = array_merge($dataToUpdate, $this->updateVehicleTypes($data));

        $car->vehicle->update($dataToUpdate);

        dd('done?');

        if(!is_null($data['equipment'])){
            $equipmentData = [];
            foreach($data['equipment'] as $key => $value){
                $equipmentData[$key] = $value;
            }
//            $equipmentData['vehicle_id'] = $vehicle->id;

            $car->vehicle->equipment->update($equipmentData);
        }

        return $car->vehicle;
    }


    private function updateVehicleTypes(array $data) : array
    {
        $model = Model::where('model_id', $data['model']['id'])->first();
        if(is_null($model)) {
            throw new \Exception('The model of the car cannot be found!');
        }
        $dataToUpdate['model_id'] = $model->id;

        if(!is_null($data['fuelType'])){
            $fuelType = FuelType::where('fuel_type_id', $data['fuelType']['id'])->first();
            $dataToUpdate['fuel_type_id'] = ($fuelType) ? $fuelType->id : null;
        }
        if(!is_null($data['transmissionType'])){
            $transmissionType = TransmissionType::where('transmission_type_id', $data['transmissionType']['id'])->first();
            $dataToUpdate['transmission_type_id'] = ($transmissionType) ? $transmissionType->id : null;
        }
        if(!is_null($data['colorType'])){
            $colorType = ColorType::where('color_type_id', $data['colorType']['id'])->first();
            $dataToUpdate['color_type_id'] = ($colorType) ? $colorType->id : null;
        }
        if(!is_null($data['type'])){
            $type = Type::where('type_id', $data['type']['id'])->first();
            $dataToUpdate['type_id'] = ($type) ? $type->id : null;
        }
        if(!is_null($data['driverType'])){
            $dryverType = DriverType::where('driver_type_id', $data['driverType']['id'])->first();
            $dataToUpdate['driver_type_id'] = ($dryverType) ? $dryverType->id : null;
        }

        return $dataToUpdate;
    }


}
