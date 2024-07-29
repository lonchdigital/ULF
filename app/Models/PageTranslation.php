<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'locale',
        'name',
        'description',
        'text',
        'h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'breadcrumbs',
        'anchor',
    ];

}
