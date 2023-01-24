<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicalCategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicalcategory/create')) 
        {
            return [
                'vehical_type_name' => 'required',
                'vehical_logo' => 'required',
                'vehical_category_type' => 'required',
            ];
        } else {
            return [
                'vehical_type_name' => 'required',
                'vehical_logo' => 'required',
                'vehical_category_type' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_type_name.required' => __('validation.required', ['attribute' => 'Vehical type name']),
            'vehical_logo.required' => __('validation.required', ['attribute' => 'Vehical profile']),
            'vehical_category_type.required' => __('validation.required', ['attribute' => 'Vehical category type']),
        ];
    } 
    
}