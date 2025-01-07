<?php

namespace App\Jobs;

use App\Notifications\SendFeedback;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Notification;
use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;

class SendFeedbackTinderEmailJob implements ShouldQueue
{
    use Queueable;

    protected $email;

    protected array $data;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->email = 'auto.online@ulf.ua';

        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $message = 'Ім\'я клієнта: ' . $this->data['name_lead'] . '<br>' .
                    'Телефон клієнта: ' . $this->data['phone_lead'] . '<br>'
//                    'Обрані авто: ' . $this->data['favorite_cars'] . '<br>' .
//                    'Сторінка: ' . $this->data['page']
        ;

        // $notification = new SendFeedback($this->email, $message);
        // Notification::route('mail', $this->email)->notify($notification);

        Notification::route('mail', $this->email)->notify(new SendFeedback($this->email, $message));


        $dataForRetailLead = [
            'name' => $this->data['name_lead'],
            'phone' => $this->data['phone_lead'],
            'current_url' => $this->data['current_url'],
            'utm_source' => $this->data['utm_source'],
            'utm_medium' => $this->data['utm_medium'],
            'utm_campaign' => $this->data['utm_campaign'],
            'utm_term' => $this->data['utm_term'],
            'utm_content' => $this->data['utm_content'],
        ];

        // send data to ULF system vue API
        $authService = new AuthService;
        $carApiService = new CarApiService;

        $authService->getToken();
        $carApiService->createRetailLeadWithCars($dataForRetailLead, $authService->accessToken);
    }
}
