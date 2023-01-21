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
              <option value="FlatBattery" {{ $shopemployee->servicetype == 'FlatBattery' ? 'selected':'' }} >Flat Battery </option>
              <option value="FlatTyre" {{ $shopemployee->servicetype == 'FlatTyre' ? 'selected':'' }} >Flat Tyre</option>
              <option value="Towing" {{ $shopemployee->servicetype == 'Towing' ? 'selected':'' }} >Towing </option>
              <option value="Petrol/Desiel" {{ $shopemployee->servicetype == 'Petrol/Desiel' ? 'selected':'' }} >Petrol/ Desiel</option>
              <option value="Keyunlock" {{ $shopemployee->servicetype == 'Keyunlock' ? 'selected':'' }} >Key unlock </option>
              <option value="StartingProblem" {{ $shopemployee->servicetype == 'StartingProblem' ? 'selected':'' }} >Starting Problem </option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tyre_type">
              <option value="">Please select status</option>
              <option value="tube" {{ $shopemployee->tyre_type == 'tube' ? 'selected':'' }} >Tube</option>
              <option value="tubeless" {{ $shopemployee->tyre_type == 'tubeless' ? 'selected':'' }} >Tubeless</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type">
              <option value="">Please select vehical type</option>
              <option value="bike" {{ $shopemployee->vehical_type == 'bike' ? 'selected':'' }} >Bike</option>
              <option value="car" {{ $shopemployee->vehical_type == 'car' ? 'selected':'' }} >Car</option>
              <option value="pickup" {{ $shopemployee->vehical_type == 'pickup' ? 'selected':'' }} >Pickup</option>
              <option value="van" {{ $shopemployee->vehical_type == 'van' ? 'selected':'' }} >Van</option>
              <option value="truck" {{ $shopemployee->vehical_type == 'truck' ? 'selected':'' }} >truck</option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_status_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_status">
              <option value=""> Please select service status</option>
              <option value="process" {{ $shopemployee->service_status == 'process' ? 'selected':'' }} >Process</option>
              <option value="confirm" {{ $shopemployee->service_status == 'confirm' ? 'selected':'' }} >Confirm</option>
              <option value="cancel" {{ $shopemployee->service_status == 'cancel' ? 'selected':'' }} >Cancel</option>
            </select>
        </div>

    </div>
  
</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ShopEmployeeRequest', 'form') !!}
@endpush