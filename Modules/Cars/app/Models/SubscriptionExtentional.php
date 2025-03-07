<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionExtentional extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'lot_id',
        'type_id',
        'availability_id',
        'youtube_link',
        'document_link',
        'overdrive_price_uah',
        'subscription_extentional_id'
    ];

}