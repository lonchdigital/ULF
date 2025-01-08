<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->value);
    }
}
