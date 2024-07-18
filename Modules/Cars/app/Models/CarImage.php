<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'car_id',
        'Url',
        'TypeId'
    ];
}
