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

    public function createRetailLead(array $data, $accessToken)
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken($accessToken)
            ->post($this->baseUrl . '/command/CreateRetailLead', [
                "vehicle" => [
                    "manufacturerId" => null,
                    "modelId" => null,
                    "manufacturedYear" => null,
                    "bodyId" => null,
                    "fuelTypeId" => null,
                    "transmissionTypeId" => null,
                    "engineVolume" => null,
                    "mileage" => null
                ],
                "autoRiaAdUrl" => null,
                "contact" => [
                    "name" => $data['name'],
                    "surname" => null,
                    "inn" => null,
                    "phoneNumber" => $data['phone']
                ],
                "currentUrl" => $data['current_url'],
                "utm_source" => $data['utm_source'],
                "utm_medium" => $data['utm_medium'],
                "utm_campaign" => $data['utm_campaign'],
                "utm_term" => $data['utm_term'],
                "utm_content" => $data['utm_content']
            ]);

        return $response->json();
    }

}
