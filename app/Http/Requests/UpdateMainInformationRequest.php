<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMainInformationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'about_title' => 'required|array|max:3',
            'about_title.ru' => 'required|min:3|max:255',
            'about_title.en' => 'required|min:3|max:255',
            'about_title.uz' => 'required|min:3|max:255',

            'about_description' => 'required|array|max:3',
            'about_description.ru' => 'required|min:3|max:1024',
            'about_description.en' => 'required|min:3|max:1024',
            'about_description.uz' => 'required|min:3|max:1024',

            'about_image' => 'nullable|image|max:4096'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}