<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonCarSettingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'first_payment_note'
    ];
}
