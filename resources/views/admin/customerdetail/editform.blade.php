<!--begin::Card body-->
<div class="card-body">
    
    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.booking_date_time_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('booking_date_time', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.booking_date_time', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.location_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.location', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.longitute_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('longitute', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.longitute', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.latitute_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('latitute', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.latitute', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.servicetype_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
           
            <select class="form-control form-control-solid" name="service_name">
                     <option value=""> Please service type</option>
                     @foreach($data1 as $s1)
                         <option value="{{$s1->service_name}}" {{ $s1->service_name == $s1->service_name ? 'selected' : '' }} >{{$s1->service_name}}</option>
                     @endforeach
            </select>

        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tyre_type">
              <option value=""> Please select status</option>
              <option value="tube" {{ $customerdetail->tyre_type == 'tube' ? 'selected':'' }} >Tube</option>
              <option value="tubeless" {{ $customerdetail->tyre_type == 'tubeless' ? 'selected':'' }} >Tubeless</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
           
            <select class="form-control form-control-solid" name="vehical_type">
                     <option value=""> Please vehical type</option>
                     @foreach($data as $d1)
                         <option value="{{$d1->vehical_type}}" {{ $d1->vehical_type == $d1->vehical_type ? 'selected' : '' }} >{{$d1->vehical_type}}</option>
                     @endforeach
            </select>

        </div>

        
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.shop_employee_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('shop_employee', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.shop_employee', 1)]) !!}
        </div>

    </div>
    
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_status_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_status">
              <option value=""> Please select service status</option>
              <option value="process" {{ $customerdetail->service_status == 'process' ? 'selected':'' }} >Process</option>
              <option value="confirm" {{ $customerdetail->service_status == 'confirm' ? 'selected':'' }} >Confirm</option>
              <option value="cancel" {{ $customerdetail->service_status == 'cancel' ? 'selected':'' }} >Cancel</option>
            </select>
        </div>
    
    </div>

</div>
<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CustomerDetailRequest', 'form') !!}
@endpush