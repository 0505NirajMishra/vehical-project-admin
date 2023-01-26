<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.booking_date_time_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('booking_date_time', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid datetimepicker', 'placeholder' => trans_choice('content.booking_date_time', 1)]) !!}
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

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_name_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_name">
                    <option value=""> select service name</option>
                    @foreach($addservices as $data1)
                        <option value="{{$data1->service_name}}">{{$data1->service_name}}</option>
                    @endforeach
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
                    <option value=""> select vehical category type</option>
                    @foreach($vehicalcategorys as $data)
                        <option value="{{$data->vehical_type}}">{{$data->vehical_type}}</option>
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
              <option value="process">Process</option>
              <option value="confirm">Confirm</option>
              <option value="cancel">Cancel</option>
            </select>
        </div>

    </div>

    <!--end::Input group-->

</div>
<!--end::Card body-->

@push('scripts')

    <script>

    <link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        $(function(){
            $('.datetimepicker').datetimepicker();
        });
    </script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CustomerDetailRequest', 'form') !!}

@endpush