<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class HomeMainBlock extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'running_text',
        'description',
        'button_one',
        'button_two'
    ];
    protected $fillable = ['image', 'image_mob', 'video'];
}
