<!--begin::Card body-->
<div class="card-body">
    
    <!--begin::Input group-->
   
   
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.servicetype_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="servicetype">
              <option value=""> Please select service type</option>
              <option value="FlatBattery">Flat Battery </option>
              <option value="FlatTyre">Flat Tyre</option>
              <option value="Towing">Towing </option>
              <option value="Petrol/Desiel">Petrol/ Desiel</option>
              <option value="Keyunlock">Key unlock </option>
              <option value="StartingProblem">Starting Problem </option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tyre_type">
              <option value=""> Please select tyre type</option>
              <option value="tube">Tube</option>
              <option value="tubeless">Tubeless</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type">
              <option value=""> Please select vehical type</option>
              <option value="bike">Bike</option>
              <option value="car">Car</option>
              <option value="pickup">Pickup</option>
              <option value="van">Van</option>
              <option value="truck">truck</option>
            </select>
        </div>
     
    </div>
  
</div>
<!--end::Card body-->


@push('scripts')

<script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    $(function () {
        $('.datetimepicker').datetimepicker();
    });

</script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CareRequest', 'form') !!}
@endpush