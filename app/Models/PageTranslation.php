<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Pagination\LengthAwarePaginator;
//use Modules\Consultations\Entities\Consultation;

class PageTranslation extends Model
{
//    use HasFactory;

    protected $fillable = [
        'locale',
        'name',
        'slug',
        'description',
        'text',
        'h1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
    ];

    /*public $robots_data = [
        'all',
        'noindex',
        'follow',
        'nofollow',
        'none',
        'noarchive',
        'nosnippet',
        'notranslate',
        'noimageindex'
    ];*/

    /*public $casts = [
        'publish_at' => 'datetime',
    ];*/

    /**
     * @return MorphTo
     */
    /*public function pageable(): MorphTo
    {
        return $this->morphTo();
    }*/

    /**
     * @return BelongsTo
     */
    /*public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }*/


}
