<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Modules\Cars\Models\Model;

class Vehicle extends EloquentModel
{
    protected $fillable = [
        'vin',
        'manufacturedYear',
        'engineVolume',
        'mileage',
        'model_id',
        'fuel_type_id',
        'transmission_type_id',
        'color_type_id',
        'equipment_id',
        'type_id',
        'driver_type_id'
    ];

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }
}
