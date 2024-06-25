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

class SubscribeBenefit extends Model
{
//    use HasFactory;

    protected $fillable = [
        'benefit_id',
        'locale',
        'title'
    ];






}
