<?php

namespace App\Models;

use Modules\Articles\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Page extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'name', 
        'description',
        'text',
        'meta_title',
        'meta_description',
    ];

    protected $fillable = [
        'pageable_id',
        'pageable_type',
        'controller',
        'action',
        'section',
        'slug',
    ];

    

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    
}
