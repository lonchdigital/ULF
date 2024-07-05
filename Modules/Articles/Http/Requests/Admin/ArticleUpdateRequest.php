<?php

namespace Modules\Articles\Http\Requests\Admin;


class ArticleUpdateRequest extends ArticleCreateRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = $this->baseRules();

        $rules['slug'] = [
            'required',
            'unique:pages,slug,' . $this->route('article')->page->id,
            'string',
        ];

        $rules['preview_image' ] = [
            'nullable',
            'image',
            'mimes:jpeg,png,jpg',
        ];

        return $rules;
    }
}
