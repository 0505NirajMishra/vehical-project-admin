<!--begin::Card body-->
<div class="card-body">
    
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_detail_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
             {!! Form::text('vehical_detail', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_detail', 1)]) !!}
        </div>
       
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_company_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_company_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_company_name', 1)]) !!}
        </div>
 
    </div>

    <div class="row mb-6">
        
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type">
                     <option value="">Please vehical type</option>
                     @foreach($data as $t1)
                         <option value="{{$t1->vehical_type}}" {{ $t1->vehical_type == $t1->vehical_type ? 'selected' : '' }} >{{$t1->vehical_type}}</option>
                     @endforeach
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_name_title', 1) }}</label>
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_name">
                    <option value="">Please select vehical name</option>
                    @foreach($data as $d1)
                        <option value="{{$d1->vehical_name}}">{{$d1->vehical_name}}</option>
                    @endforeach
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_registration_no_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_registration_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_registration_no', 1)]) !!}
        </div>

    </div>
    
</div>

<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalDetailRequest', 'form') !!}
@endpush