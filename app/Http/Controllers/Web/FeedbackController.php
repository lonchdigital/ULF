<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FeedbackRequest;
use App\Http\Requests\Api\StoreAutomatchRequest;
use App\Http\Requests\Api\TestDriveFeedbackRequest;
use App\Jobs\SendFeedbackEmailJob;
use App\Jobs\SendTestDriveFeedbackEmailJob;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));
    }

    public function testDriveStore(TestDriveFeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendTestDriveFeedbackEmailJob($data));

        return redirect()->route('thanks');
    }

    public function storeFavorite(StoreAutomatchRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));

        return response()->json(['success' => true]);
    }
}
