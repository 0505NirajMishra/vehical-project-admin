<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegistrationRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/shopregistration/create')) 
        {
            return 
            [
                'company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'gst_no' => 'required|alpha_num|max:15',
                'owner_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'address' => 'required',
                'email' => 'required|email:rfc,dns|unique:shop_registrations,email',
                'mobile' => 'required|digits:10',
                'year_of_exper' => 'required|numeric',
                'about_you' => 'required',
                'password' => 'required|min:6|required_with:c_password|same:c_password|strong_password',
                'c_password' => 'required|min:6',
                'work_place_photo' => 'required',
                'profile_image' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric'
            ];
        } else {
            return 
            [
                'company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'gst_no' => 'required|alpha_num|max:15',
                'owner_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'address' => 'required',
                'email' => 'required|email:rfc,dns|unique:shop_registrations,email',
                'mobile' => 'required|digits:10',
                'year_of_exper' => 'required|numeric',
                'about_you' => 'required',
                'password' => 'required|min:6|required_with:c_password|same:c_password|strong_password',
                'c_password' => 'required|min:6',
                'work_place_photo' => 'required',
                'profile_image' => 'required',
                'location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric'
            ];
        }
    }

    public function messages()
    {
        return 
        [
            'company_name.required' => __('validation.required', ['attribute' => 'company name']),
            'gst_no.required' => __('validation.required', ['attribute' => 'gst no']),
            'owner_name.required' => __('validation.required', ['attribute' => 'owner name']),
            'address.required' => __('validation.required', ['attribute' => 'address']),
            'mobile.required' => __('validation.required', ['attribute' => 'mobile']),
            'year_of_exper.required' => __('validation.required', ['attribute' => 'year of experiance']),
            'about_you.required' => __('validation.required', ['attribute' => 'about you']),
            'work_place_photo.required' => __('validation.required', ['attribute' => 'work place photo']),
            'profile_image.required' => __('validation.required', ['attribute' => 'profile image']),
            'location.required' => __('validation.required', ['attribute' => 'location']),
            'longitude.required' => __('validation.required', ['attribute' => 'longitude']),
            'latitude.required' => __('validation.required', ['attribute' => 'latitude']),
            'email.required' => __('validation.required', ['attribute' => 'shop email']),
            'email.email' => __('validation.email', ['attribute' => 'shop email']),
            'email.unique' => __('validation.unique', ['attribute' => 'shop email']),
            'password.required' => __('validation.required', ['attribute' => 'shop password']),
            'c_password.strong_password' => __('validation.strong_password', ['attribute' => 'shop password']),
            'c_password.required' => __('validation.required', ['attribute' => 'confirm password']),            
        ];
    } 
    
}