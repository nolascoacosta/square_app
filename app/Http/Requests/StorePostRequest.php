<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'              => 'required|string|unique:posts,title|max:40',
            'description'        => 'required|string|required_with:title',
            'publication_date'   => 'required',
        ];
    }
}

