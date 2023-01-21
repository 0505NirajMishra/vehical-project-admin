<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerDetailRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        if (!request()->is('admin/customerdetail/create')) 
        {
            return [
                'shop_employee' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'booking_date_time' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'servicetype' => 'required',
                'service_status' => 'required',
                'tyre_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        } 
        else 
        {
            return [
                'shop_employee' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'booking_date_time' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'servicetype' => 'required',
                'service_status' => 'required',
                'tyre_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        }
    }

    public function messages()
    {
        return [
            'shop_employee.required' => __('validation.required', ['attribute' => 'shop employee']),
            'booking_date_time.required' => __('validation.required', ['attribute' => 'booking date and time']),
            'location.required' => __('validation.required', ['attribute' => 'location']),
            'servicetype.required' => __('validation.required', ['attribute' => 'service type']),
            'service_status.required' => __('validation.required', ['attribute' => 'service status']),
            'tyre_type.required' => __('validation.required', ['attribute' => 'tyre type']),
            'vehical_type.required' => __('validation.required', ['attribute' => 'vehical type']),
        ];
    } 
    
}