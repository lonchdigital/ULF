<?php

namespace App\Services\Feedback;

use App\Enums\FeedbackStatus;
use App\Models\TinderFeedback;

class StoreService
{
    public function store(array $data): void
    {
        TinderFeedback::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'page' => $data['page'],
            'type' => $data['type'],
            'cars' => $data['cars'],
            'status' => FeedbackStatus::NEW->value,
        ]);
    }
}
