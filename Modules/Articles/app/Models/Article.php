<?php

namespace Modules\Articles\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Article extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'description', 'text'];
    protected $fillable = ['image_path', 'article_page_id'];

    // protected $casts = [
    //     'document_date' => 'datetime'
    // ];


    public function page()
    {
        return $this->belongsTo(ArticlePage::class, 'article_page_id', 'id');
    }

    /*public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function page(): MorphOne
    {
        return $this->morphOne(Page::class, 'pageable');
    }*/

    public function imageUrl(): Attribute
    {
        return Attribute::make(function () {
            if ($this->image_path) {
                return Storage::url($this->image_path);
            }
            return null;
        });
    }

    public function toArray(): array
    {
        $array = parent::toArray();
        $array['image_url'] = $this->image_url;
        return $array;
    }
}
