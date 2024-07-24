<?php

namespace App\Models;

use Modules\Articles\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function scopeSearch($query, $val)
    {
        return $query->when($val, function ($q) use ($val) {
            $q->whereHas('translations', function ($q) use ($val) {
                $q->where('name', 'like', "%$val%")
                    ->orWhere('description', 'like', "%$val%");
            });
        });
    }
}
