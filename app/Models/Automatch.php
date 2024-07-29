<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Automatch extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'price',
        'image',
        'is_active',
        'sort',
        'link',
    ];

    public $translatedAttributes = [
        'title',
        'description',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
