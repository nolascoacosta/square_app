<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'     => 'required|min:2|max:50',
            'last_name'     => 'required|min:2|max:50',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6',
        ];
    }
}
