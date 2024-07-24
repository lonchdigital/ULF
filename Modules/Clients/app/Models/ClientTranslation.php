<?php

namespace Modules\Clients\Models;

use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'history_title', 'description'];
}
