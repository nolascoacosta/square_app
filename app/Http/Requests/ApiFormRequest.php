<?php

namespace App\Http\Requests;

use App\Exceptions\CustomValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class ApiFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /* protected function failedValidation(Validator $validator)
     {
         return (new CustomValidationException($validator))->errorBag($this->errorBag);
     }*/
}
