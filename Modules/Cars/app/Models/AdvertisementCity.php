<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AdvertisementCity extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];
    protected $fillable = ['region_id', 'advertisement_city_id'];
}
