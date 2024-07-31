<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiBaseRequest;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAutomatchRequest extends ApiBaseRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[ЫЪЭЁыъэё@%&$^#]/u', $value)) {
                        return $fail('Поле ' . $attribute . ' не може починатися з ЫЪЭЁыъэё@%&$^#.');
                    }

                    if (!preg_match('/^[А-ЯҐЇІЄа-яґїіє\'\-\s]+$/u', $value)) {
                        return $fail('Поле ' . $attribute . ' може містити лише літери, апострофи, дефіси та пробіли.');
                    }

                    if (preg_match('/\d/', $value)) {
                        return $fail('Поле ' . $attribute . ' не може містити числові вирази.');
                    }
                },
            ],

            'phone' => [
                'required',
                'min:10',
                'max:20',
                'regex:/^(\+?380)[\d\s-]{9,}$/i',
            ],

            'favorite_cars' => [
                'required',
                'string'
            ],

            'page' => [
                'required',
                'string',
            ],

            'utm_source' => [
                'nullable',
                'string'
            ],

            'utm_medium' => [
                'nullable',
                'string'
            ],

            'utm_campaign' => [
                'nullable',
                'string'
            ],

            'utm_term' => [
                'nullable',
                'string'
            ],

            'utm_content' => [
                'nullable',
                'string'
            ],

            'approve' => [
                'required',
                'accepted'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'імʼя',
            'phone' => 'номер телефону',
            'approve' => 'згода на обробку персональних даних',
        ];
    }
}
