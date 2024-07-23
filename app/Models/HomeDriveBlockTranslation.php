<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeDriveBlockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
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
}
