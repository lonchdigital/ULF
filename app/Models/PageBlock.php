<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageBlock extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'title',
        'description',
        'content',
    ];

    protected $fillable = [
        'page_id',
        'key',
        'block',
        'value',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
