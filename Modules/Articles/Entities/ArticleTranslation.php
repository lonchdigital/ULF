<?php

namespace Modules\Articles\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'text'];
}
