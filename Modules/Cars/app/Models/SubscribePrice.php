<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class SubscribePrice extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'car_id',
        'section_id',
        'monthly_payment',
        'first_payment'
    ];
}
