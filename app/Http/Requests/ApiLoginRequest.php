<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiLoginRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
  
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => __('validation.required', ['attribute' => 'Customer Email']),
            'email.unique' => __('validation.unique', ['attribute' => 'Customer Email']),
            'email.exists' => "This Email doesn't registered with us.",
            'password.required' => __('validation.required', ['attribute' => 'Customer Password']),
        ];
    }
}