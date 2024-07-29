<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FeedbackRequest;
use App\Http\Requests\Api\StoreAutomatchRequest;
use App\Jobs\SendFeedbackEmailJob;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));
    }

    public function storeFavorite(StoreAutomatchRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));
    }
}
