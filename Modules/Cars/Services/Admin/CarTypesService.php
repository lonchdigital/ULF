<?php

namespace Modules\Cars\Services\Admin;

use Modules\Cars\Models\FuelType;
use Modules\Cars\Models\Type;
use Modules\Cars\Models\TransmissionType;
use Modules\Cars\Models\DriverType;
use Modules\Cars\Models\ColorType;

class CarTypesService
{
    private $langs = ['uk', 'ru'];


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

        dd($data);

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
        $dataToUpdate = [];

        foreach($data as $item) {
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
}
