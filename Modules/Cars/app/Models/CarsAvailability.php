<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class CarsAvailability extends Model
{
    protected $fillable = [
        'car_id',
        'email'
    ];
}
