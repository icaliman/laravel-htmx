<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class HtmxRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            '*' => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
    }
}
