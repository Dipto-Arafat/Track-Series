<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'fname' => 'bail|required|alpha',
            'lname' => 'bail|required|alpha',
            'mail' => 'bail|required|email|unique:user,mail',
            'pass' => 'bail|required|regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})^',
            'cnfrmpass' => 'bail|required|same:pass'
        ];
    }


    public function messages(){
        return [
            'fname.required' => 'First Name can not be empty!',
            'fname.alpha' => 'Name should contain only characters!',
            'lname.required' => 'Surname Name can not be empty!',
            'lname.alpha' => 'Name should contain only characters!',
            'mail.email' => 'Invalid Email format!',
            'mail.required' => 'Mail can not be empty!',
            'pass.required' => 'Password can not be empty!',
            'pass.regex' => 'Password should contain at least one upper case,lower case,digit,special character and should be at least 8 characters long!',
            'cnfrmpass.required' => 'Confirm Password can not be empty!',
            'cnfrmpass.same' => 'Password and Confirm Password must be simillar!',
        ];
    }
}
