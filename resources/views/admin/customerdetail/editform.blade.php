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

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.servicetype_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="servicetype">
              <option value=""> Please select service type</option>
              <option value="Flat Battery" {{ $customerdetail->servicetype == 'Flat Battery' ? 'selected':'' }} >Flat Battery </option>
              <option value="Flat tyre(Punchure)" {{ $customerdetail->servicetype == 'Flat tyre(Punchure)' ? 'selected':'' }} >Flat Tyre</option>
              <option value="Towing" {{ $customerdetail->servicetype == 'Towing' ? 'selected':'' }} >Towing </option>
              <option value="Petrol/Desiel" {{ $customerdetail->servicetype == 'Petrol/Desiel' ? 'selected':'' }} >Petrol/ Desiel</option>
              <option value="Keyunlock" {{ $customerdetail->servicetype == 'Keyunlock' ? 'selected':'' }} >Key unlock </option>
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
              <option value=""> Please select vehical type</option>
              <option value="bike" {{ $customerdetail->vehical_type == 'bike' ? 'selected':'' }} >Bike</option>
              <option value="car" {{ $customerdetail->vehical_type == 'car' ? 'selected':'' }} >Car</option>
              <option value="pickup" {{ $customerdetail->vehical_type == 'pickup' ? 'selected':'' }} >Pickup</option>
              <option value="van" {{ $customerdetail->vehical_type == 'van' ? 'selected':'' }} >Van</option>
              <option value="truck" {{ $customerdetail->vehical_type == 'truck' ? 'selected':'' }} >truck</option>
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