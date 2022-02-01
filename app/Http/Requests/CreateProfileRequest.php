<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'portrait_src' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
            'user_name' => 'required',
            'title' => 'max:255',
            'description' => 'max:550',
            'url' => 'url|max:255',
        ];
    }
}
