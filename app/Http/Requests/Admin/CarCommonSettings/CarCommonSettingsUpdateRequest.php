<?php

namespace App\Http\Requests\Admin\CarCommonSettings;

use Illuminate\Foundation\Http\FormRequest;

class CarCommonSettingsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        /*return [
            'thematic_block_one_title' => 'nullable|max:255',
            'thematic_block_two_title' => 'nullable|max:255',
            'thematic_block_three_title' => 'nullable|max:255',
//            'faqs.*.question' => 'nullable|string',
//            'faqs.*.answer' => 'nullable|string',
        ];*/

        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return auth()->user()->can('users.create');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'thematic_block_one_title.required' => 'Поле обов\'язкове для заповнення.',
            'thematic_block_two_title.required' => 'Поле обов\'язкове для заповнення.',
            'thematic_block_three_title.required' => 'Поле обов\'язкове для заповнення.',
        ];
    }
}
