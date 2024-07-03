<?php

namespace Modules\Articles\Entities;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Article extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'description', 'text'];
    protected $fillable = [0];

    // protected $casts = [
    //     'document_date' => 'datetime'
    // ];


    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
}
