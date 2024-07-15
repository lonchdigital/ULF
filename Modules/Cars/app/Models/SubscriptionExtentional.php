<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Cars\Database\Factories\SubscriptionExtentionalFactory;

class SubscriptionExtentional extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): SubscriptionExtentionalFactory
    {
        //return SubscriptionExtentionalFactory::new();
    }
}
