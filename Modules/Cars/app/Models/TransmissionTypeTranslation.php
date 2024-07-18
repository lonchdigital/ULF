<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class TransmissionTypeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
