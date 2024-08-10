<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class CarPageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'seo_text',
        'description',
        'text',
        'h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'seo_text',
    ];
}
