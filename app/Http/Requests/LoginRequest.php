<?php

namespace App\Http\Requests;

class LoginRequest extends ApiFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'email|required',
            'password' => 'required'
        ];
    }
}
