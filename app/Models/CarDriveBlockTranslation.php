<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDriveBlockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'step_one',
        'step_two',
        'step_three',
        'step_four',
        'step_five'
    ];
}
