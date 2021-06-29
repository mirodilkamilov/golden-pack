<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreHeroSectionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|array|max:3',
            'title.ru' => 'required|min:3|max:255',
            'title.en' => 'required|min:3|max:255',
            'title.uz' => 'required|min:3|max:255',

            'description' => 'required|array|max:3',
            'description.ru' => 'required|min:10|max:1024',
            'description.en' => 'required|min:10|max:1024',
            'description.uz' => 'required|min:10|max:1024',

            'image' => 'required|image|max:4096'
        ];
    }

    public function authorize(): bool
    {
        $numOfRecords = DB::table('company_details')->count();
        if ($numOfRecords > 0)
            return false;

        return true;
    }
}