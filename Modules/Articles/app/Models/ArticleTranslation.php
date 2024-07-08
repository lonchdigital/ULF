<?php

namespace Modules\Articles\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'text'];
}
