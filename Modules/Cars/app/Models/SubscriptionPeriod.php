<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SubscriptionPeriod extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['description'];
    protected $fillable = [
        'subscription_period_id',
        'price_usd',
        'price_uah',
        'deposit_months',
        'min_months',
        'max_months',
        'lot_id'
    ];
}
