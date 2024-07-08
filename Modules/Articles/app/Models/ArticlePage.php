<?php

namespace Modules\Articles\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ArticlePage extends Model implements TranslatableContract
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
        'article_id',
        'controller',
        'action',
        'section',
        'slug',
    ];

    // protected $casts = [
    //     'document_date' => 'datetime'
    // ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }


}
