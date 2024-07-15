<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class FuelTypeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
