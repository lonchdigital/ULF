<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Articles\Entities\Article;

//use Modules\Consultations\Entities\Consultation;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'pageable_id',
        'pageable_type',
        'controller',
        'action',
        'slug',
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

    public $casts = [
        'publish_at' => 'datetime',
    ];

    /**
     * @return MorphTo
     */
    public function pageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * @return BelongsTo
     */
    /*public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }*/

    /**
     * @return File|null
     */
    public function getFileAttribute(): File|null
    {
        return $this?->pageable?->document?->documentFile?->file;
    }

    /**
     * @return Document
     */
    /*public function getDocumentAttribute(): Document
    {
        return $this->pageable;
    }*/

    /**
     * @param int $limit
     * @return Collection
     */
    public function getDocumentsWithLimit(int $limit): Collection
    {
        return $this->getAttribute('pageable_type')::query()
            ->whereHas('page', fn($query) => $query->where('active', 1))
            ->limit($limit)
            ->get();
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getDocumentsWithPaginate(int $perPage = 10)
    {
        return $this->getAttribute('pageable_type')::query()
            ->whereHas('page', fn($query) => $query->where('active', 1))
            ->orderByDesc('document_date')
            ->paginate($perPage)
            ->onEachSide(3);
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getLatestDocumentsWithPaginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->getAttribute('pageable_type')::query()
            ->latest()
            ->whereHas('page', fn($query) => $query->published())
            ->orderByDesc('document_date')
            ->paginate($perPage)
            ->onEachSide(3);
    }

    /*public function consultations(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Consultation::class, 'page_consultations');
    }*/

    public function scopePublished($query)
    {
        $currentDateTime = Carbon::now();
        $query->where('active', 1)
            ->where(function ($q) use ($currentDateTime) {
                $q->whereNull('publish_at')
                    ->orWhere(function ($q) use ($currentDateTime) {
                        $q->whereDate('publish_at', '<', $currentDateTime->toDateString())
                            ->orWhere(function ($q) use ($currentDateTime) {
                                $q->whereDate('publish_at', $currentDateTime->toDateString())
                                    ->whereTime('publish_at', '<=', $currentDateTime->toTimeString());
                            });
                    });
            })->orderBy('publish_at', 'desc');
    }
}
