<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CarDriveBlock extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'step_one',
        'step_two',
        'step_three',
        'step_four',
        'step_five',
    ];
    protected $fillable = [0];
}
