<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/feedback/create')) 
        {
            return [
                'booking_date_time' => 'required',
                'description' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_name' => 'required',
                'service_status' => 'required',
                'vehical_type' => 'required',
                'tyre_type' => 'required',
                'cust_detail' => 'required', 
                'shop_detail' => 'required',
                'calling_status' => 'required',
            ];
        } else {
            return [
                'booking_date_time' => 'required',
                'description' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_name' => 'required',
                'service_status' => 'required',
                'vehical_type' => 'required',
                'tyre_type' => 'required',
                'cust_detail' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255', 
                'shop_detail' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'calling_status' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'description.required' => __('validation.required', ['attribute' => 'Description']),
            'booking_date_time.required' => __('validation.required', ['attribute' => 'Date and Time']),
            'service_name.required' => __('validation.required', ['attribute' => 'Service Type']),
            'service_status.required' => __('validation.required', ['attribute' => 'Service Status']),
            'calling_status.required' => __('validation.required', ['attribute' => 'Calling Status']),
            'vehical_type.required' => __('validation.required', ['attribute' => 'Vehical Type']),
            'tyre_type.required' => __('validation.required', ['attribute' => 'Tyre Type']),
            'cust_detail.required' => __('validation.required', ['attribute' => 'Customer Detail']),
            'shop_detail.required' => __('validation.required', ['attribute' => 'Shop Detail']),
        ];
    } 
    
}