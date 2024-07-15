<?php

namespace App\Services\CarCommands;

use Illuminate\Support\Facades\Http;

class CarApiService extends AuthService
{

    public function getDictionaryByName($dictionaryName, $accessToken)
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken($accessToken)
            ->post($this->baseUrl . '/command/GetDictionary', [
                'DictionaryName' => $dictionaryName,
            ]);

        return $response->json();
    }
    
}
