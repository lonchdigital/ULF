<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class CarTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['description'];
}
