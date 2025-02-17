<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Helpers\MultiLangRoute;
use App\Jobs\SendFeedbackEmailJob;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Jobs\SendCallBackFormEmailJob;
use App\Services\Feedback\StoreService;
use App\Jobs\SendFeedbackTinderEmailJob;
use App\Jobs\SendCallBackAvailabilityJob;
use App\Http\Requests\Api\FeedbackRequest;
use App\Http\Requests\Api\SelectCarRequest;
use App\Jobs\SendTestDriveFeedbackEmailJob;
use Modules\Cars\Services\Admin\CarsService;
use App\Http\Requests\Api\CallBackFormRequest;
use App\Http\Requests\Api\StoreAutomatchRequest;
use App\Http\Requests\Api\TestDriveFeedbackRequest;

class FeedbackController extends Controller
{
    private CarsService $carsService;

    public function __construct(CarsService $carsService)
    {
        $this->carsService = $carsService;
    }

    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));

        $this->saveFeedback([
            'name' => $data['name_lead'],
            'phone' => $data['phone_lead'],
            'type' => 'Feedback',
            'page' => $data['page']
        ]);

        return redirect()->to('/' . session('locale') . '/thanks');
    }

    public function testDriveStore(TestDriveFeedbackRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendTestDriveFeedbackEmailJob($data));

        $this->saveFeedback([
            'name' => $data['name_drive'],
            'phone' => $data['phone_drive'],
            'type' => 'Test drive',
            'page' => $data['page']
        ]);

        return redirect()->to('/' . session('locale') . '/thanks');
    }

    public function storeFavorite(StoreAutomatchRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackTinderEmailJob($data));
        
        $data['type'] = 'Automatch';
        $data['page'] = 'Main page';
        $this->saveFeedback($data);
        $locale = app()->getLocale();

        return response()->json([
            'success' => true,
            'redirect_url' => $locale === 'ua' ? '/thanks' : "/$locale/thanks",
        ]);
    }

    // public function storeFavorite(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'phone' => 'required|string|regex:/^[^_]*$/|min:16',
    //         'approve' => 'accepted',
    //         'utm_source' => 'nullable|string',
    //         'utm_medium' => 'nullable|string',
    //         'utm_campaign' => 'nullable|string',
    //         'utm_term' => 'nullable|string',
    //         'utm_content' => 'nullable|string',
    //         'favorite_cars' => 'nullable|string',
    //     ]);

    //     dispatch(new SendFeedbackTinderEmailJob($request->all()));

    //     return response()->json(['success' => true]);
    // }

    public function storeSelectCar(SelectCarRequest $request)
    {
        $data = $request->validated();

        dispatch(new SendFeedbackEmailJob($data));

        $data['favorite_cars'] = $data['car'];
        $data['type'] = 'Select car';
        $data['page'] = 'Main page';
        $this->saveFeedback($data);
        $locale = app()->getLocale();

        return response()->json([
            'success' => true,
            'redirect_url' => $locale === 'ua' ? '/thanks' : "/$locale/thanks",
        ]);
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

    public function callBackAvailabilityForm(Request $request)
    {
        $request->validate([
            'email_drive' => 'required|email|max:255',
            'agree_drive' => 'accepted',
            'current_url' => 'required|string',
            'utm_source' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
            'utm_term' => 'nullable|string',
            'utm_content' => 'nullable|string',
            'car_id' => 'required|integer',
        ]);

        $data = $request->all();

        $this->carsService->addNoteToCarsAvailability($data['car_id'], $data['email_drive']);

        // dispatch(new SendCallBackAvailabilityJob($request->all()));
        return response()->json(['success' => true]);
    }

    public function saveFeedback($data)
    {
        $service = resolve(StoreService::class);

        $service->store([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'cars' => $data['favorite_cars'] ?? '',
            'type' => $data['type'],
            'page' => $data['page'],
        ]);
    }
}
