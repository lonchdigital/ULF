<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SubscribeSetting extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = ['is_active', 'section_id'];

}
