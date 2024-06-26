<?php

namespace Modules\Cars\Entities;

use App\Models\Page;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Car
{
    protected $casts = [
        'document_date' => 'datetime'
    ];

   /* public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function page(): MorphOne
    {
        return $this->morphOne(Page::class, 'pageable');
    }*/
}
