<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class CarFaqTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question', 'answer'];
}
