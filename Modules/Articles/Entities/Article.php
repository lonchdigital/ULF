<?php

namespace Modules\Articles\Entities;

//use App\Models\Document;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
//use Modules\Professionograms\Traits\QueryTrait;

//class Article extends Document
class Article
{
    use HasFactory;

//    use QueryTrait;

    protected $casts = [
        'document_date' => 'datetime'
    ];

    protected static function newFactory()
    {
        return \Modules\Documents\Database\factories\ProfessionogramFactory::new();
    }

   /* public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function page(): MorphOne
    {
        return $this->morphOne(Page::class, 'pageable');
    }*/
}
