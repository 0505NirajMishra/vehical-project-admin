<!--begin::Card body-->
<div class="card-body">
    
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_company_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_company_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_company_name', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>

        <div class="col-lg-4 fv-row">

            <select class="form-control form-control-solid" name="vehical_name">
                    <option value=""> Please select vehical name</option>
                    @foreach($vehicalcategorys as $data)
                        <option value="{{$data->vehical_type_name}}">{{$data->vehical_type_name}}</option>
                    @endforeach
            </select>

        </div>

    </div>

    <div class="row mb-6">  

            <label class="col-lg-2 col-form-label required fw-bold fs-6">vehical category type</label>

            <div class="col-lg-4 fv-row">

            <select class="form-control form-control-solid" name="vehical_type">
                    <option value=""> select vehical category type</option>
                    @foreach($vehicalcategorys as $data)
                        <option value="{{$data->vehical_category_type}}">{{$data->vehical_category_type}}</option>
                    @endforeach
            </select>

            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_registration_no_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('vehical_registration_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_registration_no', 1)]) !!}
            </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_detail_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
             {!! Form::textarea('vehical_detail', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_detail', 1)]) !!}
        </div>

    </div>
    
</div>

<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalDetailRequest', 'form') !!}
@endpush