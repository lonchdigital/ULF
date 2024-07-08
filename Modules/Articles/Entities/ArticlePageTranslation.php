<?php

namespace Modules\Articles\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticlePageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'locale',
        'name',
        'slug',
        'description',
        'text',
        'h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
    ];
}
