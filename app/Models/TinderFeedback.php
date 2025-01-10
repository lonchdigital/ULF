<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TinderFeedback extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'status',
        'cars',
        'type',
        'page',
    ];

    public function scopeSearch($query, $val)
    {
        return $query->when($val, function($q) use ($val) {
            $q->where('name', 'like', "%$val%")
                ->orWhere('phone', 'like', "%$val%")
                ->orWhere('cars', 'like', "%$val%");
        });
    }

    public function getStatusClassAttribute()
    {
        switch ($this->status) {
            case 'new':
                return "text-success";
                break;

            case 'in_processing':
                return "text-warning";
                break;

            case 'completed':
                return "text-primary";
                break;

            default:
            return "text-secondary";
                break;
        }
    }
}
