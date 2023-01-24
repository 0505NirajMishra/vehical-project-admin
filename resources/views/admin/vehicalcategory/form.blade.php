<!--begin::Card body-->
<div class="card-body">

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_logo_title', 1) }}</label>
        <div class="col-lg-4 fv-row">
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_logo" accept=".png, .jpg, .jpeg">
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_name_title', 1) }}</label>
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_type_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_type_name', 1)]) !!}
        </div>


    </div>

    <div class="row mb-6">
            
            <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_category_type_title', 1) }}</label>
            
                <select class="form-control form-control-solid" name="vehical_category_type">
                    <option value=""> Please select service type</option>
                    <option value="bike">bike</option>
                    <option value="car">car</option>
                    <option value="pickup">pickup</option>
                    <option value="van">van</option>
                </select>
    </div>

</div>

<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalCategoryRequest', 'form') !!}
@endpush
