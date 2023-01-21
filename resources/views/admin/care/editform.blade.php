<!--begin::Card body-->
<div class="card-body">
    
    <!--begin::Input group-->

  
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.servicetype_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="servicetype">
              <option value=""> Please select service type</option>
              <option value="FlatBattery" {{ $care->servicetype == 'FlatBattery' ? 'selected':'' }} >Flat Battery </option>
              <option value="FlatTyre" {{ $care->servicetype == 'FlatTyre' ? 'selected':'' }} >Flat Tyre</option>
              <option value="Towing" {{ $care->servicetype == 'Towing' ? 'selected':'' }} >Towing </option>
              <option value="Petrol/Desiel" {{ $care->servicetype == 'Petrol/Desiel' ? 'selected':'' }} >Petrol/ Desiel</option>
              <option value="Keyunlock" {{ $care->servicetype == 'Keyunlock' ? 'selected':'' }} >Key unlock </option>
              <option value="StartingProblem" {{ $care->servicetype == 'StartingProblem' ? 'selected':'' }} >Starting Problem </option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tyre_type">
              <option value="">Please select status</option>
              <option value="tube" {{ $care->tyre_type == 'tube' ? 'selected':'' }} >Tube</option>
              <option value="tubeless" {{ $care->tyre_type == 'tubeless' ? 'selected':'' }} >Tubeless</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type">
              <option value="">Please select vehical type</option>
              <option value="bike" {{ $care->vehical_type == 'bike' ? 'selected':'' }} >Bike</option>
              <option value="car" {{ $care->vehical_type == 'car' ? 'selected':'' }} >Car</option>
              <option value="pickup" {{ $care->vehical_type == 'pickup' ? 'selected':'' }} >Pickup</option>
              <option value="van" {{ $care->vehical_type == 'van' ? 'selected':'' }} >Van</option>
              <option value="truck" {{ $care->vehical_type == 'truck' ? 'selected':'' }} >truck</option>
            </select>
        </div>
     
    </div>
  
</div>
<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CareRequest', 'form') !!}
@endpush