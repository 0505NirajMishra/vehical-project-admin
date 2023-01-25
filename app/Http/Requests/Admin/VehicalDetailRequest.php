<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicalDetailRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicaldetail/create')) 
        {
            return 
            [
                'vehical_detail' => 'required',
                'vehical_type' => 'required',
                'vehical_company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_registration_no' => 'required|alpha_num',
            ];
        } else {
            return 
            [
                'vehical_detail' => 'required',
                'vehical_type' => 'required',
                'vehical_company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_registration_no' => 'required|alpha_num',
            ];
        }
    }

    public function messages()
    {
        return 
        [
            'vehical_detail.required' => __('validation.required', ['attribute' => 'Vehical detail']),
            'vehical_type.required' => __('validation.required', ['attribute' => 'Vehical type']),
            'vehical_company_name.required' => __('validation.required', ['attribute' => 'Vehical company name']),
            'vehical_name.required' => __('validation.required', ['attribute' => 'Vehical name']),
            'vehical_registration_no.required' => __('validation.required', ['attribute' => 'Vehical registration no']),            
        ];
    } 
    
}