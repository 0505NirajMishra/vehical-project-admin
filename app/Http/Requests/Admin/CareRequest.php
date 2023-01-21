<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class CareRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/care/create')) 
        {
            return [
                'servicetype' => 'required',
                'tyre_type' => 'required',
                'vehical_type' => 'required',
            ];
        } else {
            return [
                'servicetype' => 'required',
                'tyre_type' => 'required',
                'vehical_type' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'servicetype.required' => __('validation.required', ['attribute' => 'service type']),
            'tyre_type.required' => __('validation.required', ['attribute' => 'tyre type']),
            'vehical_type.required' => __('validation.required', ['attribute' => 'vehical type']),
        ];
    } 
    
}