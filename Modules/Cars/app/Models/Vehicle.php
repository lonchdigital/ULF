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
    
    public function driverType()
    {
        return $this->belongsTo(DriverType::class);
    }
    
    public function colorType()
    {
        return $this->belongsTo(ColorType::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function transmissionType()
    {
        return $this->belongsTo(TransmissionType::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }
    public function equipment()
    {
        return $this->hasOne(Equipment::class);
    }
}
