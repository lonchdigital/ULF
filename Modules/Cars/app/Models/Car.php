<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Car extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['description'];
    protected $fillable = [
        'vehicle_id',
        'car_page_id',
        'lot_id',
        'subscription_category',
        'subscription_period_id',
        'subscription_extentional_id',
        'advertisement_city_id'
    ];
}
