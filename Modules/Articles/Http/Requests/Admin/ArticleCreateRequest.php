<?php

namespace Modules\Articles\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
// use app\Traits\LangTrait;

class ArticleCreateRequest extends FormRequest
{
    // use LangTrait;

    public function baseRules(): array
    {
        $rules = [
            'slug' => [
                'required',
                'unique:pages,slug',
                'string',
            ],
        ];

        foreach(['uk', 'ru'] as $lang){
            $rules['name.' . $lang] = [
                'required',
                'string',
            ];
            $rules['description.' . $lang] = [
                'required',
                'string',
            ];
            $rules['text.' . $lang] = [
                'required',
                'string',
            ];
        }

        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = $this->baseRules();
        return $rules;
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
        $messages = [];

        $messages['slug.required'] = trans('rules.field') .' "URL" '. trans('rules.required');
        $messages['slug.unique'] = trans('rules.unique_url');

        foreach(['uk', 'ru'] as $lang){
            $messages['name.' . $lang . '.required'] = trans('rules.field') .' "'. trans('admin.title')  .' (' . $lang . ')" '. trans('rules.required');
            $messages['name.' . $lang . '.string'] = trans('rules.field') .' "'. trans('admin.title') .' (' . $lang . ')" '. trans('rules.string');

            $messages['description.' . $lang . '.required'] = trans('rules.field') .' "'. trans('admin.desc') .' (' . $lang . ')" '. trans('rules.required');
            $messages['description.' . $lang . '.string'] = trans('rules.field') .' "'. trans('admin.desc') .' (' . $lang . ')" '. trans('rules.string');
            
            $messages['text.' . $lang . '.required'] = trans('rules.field') .' "'. trans('admin.content') .' (' . $lang . ')" '. trans('rules.required');
            $messages['text.' . $lang . '.string'] = trans('rules.field') .' "'. trans('admin.content') .' (' . $lang . ')" '. trans('rules.string');
        }
        return $messages;
    }
}
