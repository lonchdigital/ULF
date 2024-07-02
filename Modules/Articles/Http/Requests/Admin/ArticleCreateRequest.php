<?php

namespace Modules\Articles\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // return [
        //     'name' => 'required|max:2000',
        //     'type' => 'required',
        //     'variety' => 'required',
        //     'document_date' => 'required',
        // ];
        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Назва документа обов\'язкова для заповнення.',
            'document_date.required' => 'Дата документа обов\'язкова для заповнення.',
        ];
    }
}
