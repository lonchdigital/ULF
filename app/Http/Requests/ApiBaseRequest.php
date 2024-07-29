<?php

namespace App\Http\Requests;

use App\Models\Exchange;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ApiBaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->phone) {
            $this->merge([
                'phone' => preg_replace('~\D+~', '', $this->phone),
            ]);
        }

        if (! $this->code) {
            $this->merge([
                'code' => null,
            ]);
        }

        if ($this->name) {
            $this->merge([
                'name' => $this->uncaps($this->name),
            ]);
        }

        if ($this->first_name) {
            $this->merge([
                'first_name' => $this->uncaps($this->first_name),
            ]);
        }

        if ($this->last_name) {
            $this->merge([
                'last_name' => $this->uncaps($this->last_name),
            ]);
        }

        if ($this->birthday) {
            try {
                $birthday = Carbon::parse($this->birthday)->toDateString();
            } catch (InvalidFormatException $th) {
                $birthday = false;
            }

            $this->merge([
                'birthday' => $birthday,
            ]);
        }

        if ($this->created_at) {
            try {
                $created_at = Carbon::parse($this->created_at)->toDateString();
            } catch (InvalidFormatException $th) {
                $created_at = false;
            }

            $this->merge([
                'created_at' => $created_at,
            ]);
        }
    }

    public function attributes()
    {
        return [
            'first_name' => 'прізвище',
            'name' => "ім'я",
            'last_name' => 'по батькові',
            'password' => 'пароль',
            'phone' => 'телефону',
            'code' => 'код картки',
            'avatar' => 'фото',
            'birthday' => 'дата народження',
            'sex' => 'стать',
            'address' => 'адреса',
            'value' => 'значення',
            'type' => 'тип',
            'is_active' => 'чи активний',
            'start_at' => 'початок',
            'end_at' => 'закінчення',
            'url' => 'адреса сайту',
            'image' => 'зображення',
            'description' => 'опис',
            'title' => 'назва',
            'priority' => 'пріоритет',
            'uuid_1c_client' => 'UUID клієнта',
            'uuid_1c_check' => 'UUID чеку',
            'password_old' => 'старий пароль',
            'password_new' => 'новий пароль',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->wantsJson() || $this->ajax()) {

            throw new HttpResponseException(response()->error($validator->errors()->first(), 422));
        }

        throw (new ValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

    protected function uncaps($value)
    {
        return mb_convert_case(trim($value), MB_CASE_TITLE, 'UTF-8');
    }
}
