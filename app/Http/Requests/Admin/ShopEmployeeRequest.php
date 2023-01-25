<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class ShopEmployeeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/shopemployee/create')) 
        {
            return [
                'booking_date_time' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_name' => 'required',
                'tyre_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_status' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        } else {
            return [
                'booking_date_time' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_name' => 'required',
                'tyre_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_status' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        }
    }

    public function messages()
    {
        return [
            'booking_date_time.required' => __('validation.required', ['attribute' => 'booking date and time']),
            'location.required' => __('validation.required', ['attribute' => 'location']),
            'service_name.required' => __('validation.required', ['attribute' => 'service type']),
            'tyre_type.required' => __('validation.required', ['attribute' => 'tyre type']),
            'vehical_type.required' => __('validation.required', ['attribute' => 'vehical type']),
            'service_status.required' => __('validation.required', ['attribute' => 'service status']),
        ];
    } 
    
}