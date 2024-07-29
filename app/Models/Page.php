<?php

namespace App\Models;

use Modules\Articles\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
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

    protected $fillable = [
        'controller',
        'slug',
        'key',
        'active',
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
