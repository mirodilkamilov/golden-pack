<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreCooperationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => 'required|image|max:4096',
            'list' => 'required|array|min:1|max:10',
            'list.*' => 'required|array|min:3|max:3',
            'list.*.*' => 'required|array|min:2|max:2',
            'list.*.ru.title' => 'required|min:3|max:255',
            'list.*.en.title' => 'required|min:3|max:255',
            'list.*.uz.title' => 'required|min:3|max:255',
            'list.*.ru.description' => 'required|min:10|max:500',
            'list.*.en.description' => 'required|min:10|max:500',
            'list.*.uz.description' => 'required|min:10|max:500'
        ];
    }

    public function authorize(): bool
    {
        $numOfRecords = DB::table('cooperations')->count();
        if ($numOfRecords > 0)
            return false;

        return true;
    }
}