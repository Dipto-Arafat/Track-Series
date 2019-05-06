<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogInRequest extends FormRequest
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
            'pass' => 'bail|required',
            'mail' => 'bail|required|email'
        ];
    }

    public function messages(){
        return [
            'mail.required' => 'Please type your registered mail!',
            'mail.email' => 'Invalid Email format!',
            'pass.required' => 'Password can not be empty!'
        ];
    }
}
