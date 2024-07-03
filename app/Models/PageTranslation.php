<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
//    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'locale',
        'name',
        'slug',
        'description',
        'text',
        'h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
    ];




}
