<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PetroldesielRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        if (!request()->is('admin/petroldesiel/create')) 
        {
            return [
                'vehical_type' => 'required',
                'fuel_type' => 'required',
                'fuel_quantity' => 'required|numeric',
                'vehical_registration_no' => 'required|alpha_num',
                'vehical_image' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric',
                'description' => 'required',
            ];
        } 
        else 
        {
            return [
                'vehical_type' => 'required',
                'fuel_type' => 'required',
                'fuel_quantity' => 'required|numeric',
                'vehical_registration_no' => 'required|alpha_num',
                'vehical_image' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric',
                'description' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_type.required' => __('validation.required', ['attribute' => 'vehical type']),
            'fuel_type.required' => __('validation.required', ['attribute' => 'fuel type']),
            'fuel_quantity.required' => __('validation.required', ['attribute' => 'fuel quantity']),
            'vehical_registration_no.required' => __('validation.required', ['attribute' => 'vehical registration no']),
            'vehical_image.required' => __('validation.required', ['attribute' => 'vehical image']),
            'location.required' => __('validation.required', ['attribute' => 'location']),
            'longitude.required' => __('validation.required', ['attribute' => 'longitude']),
            'latitude.required' => __('validation.required', ['attribute' => 'latitude']),
            'description.required' => __('validation.required', ['attribute' => 'description']),
        ];
    } 
    
}