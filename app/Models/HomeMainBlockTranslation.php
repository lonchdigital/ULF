<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeMainBlockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title', 
        'running_text',
        'description',
        'button_one',
        'button_two'
    ];
}
