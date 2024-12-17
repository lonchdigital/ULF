<?php

namespace App\Models;

use Modules\Articles\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Page extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'locale',
        'name',
        'text',
        'h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'seo_text',
        'anchor',
    ];

    protected $fillable = [
        'controller',
        'slug',
        'key',
        'active',
        'is_show_in_header',
        'is_show_in_footer',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function pageBlocks():HasMany
    {
        return $this->hasMany(PageBlock::class);
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
