<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class TowingRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/towing/create')) 
        {
            return [
                'vehical_type' => 'required',
                'vehical_photo' => 'required',
                'vehical_registration_no' => 'required|alpha_num',
                'service_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_longitude' => 'required',
                'service_latitude' => 'required',
                'description' => 'required',
                'picanddroaddress' => 'required'
            ];
        } else {
            return [
                'vehical_type' => 'required',
                'vehical_photo' => 'required',
                'vehical_registration_no' => 'required|alpha_num',
                'service_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_longitude' => 'required',
                'service_latitude' => 'required',
                'description' => 'required',
                'picanddroaddress' => 'required' 
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_type.required' => __('validation.required', ['attribute' => 'vehical type']),
            'vehical_photo.required' => __('validation.required', ['attribute' => 'vehical photo']),
            'vehical_registration_no.required' => __('validation.required', ['attribute' => 'vehical registration no']),
            'service_location.required' => __('validation.required', ['attribute' => 'service location']),
            'service_longitude.required' => __('validation.required', ['attribute' => 'service longitute']),
            'description.required' => __('validation.required', ['attribute' => 'description']),
            'picanddroaddress.required' => __('validation.required', ['attribute' => 'pickup and drop address']),
        ];
    } 
    
}