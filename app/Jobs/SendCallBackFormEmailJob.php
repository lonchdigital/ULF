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
use App\Services\CarCommands\AuthService;
use App\Services\CarCommands\CarApiService;

class SendCallBackFormEmailJob implements ShouldQueue
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
        $message = 'Ім\'я клієнта: ' . $this->data['name_drive'] . '<br>' .
                    'Телефон клієнта: ' . $this->data['phone_drive'] . '<br>';

        Notification::route('mail', $this->email)->notify(new SendFeedback($this->email, $message));


        $dataForRetailLead = [
            'name' => $this->data['name_drive'],
            'phone' => $this->data['phone_drive'],
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
        $carApiService->createRetailLead($dataForRetailLead, $authService->accessToken);
    }
}
