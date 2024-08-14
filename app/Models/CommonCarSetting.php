<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CommonCarSetting extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['first_payment_note'];
    protected $fillable = ['key'];
}
