<!--begin::Card body-->
<div class="card-body">
    
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_service_type_exprt_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
        {!! Form::text('vehical_service_type_exprt', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_service_type_exprt', 1)]) !!}
        </div>
        
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_employee_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
        {!! Form::text('vehical_employee_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_employee_name', 1)]) !!}
        </div>
        

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_employee_profile_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_employee_profile" accept=".png, .jpg, .jpeg">
        </div>
        
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_company_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
        {!! Form::text('vehical_company_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_company_name', 1)]) !!}
        </div>
        

    </div>

    <div class="row mb-6">

       
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_mobile_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
        {!! Form::text('vehical_mobile', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_mobile', 1)]) !!}
        </div>
        

    </div>
    
</div>

<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalEmployeeRequest', 'form') !!}
@endpush