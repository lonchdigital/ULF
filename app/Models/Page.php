<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Articles\Entities\Article;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

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
