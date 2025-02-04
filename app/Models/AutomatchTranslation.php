<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomatchTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'automatch_id',
        'locale',
        'title',
        'description',
        'price',
        'comment',
    ];
}
