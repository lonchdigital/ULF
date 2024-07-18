<?php

namespace Modules\Cars\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $fillable = ['model_id', 'model_manufacturer_id', 'autoria_id', 'name'];

    public function manufacturer()
    {
        return $this->belongsTo(ModelManufacturer::class, 'model_manufacturer_id', 'id');
    }
}
