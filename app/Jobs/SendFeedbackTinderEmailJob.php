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
        $message = 'Ім\'я клієнта: ' . $this->data['name'] . '<br>' .
                    'Телефон клієнта: ' . $this->data['phone'] . '<br>'
//                    'Обрані авто: ' . $this->data['favorite_cars'] . '<br>' .
//                    'Сторінка: ' . $this->data['page']
        ;

        // $notification = new SendFeedback($this->email, $message);
        // Notification::route('mail', $this->email)->notify($notification);

        Notification::route('mail', $this->email)->notify(new SendFeedback($this->email, $message));


        $dataForRetailLead = [
            'name' => $this->data['name'],
            'phone' => $this->data['phone'],
            'utm_source' => null,
            'utm_medium' => null,
            'utm_campaign' => null,
            'utm_term' => null,
            'utm_content' => null,
            'comment' => $this->data['favorite_cars'],
        ];

        // send data to ULF system vue API
        $authService = new AuthService;
        $carApiService = new CarApiService;

        $authService->getToken();
        $carApiService->createRetailLeadWithCars($dataForRetailLead, $authService->accessToken);
    }
}
