<?php

namespace Modules\Cars\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Cars\Models\Car;

class CarUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'slug' => [
                'required',
                'unique:car_pages,slug,' . $this->route('car')->page->id,
                'string',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'popularity_id' => [
                'required',
                'integer',
            ],
            'sort_by_popularity' => [
                'nullable',
                'integer',
                'unique:cars,sort_by_popularity_id,' . $this->route('car')->id,
            ],
            'month_settings.*.monthly_payment' => [
                'nullable',
                'integer',
            ],
            'month_settings.*.first_payment' => [
                'nullable',
                'integer',
            ],
            'label_color_id' => [
                'required',
                'integer',
            ],
        ];

        foreach(['ua', 'ru'] as $lang){
            $rules['description.' . $lang] = [
                'nullable',
                'string',
            ];
            $rules['tag.' . $lang] = [
                'nullable',
                'string',
            ];
            $rules['faqs.*.question.' . $lang] = [
                'nullable',
                'string',
            ];
            $rules['faqs.*.answer.' . $lang] = [
                'nullable',
                'string',
            ];
        }

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
        $messages['sort_by_popularity.unique'] = trans('rules.unique_sort_by_popularity');

        $messages['preview_image.required'] = trans('rules.field') .' "'. trans('admin.preview') .'" '. trans('rules.required');
        $messages['preview_image.image'] = trans('rules.field') .' "'. trans('admin.preview') .'" '. trans('rules.image');

        foreach(['ua', 'ru'] as $lang){
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
