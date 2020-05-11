<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vacancyName' => 'required|string',
            'vacancyDescription' => 'required|string',
            'permissionGroup' => 'required|string',
            'discordRole' => 'required|string',
            'vacancyCount' => 'required|integer',
            'vacancyFormID' => 'required|integer'
        ];
    }
}