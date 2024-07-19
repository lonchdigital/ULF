<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Storage;

class Car extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['description', 'label'];
    protected $fillable = [
        'vehicle_id',
        'car_page_id',
        'lot_id',
        'label_color_id',
        'status_id',
        'popularity_id',
        'sort_by_popularity_id',
        'subscription_category',
        'subscription_period_id',
        'subscription_extentional_id',
        'advertisement_city_id'
    ];

    public function page()
    {
        return $this->belongsTo(CarPage::class, 'car_page_id', 'id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
    public function subscribePrices()
    {
        return $this->hasMany(SubscribePrice::class);
    }
    public function faqs()
    {
        return $this->hasMany(CarFaq::class);
    }

    public function getName(): string
    {
        return $this->vehicle->model->manufacturer->name .' '. $this->vehicle->model->name;
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
