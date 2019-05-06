<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'pass' => 'bail|required|regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})^',
            'radio' => 'bail|required|in:Male,Female,Others',
            'day' => 'bail|required|numeric|min:1|max:31',
            'month' => 'bail|required|numeric|min:1|max:12',
            'year' => 'bail|required|numeric|max:2019',
            'country' => 'bail|required|alpha'
        ];
    }


    public function messages(){
        return [
            'fname.required' => 'First Name can not be empty!',
            'fname.alpha' => 'Name should contain only characters!',
            'lname.required' => 'Surname Name can not be empty!',
            'lname.alpha' => 'Name should contain only characters!',
            'pass.required' => 'Password can not be empty!',
            'pass.regex' => 'Password should contain at least one upper case,lower case,digit,special character and should be at least 8 characters long!',
            'radio.required' => 'Please Choose your Gender!',
            'day.required' => 'Please Select BirthDay!',
            'day.min' => 'Birth Day Should Be In Between 1 to 31!',
            'day.max' => 'Birth Day Should Be In Between 1 to 31!',
            'month.required' => 'Please Select Birth Month!',
            'month.min' => 'Birth Month Should Be In Between 1 to 12!',
            'month.max' => 'Birth Month Should Be In Between 1 to 12!',
            'year.required' => 'Please Select Birth Year!',
            'month.max' => 'Birth Month Should Be Under 2019!'
        ];
    }
}
