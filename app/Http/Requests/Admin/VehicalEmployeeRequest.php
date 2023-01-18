<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicalEmployeeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicalemployee/create')) {
            return [
                'vehical_service_type_exprt' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_employee_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_mobile' => 'required|numeric|digits:10',
                'vehical_company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_employee_profile' => 'required'
            ];
        } else {
            return [
                'vehical_service_type_exprt' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_employee_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_mobile' => 'required|numeric|digits:10',
                'vehical_company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_employee_profile' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_service_type_exprt.required' => __('validation.required', ['attribute' => 'employee expert type']),
            'vehical_employee_name.required' => __('validation.required', ['attribute' => 'employee name']),
            'vehical_mobile.required' => __('validation.required', ['attribute' => 'employee mobile']),
            'vehical_company_name.required' => __('validation.required', ['attribute' => 'company name']),
            'vehical_employee_profile.required' => __('validation.required', ['attribute' => 'employee profile']),
        ];
    } 
    
}