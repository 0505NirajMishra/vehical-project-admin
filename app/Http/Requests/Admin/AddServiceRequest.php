<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddServiceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        if (!request()->is('admin/addservice/create')) 
        {
            return [
                'service_name' => 'required',
            ];
        } 
        else 
        {
            return [
                'service_name' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'service_name.required' => __('validation.required', ['attribute' => 'service name']),           
        ];
    } 
    
}