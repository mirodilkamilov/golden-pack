<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class HandleContactsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contacts' => 'required|array',
            'contacts.phone' => 'required|array|max:3',
            'contacts.phone.*' => 'required|min:3|max:25',
            'contacts.email' => 'required|array|max:3',
            'contacts.email.*' => 'required|email',
            'contacts.address' => 'required|array|min:3|max:3',
            'contacts.address.ru' => 'required|min:5|max:255',
            'contacts.address.en' => 'required|min:5|max:255',
            'contacts.address.uz' => 'required|min:5|max:255',
            'contacts.google_map' => 'required|url|max:500',
            'contacts.social_media' => 'required|array|min:1|max:4',
            'contacts.social_media.*' => 'required|array|min:2|max:2',
            'contacts.social_media.*.name' => 'required|in:telegram,facebook,instagram,linkedin',
            'contacts.social_media.*.url' => 'nullable|url|max:100'
        ];
    }

    public function authorize(): bool
    {
        $numOfRecords = DB::table('company_details')->count();
        if ($numOfRecords > 0 && $this->method() === 'POST')
            return false;

        return true;
    }
}