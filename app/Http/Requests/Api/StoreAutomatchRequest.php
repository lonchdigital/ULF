<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiBaseRequest;
use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAutomatchRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $locale = session('locale', config('app.locale'));
        app()->setLocale($locale);

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
            'name' => mb_strtolower(__('web.your_name')),
            'phone' =>  mb_strtolower(__('web.phone_number')),
            'approve' =>  mb_strtolower(__('web.approve')),
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => __('validation.required')
    //     ];
    // }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);

        throw new HttpResponseException($response);
    }
}
