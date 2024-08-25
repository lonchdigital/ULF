<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends BaseRequest
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
            'name_lead' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[ЫЪЭЁыъэё@%&$^#]/u', $value)) {
                        return $fail(trans('rules.name_rule_one'));
                    }

                    if (!preg_match('/^[А-ЯҐЇІЄа-яґїіє\'\-\s]+$/u', $value)) {
                        return $fail(trans('rules.name_rule_two'));
                    }

                    if (preg_match('/\d/', $value)) {
                        return $fail(trans('rules.name_rule_three'));
                    }
                },
            ],

            'phone_lead' => [
                'required',
                'string',
                'regex:/^[^_]*$/',
                'min:16'
            ],

            'agree_lead' => [
                'accepted'
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

    public function attributes(): array
    {
        $attributes = [
            'name_lead' => mb_strtolower(trans('rules.name')),
            'phone_lead' => mb_strtolower(trans('rules.phone'))
        ];

        return $attributes;
    }

    public function messages()
    {
        return [
            'agree_lead' => trans('rules.agree')
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $redirectUrl = url()->previous() . '#feedBackForm';

        throw new \Illuminate\Validation\ValidationException($validator, redirect($redirectUrl)
            ->withInput()
            ->withErrors($validator));
    }
}
