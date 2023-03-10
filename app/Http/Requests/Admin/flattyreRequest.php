<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class flattyreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        if (!request()->is('admin/flattyre/create')) 
        {
            return [
                'vehical_type' => 'required',
                'tube_tyre' => 'required',
                'tyre_width' => 'required|numeric',
                'tyre_wheel_size' => 'required|numeric',
                'tyre_speed_rating' => 'required|alpha_num',
                'vehical_registration_no' => 'required|alpha_num',
                'tyresize_image' => 'required',
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
                'tube_tyre' => 'required',
                'tyre_width' => 'required|numeric',
                'tyre_wheel_size' => 'required|numeric',
                'tyre_speed_rating' => 'required|alpha_num',
                'vehical_registration_no' => 'required|alpha_num',
                'tyresize_image' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric',
                'description' => 'required',
            ];
        }
    }

    public function messages()
    {
        return 
        [
            'vehical_type.required' => __('validation.required', ['attribute' => 'vehical type']),
            'tube_tyre.required' => __('validation.required', ['attribute' => 'tube tyre']),
            'tyre_width.required' => __('validation.required', ['attribute' => 'tyre width']),
            'tyre_wheel_size.required' => __('validation.required', ['attribute' => 'tyre wheel size']),
            'tyre_speed_rating.required' => __('validation.required', ['attribute' => 'tyre speed rating']),
            'vehical_registration_no.required' => __('validation.required', ['attribute' => 'vehical registration no']),
            'tyresize_image.required' => __('validation.required', ['attribute' => 'tyresize image']),
            'location.required' => __('validation.required', ['attribute' => 'location']),
            'longitude.required' => __('validation.required', ['attribute' => 'longitude']),
            'latitude.required' => __('validation.required', ['attribute' => 'latitude']),
            'description.required' => __('validation.required', ['attribute' => 'description']),
        ];
    } 
    
}