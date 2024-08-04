<?php

namespace App\Services\CarCommands;

use Illuminate\Support\Facades\Http;

class AuthService
{
     public $baseUrl = 'https://api-test.ulf24.com:2223';
//    public $baseUrl = 'https://api.ulf24.com';
    public $accessToken;

    public function getToken()
    {
        $response = Http::withOptions(['verify' => false])
            ->post($this->baseUrl . '/auth/token', [
                'username' => env('CARS_API_USERNAME'),
                'password' => env('CARS_API_PASSWORD')
            ]);

        if ($response->successful()) {
            $data = $response->json();
            $this->accessToken = $data['access_token'];
        } else {
            throw new \Exception('Failed to obtain access token: ' . $response->body());
        }
    }

}
