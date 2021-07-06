<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateFormRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = $this->segment(2);
        $validationRules = [
            'title' => 'required|array|max:3',
            'title.ru' => 'required|min:3|max:255',
            'title.en' => 'required|min:3|max:255',
            'title.uz' => 'required|min:3|max:255',

            'description' => 'required|array|max:3',
            'description.ru' => 'required|min:10|max:1024',
            'description.en' => 'required|min:10|max:1024',
            'description.uz' => 'required|min:10|max:1024',

            'position' => "required|integer|min:1|unique:$tableName,position",
            'image' => 'required|image|max:4096',
        ];

        if ($tableName === 'testimonials')
            $validationRules['name'] = 'required|min:3|max:255';

        return $validationRules;
    }

    public function authorize(): bool
    {
        return true;
    }
}