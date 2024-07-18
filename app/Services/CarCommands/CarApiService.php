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

    public function getLotsList($accessToken, int $take = 5, int $skip = 0)
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken($accessToken)
            ->post($this->baseUrl . '/command/GetSubscriptionLotsList', [
                'Top' => $take,
                'Skip' => $skip
            ]);

        return $response->json();
    }

    public function getLotInfo($accessToken, array $lotIds)
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken($accessToken)
            ->post($this->baseUrl . '/command/GetSubscriptionLotInfo', [
                'LotIds' => $lotIds
            ]);

        return $response->json();
    }
    
}
