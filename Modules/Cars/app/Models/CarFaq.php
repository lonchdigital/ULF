<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CarFaq extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['question', 'answer'];
    protected $fillable = ['car_id'];
}
