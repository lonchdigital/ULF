<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Jobs\SendFeedbackEmailJob;
use App\Http\Controllers\Controller;
use App\Jobs\SendCallBackFormEmailJob;
use App\Jobs\SendFeedbackTinderEmailJob;
use App\Http\Requests\Api\FeedbackRequest;
use App\Jobs\SendTestDriveFeedbackEmailJob;
use App\Http\Requests\Api\CallBackFormRequest;
use App\Http\Requests\Api\StoreAutomatchRequest;
use App\Http\Requests\Api\TestDriveFeedbackRequest;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));

        return redirect()->route('thanks');
    }

    public function testDriveStore(TestDriveFeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendTestDriveFeedbackEmailJob($data));

        return redirect()->route('thanks');
    }

    // public function storeFavorite(StoreAutomatchRequest $request)
    // {
    //     $data = $request->validated();

    //     // dd('hello, STOP!', $data);
    //     dispatch(new SendFeedbackTinderEmailJob($data));
    //     // dispatch(new SendFeedbackEmailJob($data));

    //     return response()->json(['success' => true]);
    // }

    public function storeFavorite(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|regex:/^[^_]*$/|min:16',
            'approve' => 'accepted',
            'utm_source' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
            'utm_term' => 'nullable|string',
            'utm_content' => 'nullable|string',
        ]);

        dispatch(new SendFeedbackTinderEmailJob($request->all()));

        return response()->json(['success' => true]);
    }

    public function callBackForm(Request $request)
    {
        $request->validate([
            'name_drive' => 'required|string|max:100',
            'phone_drive' => 'required|string|regex:/^[^_]*$/|min:16',
            'agree_drive' => 'accepted',
            'current_url' => 'required|string',
            'utm_source' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
            'utm_term' => 'nullable|string',
            'utm_content' => 'nullable|string',
        ]);

        dispatch(new SendCallBackFormEmailJob($request->all()));

        return response()->json(['success' => true]);
    }
}
