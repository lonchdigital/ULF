<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class HomeDriveBlock extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'description',
        'step_one',
        'step_two',
        'step_three',
        'step_four',
        'step_five',
        'button_one',
        'button_two'
    ];
    protected $fillable = [
        'image',
        'video',
        'youtube'
    ];
}
