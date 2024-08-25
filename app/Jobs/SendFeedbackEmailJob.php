<?php

namespace App\Jobs;

use App\Notifications\SendFeedback;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendFeedbackEmailJob implements ShouldQueue
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

        Notification::route('mail', $this->email)->notify(new SendFeedback($this->email, $message));


        $dataForRetailLead = [
            'name' => $this->data['name_lead'],
            'phone' => $this->data['phone_lead'],
        ];

        // send data to ULF system vue API
//        $authService = new AuthService;
//        $carApiService = new CarApiService;

//        $authService->getToken();
//        $carApiService->createRetailLead($dataForRetailLead, $authService->accessToken);

    }
}
