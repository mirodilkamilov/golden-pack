<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplateFormRequest extends FormRequest
{
    public function rules(): array
    {
        $ignoredPosition = $this->input('position_old');

        return [
            'title' => 'required|array|max:3',
            'title.ru' => 'required|min:3|max:255',
            'title.en' => 'required|min:3|max:255',
            'title.uz' => 'required|min:3|max:255',

            'description' => 'required|array|max:3',
            'description.ru' => 'required|min:10|max:1024',
            'description.en' => 'required|min:10|max:1024',
            'description.uz' => 'required|min:10|max:1024',

            'position' => "required|integer|min:1|unique:processes,position,$ignoredPosition,position",
            'position_old' => 'required|integer|min:1',
            'image' => 'nullable|image|max:4096'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}