<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'content' => ['required', 'string', 'min:20', 'max:65535'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }
}
