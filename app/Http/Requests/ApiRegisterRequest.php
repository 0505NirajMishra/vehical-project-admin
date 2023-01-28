<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function rules()
    {
        return [
            'customer_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'customer_mobile' => 'required|unique:users,customer_mobile|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:6|required_with:customer_cpassword|same:customer_cpassword|strong_password',
            'customer_cpassword' => 'required|min:6',
            'user_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => __('validation.required', ['attribute' => 'customer name']),
            'user_type.required' => __('validation.required', ['attribute' => 'User type']),
            'customer_mobile.required' => __('validation.required', ['attribute' => 'customer mobile']),
            'email.required' => __('validation.required', ['attribute' => 'customer email']),
            'email.email' => __('validation.email', ['attribute' => 'customer email']),
            'email.unique' => __('validation.unique', ['attribute' => 'customer email']),
            'password.required' => __('validation.required', ['attribute' => 'customer password']),
            'customer_cpassword.strong_password' => __('validation.strong_password', ['attribute' => 'customer password']),
            'customer_cpassword.required' => __('validation.required', ['attribute' => 'Confirm Password']),
        ];
    }

}