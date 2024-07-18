<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Storage;

class Car extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['description'];
    protected $fillable = [
        'vehicle_id',
        'car_page_id',
        'lot_id',
        'subscription_category',
        'subscription_period_id',
        'subscription_extentional_id',
        'advertisement_city_id'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function getFullName(): string
    {
        return $this->vehicle->model->manufacturer->name .' '. $this->vehicle->model->name .' '. $this->vehicle->manufacturedYear;
    }

    public function getMainImageUrl(): ?string
    {
        $mainImage = $this->images->where('TypeId', 1)->first();
        return ($mainImage) ? Storage::url($mainImage->Url) : null;
    }
}
