<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class TestDriveFeedbackRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
        ];
    }
}
