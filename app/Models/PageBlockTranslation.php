<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'locale',
        'page_block_id'
    ];
}
