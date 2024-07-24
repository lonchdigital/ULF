<?php

namespace Modules\Clients\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Client extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'history_title', 'description'];
    protected $fillable = ['image_path', 'video'];


    public function imageUrl(): Attribute
    {
        return Attribute::make(function () {
            if ($this->image_path) {
                return Storage::url($this->image_path);
            }
            return null;
        });
    }

    public function toArray(): array
    {
        $array = parent::toArray();
        $array['image_url'] = $this->image_url;
        return $array;
    }
}
