<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CarPage extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'name', 
        'seo_text',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'page_id',
        'controller',
        'action',
        'section',
        'slug',
    ];

    public function car()
    {
        return $this->hasOne(Car::class);
    }
}
