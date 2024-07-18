<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class ModelManufacturer extends EloquentModel
{
    protected $fillable = [
        'autoria_id',
        'model_manufacturer_id', 
        'name'
    ];

    public function model()
    {
        return $this->hasOne(Model::class);
    }
}
